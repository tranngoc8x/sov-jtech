<?php
App::uses('AppController', 'Controller');
/**
 * Menuitems Controller
 *
 * @property Menuitem $Menuitem
 * @property PaginatorComponent $Paginator
 */
class MenuitemsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	var $controllerName = "Menuitems";

	public function index($id) {
        $this->Menuitem->recursive = -1;
	    $menus = $this->Menuitem->find('threaded',array('conditions'=>array('status'=>2,'menus_id'=>$id),'order'=>'lft ASC'));
		return $menus;
	}

	public function view($id = null) {
		if (!$this->Menuitem->exists($id)) {
			throw new NotFoundException(__('Invalid menuitem'));
		}
		$options = array('conditions' => array('Menuitem.' . $this->Menuitem->primaryKey => $id));
		$this->set('menuitem', $this->Menuitem->find('first', $options));
	}

	public function admin_index($id = null) {
		$this->Menuitem->recursive = 0;
		$linksTree = $this->Menuitem->generateTreeList(
			array('menus_id'=>$id),
			null,
			null,
			"__"
		);
		$s_selected = 0;
		$cond = array();
		if($this->request->is("post")) {

			$s_selected = $this->request->data['frm']['status'];
			$this->passedArgs["status"] = $this->request->data['frm']['status'];
		}
		if(isset($this->passedArgs["status"])) {
			$cond = array_merge($cond,array('Menuitem.status'=>$this->passedArgs["status"]));
			$s_selected = $this->passedArgs["status"];
		}
		if($s_selected == 0){
			unset($cond['Menuitem.status']);
		}
		if(!empty($id)){
			$cond = array_merge($cond,array('Menuitem.menus_id'=>$id));
		}
		$this->Paginator->settings = array("conditions"=>$cond);

		$linksStatus = $this->Menuitem->find('list', array(
			'conditions' => array(
				'Menuitem.menus_id' => $id,
			),
			'fields' => array(
				'Menuitem.id',
				'Menuitem.status',
			),
		));
		//$this->set('menuitems', $this->Paginator->paginate());
		//$this->set('actionName',"Danh sách menu");
		$this->set(compact("s_selected","linksTree","linksStatus",'id'));
	}


	public function admin_add($menuId = null) {
		if ($this->request->is('post')) {
			$this->Menuitem->create();
            if(empty($this->request->data['Menuitem']['parent_id']) || $this->request->data['Menuitem']['parent_id'] == NULL || !isset($this->request->data['Menuitem']['parent_id'])) $this->request->data['Menuitem']['parent_id'] = 0;
			if ($this->Menuitem->save($this->request->data)) {
				$this->Session->setFlash(__('The menuitem has been saved.'));
				return $this->redirect(array('action'=>'index',$menuId));
			} else {
				$this->Session->setFlash(__('The menuitem could not be saved. Please, try again.'));
			}
		}
		$menuses = $this->Menuitem->Menu->find('list');
		$this->set(compact('menuses'));
		$parent = $this->Menuitem->generateTreeList(array(
			'menus_id' => $menuId
		));
		$this->set("parent",$parent);
		$this->set("menuId",$menuId);
	}

	public function admin_edit($id = null,$menuId = null) {
		if (!$this->Menuitem->exists($id)) {
			throw new NotFoundException(__('Invalid menuitem'));
		}
		if ($this->request->is(array('post', 'put'))) {
           // var_dump($this->request->data['Menuitem']);exit;
			if($this->request->data['Menuitem']['parent_id']=="" || $this->request->data['Menuitem']['parent_id'] == NULL || empty($this->request->data['Menuitem']['parent_id'])){
			    $this->request->data['Menuitem']['parent_id'] = 0;

			    //echo 123;exit;
              // var_dump($this->request->data);exit;
            }

            if ($this->Menuitem->save($this->request->data)) {
				$this->Session->setFlash(__('The menuitem has been saved.'));
				return $this->redirect(array('action' => 'index',$menuId));
			} else {
				$this->Session->setFlash(__('The menuitem could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Menuitem.' . $this->Menuitem->primaryKey => $id));
			$this->request->data = $this->Menuitem->find('first', $options);
		}
		$menuses = $this->Menuitem->Menu->find('list');
		$this->set(compact('menuses'));
		$parent = $this->Menuitem->generateTreeList(array(
			'menus_id' => $menuId
		));
		$this->set("parent",$parent);
	}

	public function admin_delete($id = null) {
		$this->Menuitem->id = $id;
		if (!$this->Menuitem->exists()) {
			throw new NotFoundException(__('Invalid menuitem'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Menuitem->delete()) {
			$this->Session->setFlash(__('The menuitem has been deleted.'));
		} else {
			$this->Session->setFlash(__('The menuitem could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index',2));
	}

	public function admin_movedown($id = null, $delta = 1) {
		$this->Menuitem->id = $id;
		if (!$this->Menuitem->exists()) {
			throw new NotFoundException(__('InvalidContent'));
		}

		if ($delta > 0) {
			$this->Menuitem->moveDown($this->Menuitem->id, abs($delta));
		} else {
			$this->Session->setFlash(
				'Please provide the number of positions the field should be moved down.'
			);
		}

		return $this->redirect($this->referer());
	}

	public function admin_moveup($id = null, $delta = 1) {
		$this->Menuitem->id = $id;
		if (!$this->Menuitem->exists()) {
			throw new NotFoundException(__('Invalid Menuitem'));
		}

		if ($delta > 0) {
			$this->Menuitem->moveUp($this->Menuitem->id, abs($delta));
		} else {
			$this->Session->setFlash(
				'Please provide a number of positions the Menuitem should be moved up.'
			);
		}

		return $this->redirect($this->referer());
	}
	public function admin_toggle($id,$stt,$s = 'status'){
		if($this->request->is('ajax')){
			$this->request->onlyAllow('ajax');
			$this->layout = "ajax";
			$this->autoRender = false;
			$model = ucfirst(Inflector::singularize($this->name));
			if(isset($id)){
				$this->$model->id = $id;
				if($this->$model->saveField($s,$stt)) return 1; return 0;
			}
			$this->render(false);
		}
    }
    public function admin_link_chooser()
    {
		$aCtrlClasses = App::objects('controller');

        foreach ($aCtrlClasses as $controller) {
            if ($controller != 'AppController') {
                // Load the controller
                App::import('Controller', str_replace('Controller', '', $controller));

                // Load its methods / actions
                $aMethods = get_class_methods($controller);
                foreach ($aMethods as $idx => $method) {
                    if ($method{0} == '_' || strpos($method,"admin_") !== false) {
                        unset($aMethods[$idx]);
                    }
                }
                // Load the ApplicationController (if there is one)
                App::import('Controller', 'AppController');
                $parentActions = get_class_methods('AppController');

                $controllers[$controller] = array_diff($aMethods, $parentActions);
            }
        }

        $this->set('controller',$controllers);

    }
}
