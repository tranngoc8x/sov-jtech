<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Users $Users
 * @property Cateproducts $Cateproducts
 */
class Product extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	 //public $primaryKey = 'id';
	public $actsAs = array(
		'Uploader.Attachment' => array(
			// Do not copy all these settings, it's merely an example
			'image' => array(
				'name' => '',
				'tempDir' => TMP,
				'uploadDir' => 'files/uploads/products/',
				'baseDir' => 'files/uploads/products/',
				'prepend' => 'image_',
				'dbColumn' => 'image',
				'transforms' => array(
					'imageSmall' => array(
						'class' => 'resize',
						'append' => '_thumbnail',
						'prepend' => '',
						'overwrite' => true,
						'width' => 189,
						'method' =>'resize',
						'height' => 189,
						'dbColumn' => 'imagesmall'
					)
				)
			)
		),
		'Uploader.FileValidation' => array(
			'image' => array(
				'extension' => array('gif', 'jpg', 'png', 'jpeg'),
				'required' => false
			)
		)
	);
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'catalogs_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
// 		'title' => array(
// 			'notEmpty' => array(
// 				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
// 			),
// 		),
		// 'captcha'=>array(
		// 	'notEmpty'=>array(
		// 		'rule' => array('matchCaptcha'),
		// 		'message'=>'Mã xác nhận không chính xác.'
		// 	)
		// )
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
// 		'Users' => array(
// 			'className' => 'Users',
// 			'foreignKey' => 'users_id',
// 			'conditions' => '',
// 			'fields' => '',
// 			'order' => ''
// 		),
		'Catalog' => array(
			'className' => 'Catalog',
			'foreignKey' => 'catalogs_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	public function matchCaptcha($inputValue)	{
		return $inputValue['captcha']==$this->getCaptcha(); //return true or false after comparing submitted value with set value of captcha
	}

	public function compareP()
	{
		if($this->data[$this->alias]['discounts'] > $this->data[$this->alias]['price']) return false;
		return true;
	}
	public function setCaptcha($value)	{
		$this->captcha = $value; //setting captcha value
	}

	public function getCaptcha()	{
		return $this->captcha; //getting captcha value
	}
	public function beforeSave($options = array()) {
		$this->data[$this->alias]['users_id'] = AuthComponent::user('id');
	}
}
?>