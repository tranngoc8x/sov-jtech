<?php
    App::uses('I18nRoute', 'I18n.Routing/Route');
 	Router::connect('/', array('controller' => 'news', 'action' => 'home'), array('routeClass' => 'I18nRoute'));
	Router::connect('/san-pham.html', array('controller' => 'products', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
	Router::connect('/hoi-dap.html', array('controller' => 'questions', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
    Router::connect('/chuyen-muc/:id', array('controller' => 'news', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
	Router::connect('/san-pham/:id', array('controller' => 'products', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
	Router::connect('/thong-tin-san-pham/*', array('controller' => 'products', 'action' => 'view'), array('routeClass' => 'I18nRoute'));
	Router::connect('/tim-kiem.html', array('controller' => 'news', 'action' => 'search'), array('routeClass' => 'I18nRoute'));
	Router::connect('/chi-tiet/*', array('controller' => 'news', 'action' => 'view'), array('routeClass' => 'I18nRoute'));
    Router::connect('/chuyen-muc/:id/page=:page', array('controller' => 'news', 'action' => 'index'), array(
        // 'pass' => array('page','id'),
        // 'page' => '[0-9]+',
        // 'id' => '[a-z0-9-.-?]+',
    ), array('routeClass' => 'I18nRoute'));
    Router::connect('/tim-kiem.html?keyw=:keyw', array('controller' => 'news', 'action' => 'search'), array(
        // 'pass' => array('page','id'),
        // 'page' => '[0-9]+',
        // 'id' => '[a-z0-9-.-?]+',
    ));
    Router::connect('/tim-kiem.html?keyw=:keyw&page=:page', array('controller' => 'news', 'action' => 'search'), array(
        // 'pass' => array('page','id'),
        // 'page' => '[0-9]+',
        // 'id' => '[a-z0-9-.-?]+',
    ));

    Router::connect('/dich-vu.html', array('admin'=>false,'controller' => 'services', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
    Router::connect('/news.html', array('admin'=>false,'controller' => 'news', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
	Router::connect('/gioi-thieu/:id', array('controller' => 'abouts', 'action' => 'view'), array('routeClass' => 'I18nRoute'));
	Router::connect('/gioi-thieu/*', array('controller' => 'abouts', 'action' => 'view'), array('routeClass' => 'I18nRoute'));
	Router::connect('/gioi-thieu.html', array('controller' => 'abouts', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
	Router::connect('/lien-he.html', array('controller' => 'contacts', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
	Router::connect('/su-kien.html', array('controller' => 'events', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
	Router::connect('/su-kien/*', array('controller' => 'events', 'action' => 'view'), array('routeClass' => 'I18nRoute'));
	Router::connect('/thu-vien-anh.html', array('controller' => 'galleries', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
	Router::connect('/thu-vien-anh/*', array('controller' => 'galleries', 'action' => 'view'), array('routeClass' => 'I18nRoute'));
	Router::connect('/tim-kiem.html', array('controller' => 'news', 'action' => 'search'), array('routeClass' => 'I18nRoute'));
	Router::connect('/thu-vien-video.html', array('controller' => 'videos', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
	Router::connect('/thu-vien-video/*', array('controller' => 'videos', 'action' => 'view'), array('routeClass' => 'I18nRoute'));
	Router::connect('/admin', array('admin'=>true,'controller' => 'users', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
	Router::connect('/admin/login.html', array('admin'=>true,'controller' => 'users', 'action' => 'login'), array('routeClass' => 'I18nRoute'));
	Router::connect('/admin/logout.html', array("admin"=>true,'controller' => 'users', 'action' => 'logout'), array('routeClass' => 'I18nRoute'));
	//Router::connect('/admin/nguoi-dung/index.html', array("admin"=>true,'controller' => 'users', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
	//Router::connect('/admin/nguoi-dung/add.html', array("admin"=>true,'controller' => 'users', 'action' => 'add'), array('routeClass' => 'I18nRoute'));
	Router::connect('/acl', array('admin'=>true,'plugin' => 'acl', 'controller' => 'acl', 'action' => 'index'), array('routeClass' => 'I18nRoute'));
	CakePlugin::routes();
