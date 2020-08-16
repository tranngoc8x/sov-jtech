<?php
App::uses('AppController', 'Controller');

class ContactsController extends AppController {

	public $components = array('Paginator','Captcha'=>array('Model'=>'Contact', 'field'=>'captcha'));
	public function beforeRender()
    {
    	$this->set('pagetitle','contact');
    }
	public function index() {
		//$this->layout=false;
		$this->loadModel('Content');
		$maps =  $this->Content->find('first', array('conditions' => array('Content.id'=> 43)));
		$this->set('contactmaps',$maps);

	}
	public function register () {
		//$this->layout=false;

		if ($this->request->is('post')) {
			$this->Contact->setCaptcha('captcha', $this->Captcha->getCode('Contact.captcha'));
			$date = $this->request->data['Contact']['birthday'];
			$tmpdate = str_replace("/", "-", $date);
			$tmpdate = (string)date("Y-m-d",strtotime($tmpdate));
			$this->request->data["Contact"]['birthday'] = $tmpdate;

			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('Cảm ơn bạn đã gửi thông tin, chúng tôi sẽ phản hồi lại sau khi xem.'));
				return $this->redirect(array('controller'=>'contacts','action' => 'register'));
			} else {
				$this->Session->setFlash(__('Có lỗi, vui lòng thử lại.'));
			}
		}

		 $this->loadModel('Content');
		 
		$fcontent2 =  $this->Content->find('first',array('conditions'=>array('type'=>'register','status'=>2)));
		$this->set(compact('fcontent2'));
	}
	public function admin_export() {
		$data = $this->Contact->find('all',array('fields'=>array('name','parents','email','content','phone','address','created','birthday','school'),'order'=>'id desc'));
		$this->set(compact('data'));
		$this->layout = 'ajax';
	}
	public function captcha()	{
	    $this->autoRender = false;
	    $this->layout='ajax';
	    $this->Captcha->create();
	}
	public function admin_index() {
		$this->Contact->recursive = 0;
		$s_selected = 0;
		$cond = array();
		if($this->request->is("post")) {
			$s_selected = $this->request->data['frm']['status'];
			$this->passedArgs["status"] = $this->request->data['frm']['status'];
			$s = $this->request->data['frm']['s'];
			$this->passedArgs["name"] = $this->request->data['frm']['s'];
		}
		if(isset($this->passedArgs["status"])) {
			$cond = array_merge($cond,array('Contact.status'=>$this->passedArgs["status"]));
			$s_selected = $this->passedArgs["status"];
		}
		if(isset($this->passedArgs["name"])) {
			$cond = array_merge($cond,array('Contact.name LIKE'=>'%'.$this->passedArgs["name"].'%'));
			$s = $this->passedArgs["name"];
		}
		if($s_selected == 0){
			unset($cond['Contact.status']);
		}
		$this->Paginator->settings = array("conditions"=>$cond);
		$this->set('contacts', $this->Paginator->paginate());
		$this->set(compact("s_selected"));
	}

	public function admin_view($id = null) {
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
		$this->set('contact', $this->Contact->find('first', $options));
	}

	public function admin_delete($id = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Contact->delete()) {
			$this->Session->setFlash(__('The contact has been deleted.'));
		} else {
			$this->Session->setFlash(__('The contact could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			$this->Contact->id = $v;
				if ($this->Contact->exists()) {
				$this->request->onlyAllow('get', 'admin_mdelete');
				if ($this->Contact->delete()) {
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
