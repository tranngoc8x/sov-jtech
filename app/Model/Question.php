<?php
App::uses('AppModel', 'Model');
class Question extends AppModel {
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Họ tên không được để trống !',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'maxLength' => array(
                'rule' => array('maxLength', 100),
                'message' => 'Họ tên cannot be more than 100 characters.'
            ),
            'minLength' => array(
                'rule' => array('maxLength', 10),
                'message' => 'Họ tên cannot be less than 10 characters.'
            ),
		),'phone' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Số điện thoại không được để trống !',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Chỉ cho phép nhập số.'
            )
		),'email' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'E-mail không được để trống !',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'required' => array(
                'rule' => array('email'),
                'message' => 'Email không đúng định dạng.'
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => 'Email cannot be more than 255 characters.'
            ),
            'minLength' => array(
                'rule' => array('maxLength', 10),
                'message' => 'Email cannot be less than 10 characters.'
            ),
		),'content' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Nội dung câu hỏi không được để trống!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'minLength' => array(
                'rule' => array('maxLength', 50),
                'message' => 'Nội dung cannot be less than 50 characters.'
            ),
		)
	);

}
