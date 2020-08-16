<?php
App::uses('AppController', 'Controller');
class ProductsController extends AppController {
	public $components = array('Paginator');
	//public $components = array('Paginator','Comment.Commentable');
	public function beforeRender()
    {
    	$this->set('pagetitle','product');
    }
    public function index($cid=null,$page=1){
	    if($cid== null){
            $cid = isset($this->request->params['id']) ? (int)$this->request->params['id']: null;
        }
        $cond = array('Product.status'=>2);
        if($cid!=null){
            $cond = array_merge($cond,array('Product.catalogs_id'=>$cid));
        }
        $this->Product->recursive = -1;
        $this->passedArgs['id'] = $cid;
    	$this->Paginator->settings = array('fields'=>array('hot','imagesmall','id','title','title_en','price','image','description','description_en','showprice'),"conditions"=>$cond,"order"=>"id DESC",'limit'=>12);
        $this->set('products', $this->Paginator->paginate());
        $this->set('pagetitle','product');
    }


    public function listmenu(){
        $this->loadModel('Catalog');
        $linksTree = $this->Catalog->generateTreeList(
            null,
            null,
            null,
            "___"
        );
        return $linksTree;
        //return $this->News->Catenews->find('all',array('fields'=>array('Catenews.id','Catenews.name','Catenews.name_en'),'conditions'=>array('Catenews.status'=>2),'order'=>'Catenews.id DESC'));

    }
	public function view($id = null) {
		//$this->layout= 'default1';
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$product = $this->Product->find('first', $options);
		$this->set('product', $product);
		$cid = $product['Product']['catalogs_id'];
		$sameProducts = $this->Product->find('all',array('conditions'=>array('Product.catalogs_id'=>$cid,'Product.status'=>2),'fields'=>array('hot','description','description_en','title','title_en','id','imagesmall'),'limit'=>10,'order'=>array('RAND()')));
		$this->set('sameProducts',$sameProducts);
		$this->set('cid',$cid);
		$this->Product->id = $id;
		$viewcount = (int)$product['Product']['hitstotal'] +1;
		//$this->Product->saveField('hitstotal',$viewcount);
	}


	public function admin_index() {
 		$s_selected = 0;
		$cond = array();
		if($this->request->is("post")) {
			$s_selected = $this->request->data['frm']['status'];
			$this->passedArgs["status"] = $this->request->data['frm']['status'];
			$s = $this->request->data['frm']['s'];
			$this->passedArgs["name"] = $this->request->data['frm']['s'];
			$catalogs_id = $this->request->data['frm']['catalogs_id'];
			$this->passedArgs["catalogs_id"] = $this->request->data['frm']['catalogs_id'];
		}
		if(isset($this->passedArgs["status"])) {
			$cond = array_merge($cond,array('Product.status'=>$this->passedArgs["status"]));
			$s_selected = $this->passedArgs["status"];
		}
		if(isset($this->passedArgs["name"])) {
			$cond = array_merge($cond,array("Product.title LIKE"=>'%'.$this->passedArgs["name"].'%'));
			$s = $this->passedArgs["name"];
		}
		if(isset($this->passedArgs["catalogs_id"])) {
			$cond = array_merge($cond,array('Product.catalogs_id'=>$this->passedArgs["catalogs_id"]));
		}

		if($s_selected == 0){
			unset($cond['Product.status']);
		}
		if(empty($catalogs_id )){
			unset($cond['Product.catalogs_id']);
		}
		$this->Paginator->settings = array("conditions"=>$cond,"order"=>"Product.id desc");

		$this->set('products', $this->Paginator->paginate());
		$this->set(compact("s_selected"));
		$catalogs = $this->Product->Catalog->find('list');
		$this->set(compact('catalogs'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			//debug($this->request->data('id'));die;
			 
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				#debug($this->Product->validationErrors); //show validationErrors

				#debug($this->Product->getDataSource()->getLog(false, false));
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
		$catalogs = $this->Product->Catalog->find('list',array('conditions'=>array('Catalog.status'=>2)));
		$this->set(compact('catalogs'));
	}


	public function admin_edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if(!empty($this->request->data['Product']['image']['name']) || $this->request->data['Product']['remove'] == 1)
			{
				$this->Product->deleteFiles($id);
			}
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		$catalogs = $this->Product->Catalog->find('list');
		$this->set(compact( 'catalogs'));
		//$this->render ('admin_add');
	}

	public function admin_delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->Product->deleteFiles($id);
		if ($this->Product->delete()) {

			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			$this->Product->id = $v;
			if (!$this->Product->exists()) {
				throw new NotFoundException(__('InvalidContent'));
			}
			$this->request->onlyAllow('get', 'admin_mdelete');
			@$this->Product->deleteFiles($v);
			if ($this->Product->delete()) {
				$this->Session->setFlash(__('The Product has been deleted.'));
			} else {
				$this->Session->setFlash(__('The Product could not be deleted. Please, try again.'));
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
?>