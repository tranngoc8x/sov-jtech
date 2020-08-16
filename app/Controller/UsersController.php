<?php
App::uses('AuthComponent', 'Controller/Component');
class UsersController extends AppController {
	public $components = array('Paginator');
	var $controllerName = "Quản lý người dùng";
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_login','admin_forgot_password');
    }
	public function admin_index() {
		$this->User->recursive = 0;
		$s_selected = 0;
		$this->set('users', $this->Paginator->paginate());
		$this->set(compact("s_selected"));
	}
	public function admin_login() {
		$this->layout = "login";
		if($this->Session->check('Auth.User')){
			$this->redirect(array('action' => 'index'));
		}
		if ($this->request->is('post')) {
			#debug($this->Auth->password("12345678"));
			if ($this->Auth->login()) {
				$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
			}
		}
	}
	public function admin_logout() {
		$this->redirect($this->Auth->logout());

	}
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been created'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be created. Please, try again.'));
			}
        }
        $groups = $this->User->Groups->find('list');
        $this->set(compact('groups'));
	}

	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid User'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The User has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Groups->find('list');
		$this->set(compact('groups'));
	}

	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('InvalidContent'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The User has been deleted.'));
		} else {
			$this->Session->setFlash(__('The User could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_forgot_password(){
		$this->layout = 'login';
		if ($this->request->is('post')) {
			$user = $this->User->find('first',array('conditions'=>array('User.username'=>$this->request->data['User']['username'],'User.email'=>$this->request->data['User']['email'])));
			if(!empty($user)){
				$newpass = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$'),0,10);
				App::uses('CakeEmail', 'Network/Email');
				$email= new CakeEmail('gmail');
				$email->from(array('dev.thangtn@gmail.com'=>'[Portal]'));
				$email->to($user['User']['email']);
				$email->subject('Thông tin tài khoản');
				$email->template('default');
				$email->emailFormat('html');
				$data = array('newpass'=>$newpass,'username'=>$this->request->data['User']['username']);
				$email->viewVars($data);
				$email->send();
				$this->User->id = $user['User']['id'];
				$this->User->saveField('password',trim($newpass));
				$this->redirect(array('action'=>'login'));
			}else{
				$this->Session->setFlash(__('Tài khoản hoặc địa chỉ email không chính xác'));
			}
		}
	}
}
