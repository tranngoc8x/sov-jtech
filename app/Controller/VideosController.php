<?php
 /** *@author Trần Ngọc Thắng *@link fb.comm/tranngoc8x *@since cake v2.4 **/App::uses('AppController', 'Controller');

class VideosController extends AppController {


	public $components = array('Paginator');

	public function index() {
		$this->Video->recursive = 0;
		$this->Paginator->settings = array("conditions"=>array('status'=>2),"order"=>"published desc, id desc",'limit'=>12);
		$this->set('videos', $this->Paginator->paginate());
	}

	public function view($id) {
		$options = array('conditions' => array('Video.status'=>2,'id'=>$id),'order'=>'id DESC' );
		$video = $this->Video->find('first', $options);


		$othervideo = $this->Video->find('all', array('conditions' => array('Video.status'=>2,'id <> '=>$id),'order'=>'published desc,id DESC','limit'=> 3 ));

		$this->set('video',$video);
		$this->set('othervideo',$othervideo);
	}

	public function admin_index() {
		$this->Video->recursive = 0;
		$s_selected = 0;
		$cond = array();
		if($this->request->is("post")) {
			$s_selected = $this->request->data['frm']['status'];
			$this->passedArgs["status"] = $this->request->data['frm']['status'];
			$s = $this->request->data['frm']['s'];
			$this->passedArgs["name"] = $this->request->data['frm']['s'];
		}
		if(isset($this->passedArgs["status"])) {
			$cond = array_merge($cond,array('status'=>$this->passedArgs["status"]));
			$s_selected = $this->passedArgs["status"];
		}
		if(isset($this->passedArgs["name"])) {
			$cond = array_merge($cond,array('name LIKE'=>'%'.$this->passedArgs["name"].'%'));
			$s = $this->passedArgs["name"];
		}
		if($s_selected == 0){
			unset($cond['status']);
		}
		$this->Paginator->settings = array("conditions"=>$cond,"order"=>"id desc");

		$this->set(compact("s_selected"));
		$this->set('videos', $this->Paginator->paginate());
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Video->create();
			$date = null;
			if(!empty($this->request->data['Video']['published']))
				$date = DateTime::createFromFormat('d/m/Y H:i', $this->request->data['Video']['published']);
            $this->request->data['Video']['published']= $date->format('Y-m-d H:i:s');
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash(__('The video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video could not be saved. Please, try again.'));
			}
		}
	}


	public function admin_edit($id = null) {
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$date = null;
			if(!empty($this->request->data['Video']['published']))
				$date = DateTime::createFromFormat('d/m/Y H:i', $this->request->data['Video']['published']);
            $this->request->data['Video']['published']= $date->format('Y-m-d H:i:s');
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash(__('The video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Video.' . $this->Video->primaryKey => $id));
			$this->request->data = $this->Video->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Video->delete()) {
			$this->Session->setFlash(__('The video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The video could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
		public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			if(is_numeric(($v))){
				$this->Video->id = $v;
				if (!$this->Video->exists()) {
					throw new NotFoundException(__('InvalidContent'));
				}
				$this->request->onlyAllow('get', 'admin_mdelete');
				if ($this->Video->delete()) {
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
