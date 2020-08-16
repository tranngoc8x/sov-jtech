<?php
App::uses('AppController', 'Controller');

class CatalogsController extends AppController {

	public $components = array('Paginator');
	public function index($value='')
	{
		$this->Catalog->recursive = -1;
		$catalogs = $this->Catalog->find('threaded',array('status'=>2));
		$this->set('catalogs',$catalogs);
	}
	public function menu($cond = null)
	{
		$this->Catalog->recursive = 0;
		if($cond == 1)$conds = array_merge(array('inhome'=>1),array('Catalog.status'=>2));
		else $conds = array('Catalog.status'=>2,'Catalog.parent_id'=>null);

		$menu = $this->Catalog->find('threaded',array('conditions'=>$conds,'order'=>array('lft'=>'asc')));
		return $menu;
	}
	public function sidebar($id=null){
		$this->Catalog->recursive = 0;
		if(!empty($id)){
			$node = $this->Catalog->find('first',array('conditions'=>array('id'=>$id)));
			$lft = $node['Catalog']['lft'];
			$rght = $node['Catalog']['rght'];
			$conds = array('Catalog.status'=>2,'Catalog.lft >'=>$lft,'Catalog.rght < '=>$rght);
		}else{
			$conds = array('Catalog.status'=>2);
		}
		$smenu = $this->Catalog->find('threaded',array('conditions'=>$conds,'order'=>array('lft'=>'asc')));

		//$log = $this->Catalog->getDataSource()->getLog(false, false);
		//debug($log);
		return $smenu;
	}
	public function admin_index() {
		$s_selected = 0;
		$cond = array();
		$linksTree = $this->Catalog->generateTreeList(
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
			$cond = array_merge($cond,array('Catalog.status'=>$this->passedArgs["status"]));
			$s_selected = $this->passedArgs["status"];
		}
		if(isset($this->passedArgs["name"])) {
			$cond = array_merge($cond,array('Catalog.name LIKE'=>'%'.$this->passedArgs["name"].'%'));
			$s = $this->passedArgs["name"];
		}

		if($s_selected == 0){
			unset($cond['Catalog.status']);
		}
		if(empty($catalogs_id )){
			unset($cond['Catalog.catalogs_id']);
		}
		$this->Paginator->settings = array("conditions"=>$cond,"order"=>"Catalog.id desc");
		$this->set('Catalogs', $this->Paginator->paginate());
		$linksStatus = $this->Catalog->find('list', array(
			'fields' => array(
				'Catalog.id',
				'Catalog.status',
			),
		));
		$this->set(compact("s_selected","linksTree","linksStatus"));
		$this->set('catalogs', $this->Paginator->paginate());
 	}



	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Catalog->create();
			if ($this->Catalog->save($this->request->data)) {
				$this->Session->setFlash(__('The Catalog has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The Catalog could not be saved. Please, try again.'));
			}
		}
		$parent = $this->Catalog->generateTreeList();
		$this->set("parent",$parent);
	}


	public function admin_edit($id = null) {
		if (!$this->Catalog->exists($id)) {
			throw new NotFoundException(__('Invalid Catalog'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Catalog->save($this->request->data)) {
				$this->Session->setFlash(__('The Catalog has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Catalog could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Catalog.' . $this->Catalog->primaryKey => $id));
			$this->request->data = $this->Catalog->find('first', $options);
		}
		$parent = $this->Catalog->generateTreeList();
		$this->set("parent",$parent);
	}

	public function admin_delete($id = null) {
		$this->Catalog->id = $id;
		if (!$this->Catalog->exists()) {
			throw new NotFoundException(__('Invalid Catalog'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Catalog->delete()) {
			$this->Session->setFlash(__('The Catalog has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Catalog could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_movedown($id = null, $delta = 1) {
		$this->Catalog->id = $id;
		if (!$this->Catalog->exists()) {
			throw new NotFoundException(__('InvalidContent'));
		}

		if ($delta > 0) {
			$this->Catalog->moveDown($this->Catalog->id, abs($delta));
		} else {
			$this->Session->setFlash(
				'Please provide the number of positions the field should be moved down.'
			);
		}

		return $this->redirect($this->referer());
	}

	public function admin_moveup($id = null, $delta = 1) {
		$this->Catalog->id = $id;
		if (!$this->Catalog->exists()) {
			throw new NotFoundException(__('Invalid Catalog'));
		}

		if ($delta > 0) {
			$this->Catalog->moveUp($this->Catalog->id, abs($delta));
		} else {
			$this->Session->setFlash(
				'Please provide a number of positions the Catalog should be moved up.'
			);
		}

		return $this->redirect($this->referer());
	}
	public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			$this->Catalog->id = $v;
			if (!$this->Catalog->exists()) {
				throw new NotFoundException(__('InvalidContent'));
			}
			$this->request->onlyAllow('get', 'admin_mdelete');
			if ($this->Catalog->delete()) {
				$this->Session->setFlash(__('The news has been deleted.'));
			} else {
				$this->Session->setFlash(__('The news could not be deleted. Please, try again.'));
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
