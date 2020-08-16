<?php
 /** *@author Trần Ngọc Thắng *@link fb.comm/tranngoc8x *@since cake v2.4 **/
 App::uses('AppController', 'Controller');



class AboutsController extends AppController {
	public $components = array('Paginator');
	public function index() {
		$this->About->recursive = 0;
		$abouts = $this->About->find('all', array('conditions'=>array('status'=>2,'showhome'=>1),'order'=>'orders asc'));
		$this->set('abouts',$abouts);
	}

    public function listmenu()
    {
        return $this->About->find('all', array('fields'=>array('id','name','name_en'),'conditions'=>array('status'=>2),'order'=>'orders asc'));
    }
	public function admin_index() {
		$this->About->recursive = 0;
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
		$this->Paginator->settings = array("conditions"=>$cond,"order"=>"orders ASC");

		$this->set(compact("s_selected"));
		$this->set('abouts', $this->Paginator->paginate());
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->About->create();
			if ($this->About->save($this->request->data)) {
				$this->Session->setFlash(__('The about has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The about could not be saved. Please, try again.'));
			}
		}
	}
    public function view($id=null){
	    if($id==null) $id=(int)$this->request->params['id'];
        $options = array('conditions' => array('About.' . $this->About->primaryKey => $id));
        $about = $this->About->find('first', $options);
        $this->set('about',$about);
		
		$otherabout = $this->About->find('all', array('conditions' => array('About.status'=>2,'id <> '=>$id),'order'=>'orders ASC','limit'=> 10 ));
		$this->set('otherabout',$otherabout);
    }
	public function admin_edit($id = null) {
		if (!$this->About->exists($id)) {
			throw new NotFoundException(__('Invalid about'));
		}
		if ($this->request->is(array('post', 'put'))) {
            if(!empty($this->request->data['About']['image']['name']) || $this->request->data['About']['remove'] == 1)
            {
                $this->About->delete($id);
            }
			if ($this->About->save($this->request->data)) {
				$this->Session->setFlash(__('Đã lưu thông tin.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Có lỗi xẩy ra, không lưu được.'));
			}
		} else {
			$options = array('conditions' => array('About.' . $this->About->primaryKey => $id));
			$this->request->data = $this->About->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->About->id = $id;
		if (!$this->About->exists()) {
			throw new NotFoundException(__('Không tồn tại bản ghi'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->About->delete()) {
			$this->Session->setFlash(__('Bản ghi đã được xóa.'));
		} else {
			$this->Session->setFlash(__('Bản ghi chưa được xóa.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			$this->About->id = $v;
			if ($this->About->exists()) {
				$this->request->onlyAllow('get', 'admin_mdelete');
				if ($this->About->delete()) {
					$this->Session->setFlash(__('Bản ghi đã được xóa.'));
				} else {
					$this->Session->setFlash(__('Bản ghi chưa được xóa.'));
				}
			}
		endforeach;
		return $this->redirect(array('action' => 'index'));
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
}
