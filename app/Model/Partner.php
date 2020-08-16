<?php
App::uses('AppModel', 'Model');
class Partner extends AppModel {
	public $displayField = 'name';
	public $actsAs = array(
		'Uploader.Attachment' => array(
			'image' => array(
				'name' => '',
				'tempDir' => TMP,
				'uploadDir' => 'files/uploads/partners/',
				'baseDir' => 'files/uploads/partners/',
				'prepend' => 'partner_',
				'dbColumn' => 'image'
			)
		)
	);
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Không được để trống',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'order' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Không được để trống',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['users_id'] = AuthComponent::user('id');
		$this->data[$this->alias]['created_date'] = date("Y-m-d");
	}
}
