<?php
App::uses('AppController', 'Controller');
class PartnersController extends AppController {

	var $controllerName = "Quản lý Video - Hình ảnh";

	public function beforeFilter() {
        parent::beforeFilter();
    }
    public function index()
    {
       $this->Paginator->settings = array("conditions"=>array('status'=>2),"order"=>"Partner.id desc",'limit'=>6);
       $this->set('list', $this->Paginator->paginate());
       // $list = $this->Partner->find('all');
        //$this->set('list',$list);
    }
    public function lists(){
	    $partner  = $this->Partner->find('all');
	    return $partner;
    }
	public function admin_index() {
		$this->Partner->recursive = 0;
		$s_selected = 0;
		$cond = array();
		if($this->request->is("post")) {
			$s_selected = $this->request->data['frm']['status'];
			$this->passedArgs["status"] = $this->request->data['frm']['status'];
			$s = $this->request->data['frm']['s'];
			$this->passedArgs["name"] = $this->request->data['frm']['s'];
		}
		if(isset($this->passedArgs["status"])) {
			$cond = array_merge($cond,array('Partner.status'=>$this->passedArgs["status"]));
			$s_selected = $this->passedArgs["status"];
		}
		if(isset($this->passedArgs["name"])) {
			$cond = array_merge($cond,array('Partner.name LIKE'=>'%'.$this->passedArgs["name"].'%'));
			$s = $this->passedArgs["name"];
		}

		if($s_selected == 0){
			unset($cond['Partner.status']);
		}
		$this->Paginator->settings = array("conditions"=>$cond,"order"=>"Partner.id desc");

		$this->set('partners', $this->Paginator->paginate());
		$this->set(compact("s_selected"));
	}
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Partner->create();
			if ($this->Partner->save($this->request->data)) {
				$this->Session->setFlash(__('The Partner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Partner could not be saved. Please, try again.'));
			}
		}
	}
    public function admin_savemap() {
	    $this->layout= false;
	    $this->autoRender = false;
        if ($this->request->is('post')) {
            debug($this->request->data);
            $this->Partner->save($this->request->data);
        }
    }
	public function admin_maps() {
		$list = $this->Partner->find('all');
		$this->set('list',$list);
	}

	public function admin_edit($id = null) {
		if (!$this->Partner->exists($id)) {
			throw new NotFoundException(__('InvalidContent'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if(!empty($this->request->data['Partner']['image']['name']) || $this->request->data['Partner']['remove'] == 1)
			{
				$this->Partner->deleteFiles($id);
			}
			if ($this->Partner->save($this->request->data, true)) {
				$this->Session->setFlash(__('The Partner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Partner could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Partner.' . $this->Partner->primaryKey => $id));
			$this->request->data = $this->Partner->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->Partner->id = $id;
		if (!$this->Partner->exists()) {
			throw new NotFoundException(__('InvalidContent'));
		}
		$this->request->onlyAllow('post', 'delete');
		@$this->Partner->deleteFiles($id);
		if ($this->Partner->delete()) {
			$this->Session->setFlash(__('The Partner has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Partner could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			$this->Partner->id = $v;
			if (!$this->Partner->exists()) {
				throw new NotFoundException(__('InvalidContent'));
			}
			$this->request->onlyAllow('get', 'admin_mdelete');
			@$this->Partner->deleteFiles($v);
			if ($this->Partner->delete()) {
				$this->Session->setFlash(__('The Partner has been deleted.'));
			} else {
				$this->Session->setFlash(__('The Partner could not be deleted. Please, try again.'));
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
