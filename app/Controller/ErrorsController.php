<?php
App::uses('AppController', 'Controller');

class ErrorsController extends AppController {
    public $name = '1';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('error404');
    }

    public function error404() {
        //$this->layout = 'default';
    }
}
 ?>