<?php
App::uses('AppModel', 'Model');
class About extends AppModel {
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field can not empty!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
    public $actsAs = array(
        'Uploader.Attachment' => array(
            // Do not copy all these settings, it's merely an example
            'image' => array(
                'name' => '',
                'tempDir' => TMP,
                'uploadDir' => 'files/uploads/abouts/',
                'baseDir' => 'files/uploads/abouts/',
                'prepend' => 'about_',
                'dbColumn' => 'image'
            )
        )
    );
}
