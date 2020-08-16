<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property Users $Users
 * @property Cateevents $Cateevents
 */
class Event extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	public $actsAs = array(
		'Uploader.Attachment' => array(
			// Do not copy all these settings, it's merely an example
			'image' => array(
				'name' => '',
				'tempDir' => TMP,
				'uploadDir' => 'files/uploads/events/',
				'baseDir' => 'files/uploads/events/',
				'prepend' => 'image_',
				'dbColumn' => 'image',
				'transforms' => array(
					'imageSmall' => array(
						'class' => 'resize',
                        'append' => '_thumbnail',
                        "expand"=>true,
                        'prepend' => '',
                        'overwrite' => true,
                        "mode"=>true,
//                        'width' => 400,
                        'method' =>'resize',
                        'height' => 280,
                        'width'=>400,
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

		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)

		// )
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Users' => array(
			'className' => 'Users',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['users_id'] = AuthComponent::user('id');
		$this->data[$this->alias]['created'] = date("Y-m-d H:i:s");
	}
}
?>