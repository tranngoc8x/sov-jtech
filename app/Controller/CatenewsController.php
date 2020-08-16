<?php
App::uses('AppController', 'Controller');
/**
 * Catenews Controller
 *
 * @property Catenews $Catenews
 * @property PaginatorComponent $Paginator
 */
class CatenewsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	var $controllerName = "Quản lý danh mục";
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Catenews->recursive = 0;
		$listmenu =  $this->Catenews->find('all',array('fields'=>array('id','name','name_en'),'conditions'=>array('status'=>2),'order'=>array('Catenews.lft ASC')));
		return $listmenu;
	}

	public function view($id = null) {
		if (!$this->Catenews->exists($id)) {
			throw new NotFoundException(__('Invalid catenews'));
		}
		$options = array('conditions' => array('Catenews.' . $this->Catenews->primaryKey => $id));
		$this->set('catenews', $this->Catenews->find('first', $options));
	}

	public function admin_index() {

		$s_selected = 0;
		$cond = array();
		$linksTree = $this->Catenews->generateTreeList(
			null,
			null,
			null,
			"___"
		);
		if($this->request->is("post")) {
			$s_selected = $this->request->data['frm']['status'];
			$this->passedArgs["status"] = $this->request->data['frm']['status'];
			$s = $this->request->data['frm']['s'];
			$this->passedArgs["name"] = $this->request->data['frm']['s'];
		}
		if(isset($this->passedArgs["status"])) {
			$cond = array_merge($cond,array('Catenews.status'=>$this->passedArgs["status"]));
			$s_selected = $this->passedArgs["status"];
		}
		if(isset($this->passedArgs["name"])) {
			$cond = array_merge($cond,array('Catenews.name LIKE'=>'%'.$this->passedArgs["name"].'%'));
			$s = $this->passedArgs["name"];
		}

		if($s_selected == 0){
			unset($cond['Catenews.status']);
		}
		if(empty($catenews_id )){
			unset($cond['Catenews.catenews_id']);
		}
		$this->Paginator->settings = array("conditions"=>$cond,"order"=>"Catenews.id desc");
		$this->set('catenews', $this->Paginator->paginate());
		$linksStatus = $this->Catenews->find('list', array(
			'fields' => array(
				'Catenews.id',
				'Catenews.status',
			),
		));
		$this->set(compact("s_selected","linksTree","linksStatus"));
	}

	public function admin_view($id = null) {
		if (!$this->Catenews->exists($id)) {
			throw new NotFoundException(__('Invalid catenews'));
		}
		$options = array('conditions' => array('Catenews.' . $this->Catenews->primaryKey => $id));
		$this->set('catenews', $this->Catenews->find('first', $options));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Catenews->create();
			if ($this->Catenews->save($this->request->data)) {
				$this->Session->setFlash(__('The catenews has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The catenews could not be saved. Please, try again.'));
			}
		}
		$parent = $this->Catenews->generateTreeList();
		$this->set("parent",$parent);
	}
	public function admin_movedown($id = null, $delta = 1) {
		$this->Catenews->id = $id;
		if (!$this->Catenews->exists()) {
			throw new NotFoundException(__('InvalidContent'));
		}

		if ($delta > 0) {
			$this->Catenews->moveDown($this->Catenews->id, abs($delta));
		} else {
			$this->Session->setFlash(
				'Please provide the number of positions the field should be moved down.'
			);
		}

		return $this->redirect($this->referer());
	}

	public function admin_moveup($id = null, $delta = 1) {
		$this->Catenews->id = $id;
		if (!$this->Catenews->exists()) {
			throw new NotFoundException(__('Invalid Catenews'));
		}

		if ($delta > 0) {
			$this->Catenews->moveUp($this->Catenews->id, abs($delta));
		} else {
			$this->Session->setFlash(
				'Please provide a number of positions the Catenews should be moved up.'
			);
		}

		return $this->redirect($this->referer());
	}
/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Catenews->exists($id)) {
			throw new NotFoundException(__('Invalid catenews'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Catenews->save($this->request->data)) {
				$this->Session->setFlash(__('The catenews has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The catenews could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Catenews.' . $this->Catenews->primaryKey => $id));
			$this->request->data = $this->Catenews->find('first', $options);
		}
		$parent = $this->Catenews->generateTreeList();
		$this->set("parent",$parent);
	}

	public function admin_delete($id = null) {
		$this->Catenews->id = $id;
		if (!$this->Catenews->exists()) {
			throw new NotFoundException(__('Invalid catenews'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Catenews->delete()) {
			$this->Session->setFlash(__('The catenews has been deleted.'));
		} else {
			$this->Session->setFlash(__('The catenews could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			$this->Catenews->id = $v;
				if ($this->Catenews->exists()) {
				$this->request->onlyAllow('get', 'admin_mdelete');
				if ($this->Catenews->delete()) {
					$this->Session->setFlash(__('The news has been deleted.'));
				} else {
					$this->Session->setFlash(__('The news could not be deleted. Please, try again.'));
				}
			}
		endforeach;
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_toggle($id,$stt,$s = 'status'){
		if($this->request->is('ajax')){
			$this->request->onlyAllow('ajax');
			//$coms = $this->Components->load('Comm');
			$this->layout = "ajax";
			$this->autoRender = false;
			$model = ucfirst(Inflector::singularize($this->name));
			if(isset($id)){
				$this->$model->id = $id;
				// $_a = 2;
				// if($stt == 2){$_a = 1;}
				if($this->$model->saveField($s,$stt)) return 1; return 0;
				//$arr = array('stt'=>$stt,'success'=>0);
				//if($this->$model->saveField($s,$stt)){$arr['success'] = 1;return json_encode($arr);}
				//return json_encode($arr);
			}
			$this->render(false);
		}
    }
}
