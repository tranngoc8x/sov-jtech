<?php
App::uses('AppController', 'Controller');
class SlidersController extends AppController {

	var $controllerName = "Quản lý Slide";

	public function beforeFilter() {
        parent::beforeFilter();
    }
    public function index()
    {
    	return $this->Slider->find('all',array('conditions'=>array('status'=>2)));
    }
    public function view($id)
    {
    	$this->loadModel("News");
    	$this->News->recursive = -1;
    	if (!$this->News->exists($id)) {
			return null;
		}
    	return $this->News->find('first',array(
    	    'conditions'=>array('status'=>2,'id'=>$id),
            )
        );
    }
	public function admin_index() {
		$this->Slider->recursive = 0;
		$s_selected = 0;
		$cond = array();
		if($this->request->is("post")) {
			$s_selected = $this->request->data['frm']['status'];
			$this->passedArgs["status"] = $this->request->data['frm']['status'];
		}
		if(isset($this->passedArgs["status"])) {
			$cond = array_merge($cond,array('Slider.status'=>$this->passedArgs["status"]));
			$s_selected = $this->passedArgs["status"];
		}
		if($s_selected == 0){
			unset($cond['Slider.status']);
		}
		$this->Paginator->settings = array("conditions"=>$cond,"order"=>"Slider.id desc");

		$this->set('sliders', $this->Paginator->paginate());
		$this->set(compact("s_selected"));
	}

 

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Slider->create();
			//debug($this->request->data('id'));die;
			if ($this->Slider->save($this->request->data)) {
				$this->Session->setFlash(__('The Slider has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Slider could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		if (!$this->Slider->exists($id)) {
			throw new NotFoundException(__('InvalidContent'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if(!empty($this->request->data['Slider']['image']['name']) || $this->request->data['Slider']['remove'] == 1)
			{
				$this->Slider->deleteFiles($id);
			}
			//$this->request->data['Slider']['image'] =  $this->request->data['Slider']['image']['name'];
			if ($this->Slider->save($this->request->data, true)) {
				$this->Session->setFlash(__('The Slider has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Slider could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Slider.' . $this->Slider->primaryKey => $id));
			$this->request->data = $this->Slider->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->Slider->id = $id;
		$this->render = false;
		$this->autoRender = false;
		if (!$this->Slider->exists()) {
			throw new NotFoundException(__('InvalidContent'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->Slider->deleteFiles($id);
		if ($this->Slider->delete()) {
			$this->Session->setFlash(__('The Slider has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Slider could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			$this->Slider->id = $v;
			 if ($this->Slider->exists()) {
			// 	throw new NotFoundException(__('InvalidContent'));
			// }
			$this->request->onlyAllow('get', 'admin_mdelete');
			@$this->Slider->deleteFiles($v);
			if ($this->Slider->delete()) {
				$this->Session->setFlash(__('The Slider has been deleted.'));
			} else {
				$this->Session->setFlash(__('The Slider could not be deleted. Please, try again.'));
			}}
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
