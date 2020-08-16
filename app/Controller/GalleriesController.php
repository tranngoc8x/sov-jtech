<?php
 /**
 *@author Trần Ngọc Thắng
 *@link fb.comm/tranngoc8x
 *@since cake v2.4
 **/

App::uses('AppController', 'Controller');
class GalleriesController extends AppController {

	public $components = array('Paginator');
	public function beforeRender()
    {
    	$this->set('pagetitle','gallery');
    }
	public function index() {
		$this->Gallery->recursive = 1;
		$this->Gallery->hasMany['Image']['limit'] =1;
        $this->Gallery->hasMany['Image']['conditions'] = array('actived'=>1);
		$this->Paginator->settings = array("conditions"=>array('Gallery.status'=>2),'order'=>'published DESC,id desc','limit'=>12);
		$this->set('galleries', $this->Paginator->paginate());
	}
	public function view($id=null) {
		$this->Gallery->recursive = 1;
		$galleries = $this->Gallery->find('first',array('conditions'=>array('Gallery.status'=>2,'id'=>$id)));
		$this->set('galleries', $galleries);


		$this->Paginator->settings = array("conditions"=>array('Gallery.status'=>2,'Image.galleries_id'=>$id),'order'=>'Image.ID DESC');
		$this->set('images', $this->Paginator->paginate('Image'));
		
		$other = $this->Gallery->find('all',array('fields'=>array('Gallery.id','Gallery.name'),'conditions'=>array('Gallery.status'=>2,'Gallery.id <>'=>(int)$id),'order'=>'Gallery.published DESC','limit'=>20));
		$this->set(compact('other'));
	}
	public function getImg()
	{
		$this->Gallery->hasMany['Image']['limit'] =1;
		$grights = $this->Gallery->find('all',array('conditions'=>array('Gallery.status'=>2)));
		return $grights;
	}
	public function admin_index() {
		$this->Gallery->recursive = 0;
		$s_selected = 0;
		$cond = array();
		if($this->request->is("post")) {
			$s_selected = $this->request->data['frm']['status'];
			$this->passedArgs["status"] = $this->request->data['frm']['status'];
			$s = $this->request->data['frm']['s'];
			$this->passedArgs["name"] = $this->request->data['frm']['s'];
		}
		if(isset($this->passedArgs["status"])) {
			$cond = array_merge($cond,array('Gallery.status'=>$this->passedArgs["status"]));
			$s_selected = $this->passedArgs["status"];
		}
		if(isset($this->passedArgs["name"])) {
			$cond = array_merge($cond,array('Gallery.name LIKE'=>'%'.$this->passedArgs["name"].'%'));
			$s = $this->passedArgs["name"];
		}
		if($s_selected == 0){
			unset($cond['Gallery.status']);
		}
		$this->Paginator->settings = array("conditions"=>$cond,'order'=>"Gallery.id DESC");
		$this->set(compact("s_selected"));
		$this->set('galleries', $this->Paginator->paginate());
	}
	public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			$this->Gallery->id = $v;
			if (!$this->Gallery->exists()) {
				throw new NotFoundException(__('InvalidContent'));
			}
			$this->request->onlyAllow('get', 'admin_mdelete');
			if ($this->Gallery->delete()) {
				$this->Session->setFlash(__('The news has been deleted.'));
			} else {
				$this->Session->setFlash(__('The news could not be deleted. Please, try again.'));
			}
		endforeach;
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_view($id = null) {
		if (!$this->Gallery->exists($id)) {
			throw new NotFoundException(__('Invalid gallery'));
		}
		$options = array('conditions' => array('Gallery.' . $this->Gallery->primaryKey => $id));
		$this->set('gallery', $this->Gallery->find('first', $options));
	}
	public function admin_add() {
		if ($this->request->is('post')) {
            $date = null;
			if(!empty($this->request->data['Gallery']['published']))
				$date = DateTime::createFromFormat('d/m/Y H:i', $this->request->data['Gallery']['published']);
            $this->request->data['Gallery']['published']= $date->format('Y-m-d H:i:s');
            $this->Gallery->create();
 			if ($this->Gallery->save($this->request->data)) {
				$this->Session->setFlash(__('The gallery has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gallery could not be saved. Please, try again.'));
			}
		}
	}
	public function admin_addimage($id = null)
	{
		if (empty($id)) {
			return $this->redirect(array('action' => 'index'));
		}
		$this->set('galleries',$id);
	}

	public function admin_edit($id = null) {
		if (!$this->Gallery->exists($id)) {
			throw new NotFoundException(__('Invalid gallery'));
		}
		if ($this->request->is(array('post', 'put'))) {
            $date = null;
			if(!empty($this->request->data['Gallery']['published']))
				$date = DateTime::createFromFormat('d/m/Y H:i', $this->request->data['Gallery']['published']);
            $this->request->data['Gallery']['published']= $date->format('Y-m-d H:i:s');
			if ($this->Gallery->save($this->request->data)) {
				$this->Session->setFlash(__('The gallery has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gallery could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Gallery.' . $this->Gallery->primaryKey => $id));
			$this->request->data = $this->Gallery->find('first', $options);
		}
	}
	public function admin_delete($id = null) {
		$this->Gallery->id = $id;
		if (!$this->Gallery->exists()) {
			throw new NotFoundException(__('Invalid gallery'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Gallery->delete()) {
			$this->Session->setFlash(__('The gallery has been deleted.'));
		} else {
			$this->Session->setFlash(__('The gallery could not be deleted. Please, try again.'));
		}
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
