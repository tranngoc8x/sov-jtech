<?php
App::uses('AppController', 'Controller');
/**
 * Info Controller
 *
 * @property Info $Info
 * @property PaginatorComponent $Paginator
 */
class InfosController extends AppController {

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
		$this->Info->recursive = 0;
		$listmenu =  $this->Info->find('all',array('order'=>array('Info.id ASC'),'limit'=>5));
		return $listmenu;
	}
 
	public function catalog(){
		$this->Info->recursive = 0;
		$infos =  $this->Info->find('all',array('order'=>array('Info.id ASC')));
		$this->set(compact('infos'));
	}
	public function admin_index() {
		$s_selected = 0;
		$cond = array();

		if($this->request->is("post")) {
			$s_selected = $this->request->data['frm']['status'];
			$this->passedArgs["status"] = $this->request->data['frm']['status'];
			$s = $this->request->data['frm']['s'];
			$this->passedArgs["name"] = $this->request->data['frm']['s'];
		}
		if(isset($this->passedArgs["status"])) {
			$cond = array_merge($cond,array('Info.status'=>$this->passedArgs["status"]));
			$s_selected = $this->passedArgs["status"];
		}
		if(isset($this->passedArgs["name"])) {
			$cond = array_merge($cond,array('Info.name LIKE'=>'%'.$this->passedArgs["name"].'%'));
			$s = $this->passedArgs["name"];
		}

		if($s_selected == 0){
			unset($cond['Info.status']);
		}

		$this->Paginator->settings = array("conditions"=>$cond,"order"=>"Info.id desc");
		$this->set('infos', $this->Paginator->paginate());
		$this->set('s_selected',$s_selected);

	}

	public function admin_view($id = null) {
		if (!$this->Info->exists($id)) {
			throw new NotFoundException(__('Invalid Info'));
		}
		$options = array('conditions' => array('Info.' . $this->Info->primaryKey => $id));
		$this->set('Info', $this->Info->find('first', $options));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Info->create();
			if ($this->Info->save($this->request->data)) {
				$this->Session->setFlash(__('The Info has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Info could not be saved. Please, try again.'));
			}
		}
	}
	public function admin_movedown($id = null, $delta = 1) {
		$this->Info->id = $id;
		if (!$this->Info->exists()) {
			throw new NotFoundException(__('InvalidContent'));
		}

		if ($delta > 0) {
			$this->Info->moveDown($this->Info->id, abs($delta));
		} else {
			$this->Session->setFlash(
				'Please provide the number of positions the field should be moved down.'
			);
		}

		return $this->redirect($this->referer());
	}

	public function admin_moveup($id = null, $delta = 1) {
		$this->Info->id = $id;
		if (!$this->Info->exists()) {
			throw new NotFoundException(__('Invalid Info'));
		}

		if ($delta > 0) {
			$this->Info->moveUp($this->Info->id, abs($delta));
		} else {
			$this->Session->setFlash(
				'Please provide a number of positions the Info should be moved up.'
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
		if (!$this->Info->exists($id)) {
			throw new NotFoundException(__('Invalid Info'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Info->save($this->request->data)) {
				$this->Session->setFlash(__('The Info has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Info could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Info.' . $this->Info->primaryKey => $id));
			$this->request->data = $this->Info->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->Info->id = $id;
		if (!$this->Info->exists()) {
			throw new NotFoundException(__('Invalid Info'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Info->delete()) {
			$this->Session->setFlash(__('The Info has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Info could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			$this->Info->id = $v;
				if ($this->Info->exists()) {
				$this->request->onlyAllow('get', 'admin_mdelete');
				if ($this->Info->delete()) {
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
