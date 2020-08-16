<?php
App::uses('AppController', 'Controller');
/**
 * Contents Controller
 *
 * @property Content $Content
 * @property PaginatorComponent $Paginator
 */
class ContentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	var $controllerName = "Quản lý nội dung";


	public function beforeRender()
    {
    	$this->set('pagetitle','aboutus');
    }
	public function getContent($type,$many = false){
		if($many!=false)
		return $this->Content->find('all',array('conditions'=>array('type'=>$type,'status'=>2)));
		return $this->Content->find('first',array('conditions'=>array('type'=>$type,'status'=>2)));
	}
	public function getPage($page){
		return $this->Content->find('first',array('conditions'=>array('phone'=>$page,'status'=>2)));
	}
	public function jobs($page){
		$jobs =  $this->Content->find('first',array('conditions'=>array('type'=>'jobs','status'=>2)));
        $this->set('jobis',$jobs);
	}

	public function index($value='')
	{
		# code...
	}
	public function view($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid Content'));
		}
		$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
		$contentd =  $this->Content->find('first', $options);
		if ($this->request->params['requested']) {
			$this->layout= false;
			$this->autoRender = false;
            return $contentd;
        }
		$this->set('contentd',$contentd);
	}
		public function maps($id = null) {

		$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
		$contentd =  $this->Content->find('first', $options);
            return $contentd;
       
	}
	public function admin_index($type='phone') {
		$s_selected = 0;
		$cond = array('type'=>$type);
		if($this->request->is("post")) {
			$s_selected = $this->request->data['frm']['status'];
			$this->passedArgs["status"] = $this->request->data['frm']['status'];
			$s = $this->request->data['frm']['s'];
			$this->passedArgs["name"] = $this->request->data['frm']['s'];
		}
		if(isset($this->passedArgs["status"])) {
			$cond = array_merge($cond,array('Content.status'=>$this->passedArgs["status"]));
			$s_selected = $this->passedArgs["status"];
		}
		if(isset($this->passedArgs["name"])) {
			$cond = array_merge($cond,array('Content.name LIKE'=>'%'.$this->passedArgs["name"].'%'));
			$s = $this->passedArgs["name"];
		}
		if($s_selected == 0){
			unset($cond['Content.status']);
		}
		$this->Paginator->settings = array("conditions"=>$cond);
		$this->set(compact("s_selected",'type'));
		$this->set('contents', $this->Paginator->paginate());
	}

	public function admin_add($type='hotline') {
		if ($this->request->is('post')) {
			$this->Content->create();
			if ($this->Content->save($this->request->data)) {
				$type = $this->request->data['Content']['type'];
				$this->Session->setFlash(__('The content has been saved.'));
				return $this->redirect(array('action' => 'index',$type));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		}
		$this->set('type',$type);
	}

	public function admin_edit($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash(__('The content has been saved.'));
				return $this->redirect(array('action' => 'index',$this->request->data['Content']['type']));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
			$this->request->data = $this->Content->find('first', $options);
		}
	}
	public function admin_delete($id = null) {
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Content->delete()) {
			$this->Session->setFlash(__('The content has been deleted.'));
		} else {
			$this->Session->setFlash(__('The content could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			if(is_numeric($v)){
			$this->Content->id = $v;
			if (!$this->Content->exists()) {
				throw new NotFoundException(__('InvalidContent'));
			}
			$this->request->onlyAllow('get', 'admin_mdelete');
			if ($this->Content->delete()) {
				$this->Session->setFlash(__('The Content has been deleted.'));
			} else {
				$this->Session->setFlash(__('The Content could not be deleted. Please, try again.'));
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
