<?php
 /** *@author Trần Ngọc Thắng *@link fb.comm/tranngoc8x *@since cake v2.4 **/
 App::uses('AppController', 'Controller');



class QuestionsController extends AppController {
    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow("add");
    }
	public $components = array('Paginator');
	public function index() {
		$this->Question->recursive = 0;
		$rated_questions = $this->Question->find('all', array('conditions'=>array('status'=>2,'types'=>1),'order'=>'id desc'));
        $this->Paginator->settings = array("conditions"=>array('status'=>2,'types'=>0),"order"=>"id DESC");
        $this->set('questions', $this->Paginator->paginate());
		$this->set('rated_questions',$rated_questions);
	}

	public function admin_index() {
		$this->Question->recursive = 0;
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
		$this->Paginator->settings = array("conditions"=>$cond,"order"=>"id DESC");

		$this->set(compact("s_selected"));
		$this->set('questions', $this->Paginator->paginate());
	}


    public function admin_edit($id=null){
        if (!$this->Question->exists($id)) {
            throw new NotFoundException(__('Invalid about'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if ($this->Question->save($this->request->data)) {
                $this->Session->setFlash(__('Đã lưu thông tin.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Có lỗi xẩy ra, không lưu được.'));
            }
        } else {
            $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
            $this->request->data = $this->Question->find('first', $options);
        }
    }
	public function add() {

		if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Question']['types'] = 0;
            $this->request->data['Question']['status'] = 1;
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('Đã lưu thông tin.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Có lỗi xẩy ra, không lưu được.'));
			}
		}
        return $this->redirect(array('action' => 'index'));
	}

	public function admin_delete($id = null) {
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Không tồn tại bản ghi'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Question->delete()) {
			$this->Session->setFlash(__('Bản ghi đã được xóa.'));
		} else {
			$this->Session->setFlash(__('Bản ghi chưa được xóa.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			$this->Question->id = $v;
			if ($this->Question->exists()) {
				$this->request->onlyAllow('get', 'admin_mdelete');
				if ($this->Question->delete()) {
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
