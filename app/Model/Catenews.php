<?php
App::uses('AppModel', 'Model');
/**
 * Catenews Model
 *
 * @property News $News
 */
class Catenews extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $actsAs = array('Tree','Containable');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */



	 public $hasMany = array(
	 	'News' => array(
	 		'className' => 'News',
	 		'foreignKey' => 'catenews_id',
	 		'dependent' => false,
	 		'conditions' => '',
	 		'fields' => '',
	 		'order' => '',
	 		'limit' => '',
	 		'offset' => '',
	 		'exclusive' => '',
	 		'finderQuery' => '',
	 		'counterQuery' => ''
	 	)
	 );

}
