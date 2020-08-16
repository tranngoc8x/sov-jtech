<?php
App::uses('AppController', 'Controller');
class EventsController extends AppController {
	public $components = array('Paginator');
	//public $components = array('Paginator','Comment.Commentable');
	public function beforeRender()
    {
    	$this->set('pagetitle','product');
    }
    public function index(){
    	$this->Paginator->settings = array("conditions"=>array('Event.status'=>2),"order"=>"Event.id DESC",'limit'=>12);
        $this->set('events', $this->Paginator->paginate());
    }

    public function listevent(){
        $this->Paginator->settings = array("conditions"=>array('Event.status'=>2),"order"=>"id DESC",'limit'=>12);
        $this->set('events', $this->Paginator->paginate());
    }

	public function view($id = null) {
		//$this->layout= 'default1';
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$event = $this->Event->find('first', $options);
		$this->set('event', $event);
		$this->Event->id = $id;
		$view = @$event['Event']['hitstotal'] +1;
		$this->Event->saveField('hitstotal',$view);
        $this->loadModel("News");
        $hotnews = $this->News->find('all',array('fields'=>array('News.id','News.name','News.name_en','News.introtext','News.introtext_en','News.imagesmall'),'conditions'=>array('News.status'=>2,'News.id <>'=>(int)$id,'News.hotnews'=>1,'publishdate <=' =>date('Y-m-d H:i:s')),'limit'=>5,'order'=>'News.publishdate DESC, News.id DESC'));
        $this->set('hotnews',$hotnews);
		
		$otherevent = $this->Event->find('all', array('conditions' => array('Event.status'=>2,'Event.id <> '=>$id),'order'=>'Event.start_date asc','limit'=> 10 ));
		$this->set('otherevent',$otherevent);
	}

	public function admin_index() {
 		$s_selected = 0;
		$cond = array();
		if($this->request->is("post")) {
			$s_selected = $this->request->data['frm']['status'];
			$this->passedArgs["status"] = $this->request->data['frm']['status'];
			$s = $this->request->data['frm']['s'];
			$this->passedArgs["name"] = $this->request->data['frm']['s'];
  		}
		if(isset($this->passedArgs["status"])) {
			$cond = array_merge($cond,array('Event.status'=>$this->passedArgs["status"]));
			$s_selected = $this->passedArgs["status"];
		}
		if(isset($this->passedArgs["name"])) {
			$cond = array_merge($cond,array("Event.title LIKE"=>'%'.$this->passedArgs["name"].'%'));
			$s = $this->passedArgs["name"];
		}


		if($s_selected == 0){
			unset($cond['Event.status']);
		}
		if(empty($catalogs_id )){
			unset($cond['Event.catalogs_id']);
		}
		$this->Paginator->settings = array("conditions"=>$cond,"order"=>"Event.id desc");

		$this->set('events', $this->Paginator->paginate());
		$this->set(compact("s_selected"));

	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Event->create();
          
            $date = null;
			if(!empty($this->request->data['Event']['start_date']))
				$date = DateTime::createFromFormat('d/m/Y H:i', $this->request->data['Event']['start_date']);
            $this->request->data['Event']['start_date']= $date->format('Y-m-d H:i:s');
             $dateend = null;
			if(!empty($this->request->data['Event']['end_date']))
				$dateend = DateTime::createFromFormat('d/m/Y H:i', $this->request->data['Event']['end_date']);
            $this->request->data['Event']['end_date']= $dateend->format('Y-m-d H:i:s');

			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
	}


	public function admin_edit($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if(!empty($this->request->data['Event']['image']['name']) || $this->request->data['Event']['remove'] == 1)
			{
				$this->Event->deleteFiles($id);
			}
			$date = null;
			if(!empty($this->request->data['Event']['start_date']))
				$date = DateTime::createFromFormat('d/m/Y H:i', $this->request->data['Event']['start_date']);
            $this->request->data['Event']['start_date']= $date->format('Y-m-d H:i:s');
             $dateend = null;
			if(!empty($this->request->data['Event']['end_date']))
				$dateend = DateTime::createFromFormat('d/m/Y H:i', $this->request->data['Event']['end_date']);
            $this->request->data['Event']['end_date']= $dateend->format('Y-m-d H:i:s');
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {


			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$event = $this->Event->find('first', $options);



            $sdatetime = $event['Event']['start_date'];
            $event['Event']['startdate'] = date("d/m/Y",strtotime($sdatetime));
            $event['Event']['starttime'] = date("g : i A",strtotime($sdatetime));
            $edatetime = $event['Event']['end_date'];
            $event['Event']['enddate'] = date("d/m/Y",strtotime($edatetime));
            $event['Event']['endtime'] = date("g : i A",strtotime($edatetime));
            $this->request->data = $event;
		}
		//$this->render ('admin_add');
	}

	public function admin_delete($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->onlyAllow('post', 'delete');
		$this->Event->deleteFiles($id);
		if ($this->Event->delete()) {

			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			$this->Event->id = $v;
			if (!$this->Event->exists()) {
				throw new NotFoundException(__('InvalidContent'));
			}
			$this->request->onlyAllow('get', 'admin_mdelete');
			@$this->Event->deleteFiles($v);
			if ($this->Event->delete()) {
				$this->Session->setFlash(__('The Event has been deleted.'));
			} else {
				$this->Session->setFlash(__('The Event could not be deleted. Please, try again.'));
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