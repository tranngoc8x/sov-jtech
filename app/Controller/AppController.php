<?php

App::uses("Controller", "Controller");
class AppController extends Controller {
    var $title = "Welcom to";
    public $view   = 'Theme';
    public $theme = 'default';
    var $controllerName = "Quản lý";
    var $action_array = array(
        "index"			=> "Danh sách",
        "view"			=> "Chi tiết",
        "admin_index"	=> "Danh sách bản ghi",
        "admin_add"		=> "Thêm mới bản ghi",
        "admin_view"	=> "Chi tiết bản ghi",
        "admin_edit"	=> "Cập nhật bản ghi",
        //ACL
        "admin_user_permissions" => "Phân quyền người dùng",
        "admin_role_permissions" => "Phân quyền nhóm người dùng",
        "admin_synchronize" => "Đồng bộ",
        "admin_get_user_controller_permission" =>""
    );

    public $components = array(
        //"Comm",
        "Paginator",
        "Session",
        //"DebugKit.Toolbar",
        "Acl",
        "RequestHandler",
        "Auth" => array(
            "loginRedirect" => array("admin"=>true,"controller" => "users", "action" => "index"),
            "logoutRedirect" => array("controller" => "users", "action" => "login"),
            "authError" => "You must be logged in to view this page.",
            "loginError" => "Invalid Username or Password entered, please try again.",
            "authorize" => array(
                "Actions" => array("actionPath" => "controllers")
            )
        ));
    public $helpers = array("Session","Js","I18n.I18n");//"ViewCells.Cell"
    //public $uses = array('Pjax.Pjax');
    public function beforeFilter() {
        parent::beforeFilter();
        if(isset($this->request->params["admin"]) && $this->request->params["admin"] == true){
            $this->layout = "admin";
        }else{
            $this->loadModel('Content');
            $this->loadModel('Menuitem');

            $fcontent2 =  $this->Content->find('first',array('conditions'=>array('type'=>'contact','status'=>2)));
            $fphone =  $this->Content->find('all',array('conditions'=>array('type'=>'phone','status'=>2)));
            $maps =  $this->Content->find('first', array('conditions' => array('Content.id'=> 52)));
            $footer =  $this->Content->find('first',array('conditions'=>array('type'=>'footer','status'=>2)));
            $footer2 = $this->Content->find('first',array('conditions'=>array('type'=>'footer2','status'=>2)));
            $header = $this->Content->find('first',array('conditions'=>array('type'=>'header','status'=>2)));
            $this->Menuitem->recursive = -1;
            $nav = $this->Menuitem->find('threaded',array('conditions'=>array('status'=>2,'menus_id'=>2),'order'=>'lft ASC'));
            $this->set(compact('fcontent2','maps','header','fphone','footer','footer2','nav'));
            $this->loadModel('Catalog');
            $this->Catalog->recursive = -1;
            $fcatalog = $this->Catalog->find('all',array('conditions'=>array('status'=>2)));
            $this->set('fcatalog',$fcatalog);
        }

        //function
        $this->set("title",$this->title);
        $tmpactionName = "";
        if(isset($this->action_array[$this->request->action])){
            $tmpactionName = $this->action_array[$this->request->action];
        }
        $this->set("actionName",$tmpactionName);
        $this->set("controllerName",$this->controllerName);
        $this->Auth->allow("admin_login",'getscreen',"freatureSP","subpage","lists","search",'cateindex','viewonline',"index","imglist","maps","download","getPath",'cat',"view","home",'getPage','jobs','menu','menuprj','type','hotnews','jobsmenu','listmenu','slider','lasttest','listbanner','getContent','catalog','render','catalogfull','captcha');
    }
    // public function isAuthorized($user) {
    //		return false;
    // }
}
