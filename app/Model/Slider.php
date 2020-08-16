<?php
App::uses('AppModel', 'Model');
/**
 * Slider Model
 *
 */
class Slider extends AppModel {

	public $actsAs = array(
		'Uploader.Attachment' => array(
			// Do not copy all these settings, it's merely an example
			'image' => array(
				'name' => '',
				'tempDir' => TMP,
				'uploadDir' => 'files/uploads/slider/',
				'baseDir' => 'files/uploads/slider/',
				'prepend' => '',
				'dbColumn' => 'image',
				'nameCallback'=>'formatName',
				'transforms' => array()
			),'image2' => array(
				'name' => '',
				'tempDir' => TMP,
				'uploadDir' => 'files/uploads/slider/mobile/',
				'baseDir' => 'files/uploads/slider/mobile/',
				'prepend' => '',
				'dbColumn' => 'image2',
				'nameCallback'=>'formatName',
				'transforms' => array()
			)
		),
		'Uploader.FileValidation' => array(
			'image' => array(
				'extension' => array('gif', 'jpg', 'png', 'jpeg'),
				'required' => true
			)
		)
	);
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
		),
	);

}
