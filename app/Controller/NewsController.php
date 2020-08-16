<?php
 /**
 *@author Trần Ngọc Thắng
 *@link fb.comm/tranngoc8x
 *@since cake v2.4
 **/


App::uses('AppController', 'Controller');

class NewsController extends AppController {
	var $controllerName = "Quản lý bài viết";
	 
	public $components = array(
        'Paginator' => array(
            'paramType' => 'querystring'
        )
    );
	public function beforeFilter() {
        parent::beforeFilter();
        
    }
    public function cateindex() {
    	$this->loadModel('Catenews');
		$this->Catenews->recursive = 0;
		$listmenu =  $this->Catenews->find('list',array('conditions'=>array('status'=>2,'parent_id'=> ""),'order'=>array('Catenews.lft ASC')));
		return $listmenu;
	}
 
	public function index($cid=null,$page=1) {
		$urlcid = $cid;
        if($cid==null){
        	$cid=@(int)$this->request->params['id'];
        	$urlcid = @$this->request->params['id'];
     	}
		$this->News->recursive = -1;
		$this->passedArgs['id'] = $urlcid;

		$cond = array('News.status'=>2,"News.publishdate <="=>date('Y-m-d H:i:s'));
		if (is_numeric($page)) {
	        $this->passedArgs['page'] = $page;
	    }
	    if (isset($this->request->params['page'])) {
		 $this->request->params['named']['page'] = $this->request->params['page'];
		}
		 if(!empty($cid)) {

		     $this->News->Catenews->recursive = -1;
		     $catenews = $this->News->Catenews->find('first',array('conditions'=>array('id'=>$cid)));
             $allid = $this->News->Catenews->find('list',array('conditions'=>array('lft >' =>$catenews['Catenews']['lft'],'rght <' =>$catenews['Catenews']['rght'])));
             $arid = array_keys($allid);
             $arid[] = $cid;
             $cond = array_merge($cond,array('News.catenews_id'=>$arid));
             $this->set('catenews', $catenews);
             if(!empty($catenews['Catenews']['parent_id'])) {
                 $parent = $this->News->Catenews->find('first', array('conditions' => array('id' => $catenews['Catenews']['parent_id'])));
                 $this->set('parent', $parent);
             }
         }

		$this->Paginator->settings = array('fields'=>array('id','showimage','name','name_en','imagesmall','introtext','introtext_en','publishdate','content'),"conditions"=>$cond,"order"=>"News.publishdate DESC",'limit'=>12);
		$news = $this->Paginator->paginate();

		$this->set('news', $news);
		//debug($news);
		$this->set(compact('cid'));
	}
    public function search($keyw=null,$page=1) {
	    $keyw = $this->request->query['keyw'];
	    $page = @$this->request->query['page'];
	    #echo $keyw;
	    #print_r($this->request);
	    if (is_numeric($page)) {
	        $this->passedArgs['page'] = $page;
	    }
	    #if (isset($this->request->params['page'])) {
		if (isset($this->request->query['page'])) {
		 $this->request->params['named']['page'] = $this->request->query['page'];
		}
	    $this->passedArgs['keyw'] = $keyw;
	    if(!empty($keyw)) {
            $this->News->recursive = -1;
            $cond = array(
                'News.status' => 2,
                "News.publishdate <=" => date('Y-m-d H:i:s'),
                "OR" => array(
                    "News.name like " => "%$keyw%",
                    "News.name_en like " => "%$keyw%",
                    "News.introtext like " => "%$keyw%",
                    "News.introtext_en like " => "%$keyw%",
                    "News.content like " => "%$keyw%",
                    "News.content_en like " => "%$keyw%"

                )
            );

            $this->Paginator->settings = array('fields' => array('id', 'name', 'name_en', 'imagesmall', 'introtext', 'introtext_en'), "conditions" => $cond, "order" => "News.publishdate DESC", 'limit' => 12);
            $news = $this->Paginator->paginate();
        }else{
	        $news = array();
        }
        $this->set('keyw',$keyw);
        $this->set('news', $news);

    }

	public function slider()
	{
		$sliders = $this->News->find('all',array('fields'=>array('News.id','News.name','News.introtext','News.image'),'conditions'=>array('News.status'=>2,'News.hotnews'=>1,"News.publishdate <="=>date('Y-m-d H:i:s')),'limit'=>8,'order'=>'publishdate DESC'));
		return $sliders;
	}
	public function lasttest()
	{
		$lasttest = $this->News->find('all',array('fields'=>array('News.id','News.name','News.name_en','News.introtext','News.introtext_en'),'conditions'=>array('News.status'=>2,"News.publishdate <="=>date('Y-m-d H:i:s')),'limit'=>5,'order'=>'publishdate DESC'));
		return $lasttest;
	}
	public function hotnews()
	{
		$hotnews = $this->News->find('all',array('fields'=>array('News.id','News.name','News.name_en','News.introtext','News.introtext_en','News.imagesmall'),'conditions'=>array('News.status'=>2,'News.hotnews'=>1,"News.publishdate <="=>date('Y-m-d H:i:s')),'limit'=>5,'order'=>'publishdate DESC'));
		return $hotnews;
	}
	public function home() {
	    #$this->layout = 'homepage';
		$this->News->recursive = -1;
		//$newshome = $this->News->find('all',array('conditions'=>array('News.status'=>2,'publishdate <=' =>date('Y-m-d H:i:s')),'fields'=>array('id','imagesmall','introtext','name','introtext_en','name_en','publishdate'),'order'=> 'publishdate desc','limit'=>3));
		//$this->set('newshome',$newshome);
		$hotnews = $this->News->find('all',array('conditions'=>array('hotnews'=>1,'News.status'=>2,'publishdate <=' =>date('Y-m-d H:i:s')),'fields'=>array('id','imagesmall','introtext','name','introtext_en','name_en','publishdate'),'order'=> 'publishdate desc','limit'=>4));
		$this->set('hotnews',$hotnews);
        // $this->loadModel('Gallery');
        // $this->Gallery->recursive = 1;
        // $this->Gallery->hasMany['Image']['limit'] = 1;
        // $this->Gallery->hasMany['Image']['conditions'] = array('Image.actived'=>1);
        // $this->Gallery->hasMany['Image']['fields'] = array('id','thumb','url');
        // $gallery = $this->Gallery->find('all',array('conditions'=>array('Gallery.status'=>2),'limit'=>'2','order'=>'Gallery.published DESC,Gallery.id desc'));
        // $this->set('gallery',$gallery);

		$this->loadModel('About');
		$abouts = $this->About->find('first',array('conditions'=>array('athome'=>1)));
		$this->set('about',$abouts);
		$this->loadModel('Slider');
        $this->Slider->bindModel(array('hasOne'=>array(
            'News'=>array(
                'foreignKey'=>false,
                'conditions'=>array('News.id = Slider.link'),
                'fields' => array('id','name','name_en')
            ),
        )));

        $sliders = $this->Slider->find('all',array('conditions'=>array('Slider.status'=>2))

        );

        $this->set('sliders',$sliders);
		
        $this->loadModel('Product');
        $hproducts = $this->Product->find('all',array('fields'=>array('imagesmall','id','title','title_en'),'conditions'=>array('Product.status'=>2,'hot'=>1),'limit'=>8,'order'=>"id DESC"));
        $this->set('hproducts',$hproducts);
        $this->loadModel('Partner');
        $partner  = $this->Partner->find('all');
        $this->set('partners',$partner);
//		$this->loadModel('Info');
//        $infos = $this->Info->find('all',array('order'=>array('Info.thutu ASC'),'limit'=>4));
//        $this->set('infos',$infos);
//        $this->loadModel('Video');
//        $videos =  $this->Video->find('all', array('conditions' => array('Video.status'=>2),'order'=>'Video.published DESC,id DESC','limit'=>3));
//        $this->set('videos',$videos);
//        $this->loadModel('Event');

	}


	public function view($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$news =  $this->News->find('first', $options);
		$this->set('news',$news);
		$other = $this->News->find('all',array('fields'=>array('News.id','News.name','News.introtext','News.name_en','News.introtext_en','News.image'),'conditions'=>array('News.status'=>2,'News.id <>'=>(int)$id,'News.catenews_id'=>$news['News']['catenews_id'],'publishdate <=' =>date('Y-m-d H:i:s')),'order'=>'News.publishdate DESC, News.id DESC','limit'=>8));
		$this->set(compact('other'));
		$this->News->Catenews->recursive = 0;
		$listmenu =  $this->News->Catenews->find('all',array('fields'=>array('id','name'),'conditions'=>array('status'=>2),'order'=>array('Catenews.lft ASC')));
		$this->set('listmenu',$listmenu);
		$hotnews = $this->News->find('all',array('fields'=>array('News.id','News.name','News.name_en','News.introtext','News.introtext_en','News.imagesmall'),'conditions'=>array('News.status'=>2,'News.id <>'=>(int)$id,'News.hotnews'=>1,'publishdate <=' =>date('Y-m-d H:i:s')),'limit'=>5,'order'=>'News.publishdate DESC, News.id DESC'));
		$this->set('hotnews',$hotnews);
		$this->News->Catenews->recursive = -1;
		$catenews  = $this->News->Catenews->find('first', array('conditions' => array('id' => $news['News']['catenews_id'])));
		if(!empty($catenews['Catenews']['parent_id'])) {
                 $parent = $this->News->Catenews->find('first', array('conditions' => array('id' => $catenews['Catenews']['parent_id'])));
                 $this->set('parent', $parent);
             }

	}
	public function listmenu(){
	    $this->loadModel('Catenews');
        $linksTree = $this->Catenews->generateTreeList(
            null,
            null,
            null,
            "___"
        );
        return $linksTree;
        //return $this->News->Catenews->find('all',array('fields'=>array('Catenews.id','Catenews.name','Catenews.name_en'),'conditions'=>array('Catenews.status'=>2),'order'=>'Catenews.id DESC'));

    }
	public function catalogfull($id=null){
		if (!$this->News->Catenews->exists($id)) {
			$this->redirect(array('controller'=>'news','action'=>'index'));
		}
		$this->News->Catenews->recursive = 1;
		$catalogs = $this->News->Catenews->find('list',array('conditions'=>array('Catenews.status'=>2,"Catenews.parent_id"=>$id)));

		if(!empty($catalogs)){
			//cos danh muc con
			$this->News->Catenews->recursive = -1;
			$thisid = $this->News->Catenews->find('first',array('conditions'=>array('Catenews.id'=>(int)$id)));
			$this->set('thisid',$thisid);
			$this->set('catalogs',$catalogs);
			$this->render('catalog_haschild');
		}else{
			$catenews = $this->News->Catenews->find('first',array('field'=>array('name','name_en'),'conditions'=>array('Catenews.id'=>$id)));
			$this->set('catenews',$catenews);
			$this->Paginator->settings = array('fields'=>array('id','image','name','introtext','created'),'conditions'=>array('News.status'=>2,'News.catenews_id'=>$id,'publishdate <=' =>date('Y-m-d H:i:s')),"order"=>"News.publishdate DESC,News.id desc",'limit'=>8);
			$this->set('catalogs', $this->Paginator->paginate());
		}

	}
	public function catalog($id=null){
		if (!$this->News->Catenews->exists((int)$id)) {
			$this->redirect(array('controller'=>'news','action'=>'index'));
		}
			$this->News->recursive = 0;
			$this->Paginator->settings = array('fields'=>array('id','image','name','introtext','created'),'conditions'=>array('News.status'=>2,'News.catenews_id'=>(int)$id,'publishdate <=' =>date('Y-m-d H:i:s')),"order"=>"News.publishdate DESC,News.id desc",'limit'=>10);
			$this->set('catalogs', $this->Paginator->paginate());
			$this->News->Catenews->recursive = -1;
			$catenews = $this->News->Catenews->find('first',array('field'=>array('name'),'conditions'=>array('Catenews.id'=>(int)$id)));
			$this->set('catenews',$catenews);
			$this->render('catalog');
	}
	public function admin_index($catenews_id = null) {
		$catenews_id = (int)$catenews_id;
        $findid = $catenews_id;
        if(!empty($this->request->query['catenews_id']))
            $findid = $this->request->query['catenews_id'];


		$this->News->recursive = 1;
		$cond = array();
		 // if (is_numeric($page)) {
	  //       $this->passedArgs['page'] = $page;
	  //   }
	     

        $s_selected = @$this->request->query['status'];
        $s = @$this->request->query['s'];


        //$this->passedArgs['catenews_id'] = $findid;
	    //$this->passedArgs['status'] = $s_selected;
	    //$this->passedArgs['s'] = $s;
		if(!empty($s_selected)) {
			$cond = array_merge($cond,array('News.status'=>$s_selected));
		}
		if(!empty($s)) {
			$cond = array_merge($cond,array('News.name LIKE'=>'%'.$s.'%'));
		}
		if(!empty($findid)) {
			$cond = array_merge($cond,array("OR"=>array('News.catenews_id'=>$findid,'Catenews.parent_id'=>$findid)));
		}
		
		if($s_selected == 0){
			unset($cond['News.status']);
		}
		if(empty($findid )){
			unset($cond['News.catenews_id']);
		}


		$this->Paginator->settings = array("conditions"=>$cond,"order"=>"News.id desc");
		$this->Paginator->settings['paramType'] = 'querystring';

        $news = $this->Paginator->paginate();

		$this->set('findid',$findid );
		$this->set('news',$news );
		$this->set(compact(array("s_selected",'s','catenews_id','s')));
		$catenews = $this->News->Catenews->find('list',array('conditions'=>array('parent_id'=>$catenews_id)));
		$this->set(compact('catenews'));
	}

	public function admin_view($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('InvalidContent'));
		}
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
	}

	public function admin_add($catid) {
		if ($this->request->is('post')) {
			$this->News->create();
			$tmptime =  $this->request->data["News"]['publishsedtime'];
			$tmptime = str_replace(" : ",":",$tmptime);
			$tmpdate = $this->request->data["News"]['publishseddate'];
			$tmpdate = str_replace("/", "-", $tmpdate);
			$tmpdate = (string)date("Y-m-d",strtotime($tmpdate))." ".date("H:i", strtotime($tmptime));;
			$this->request->data["News"]['publishdate'] = $tmpdate;
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved.'));
				return $this->redirect(array('action' => 'index',$catid));
			} else {
				$this->Session->setFlash(__('Lỗi. Xin hãy thử lại'));
			}
		}
		$catenews = $this->News->Catenews->generateTreeList(
            array(
                "OR"=>array(
                    'parent_id'=>$catid,
                    'id'=>$catid
                )
            ),
            null,
            null,
            "___"
        );
		$this->set(compact('catenews'));

	}

	public function admin_edit($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('InvalidContent'));
		}
		if ($this->request->is(array('post', 'put'))) {
		    //debug($this->request->data);
			if(!empty($this->request->data['News']['image']['name']))
			{
				$this->News->delete($id);
			}
			$tmptime =  $this->request->data["News"]['publishsedtime'];
			$tmptime = str_replace(" : ",":",$tmptime);
			$tmpdate = $this->request->data["News"]['publishseddate'];
			$tmpdate = str_replace("/", "-", $tmpdate);
			$tmpdate = (string)date("Y-m-d",strtotime($tmpdate))." ".date("H:i", strtotime($tmptime));;
			$this->request->data["News"]['publishdate'] = $tmpdate;

			if ($this->News->save($this->request->data, true)) {
				$this->Session->setFlash(__('The news has been saved.'));
				//return $this->redirect(array('action' => 'index','?'=>array('catenews_id'=>$this->request->data['News']['oldid'])));
				return $this->redirect(array('action' => 'index',$this->request->data['News']['oldid']));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
			$news = $this->News->find('first', $options);
			$datetime = $news['News']['publishdate'];
			$news['News']['publishseddate'] = date("d/m/Y",strtotime($datetime));
			$news['News']['publishsedtime'] = date("H:i",strtotime($datetime));

			$this->request->data = $news;
		}
		$catenews = $this->News->Catenews->generateTreeList(
            array(
              //  "OR"=>array(
                 //   'parent_id'=>$news['News']['catenews_id'],
                 //   'id'=>$news['News']['catenews_id']
              //  )
            ),
            null,
            null,
            "___"
        );
		$this->set(compact('catenews'));
	}

	public function admin_delete($cat,$id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('InvalidContent'));
		}
		$this->request->onlyAllow('post', 'delete');
		@$this->News->deleteFiles($id);
		if ($this->News->delete()) {
			$this->Session->setFlash(__('The news has been deleted.'));
		} else {
			$this->Session->setFlash(__('The news could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index',$cat));
	}

	public function admin_mdelete($cat,$str = null){
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
		return $this->redirect(array('action' => 'index',$cat));
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
			
		}
		$this->render(false);
    }
}
