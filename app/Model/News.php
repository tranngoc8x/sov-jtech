<?php
App::uses('AppModel', 'Model');
/**
 * News Model
 *
 * @property Catenews $Catenews
 */
class News extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $actsAs = array(
		'Containable',
		'Uploader.Attachment' => array(
			// Do not copy all these settings, it's merely an example
			'image' => array(
				'name' => '',
				'tempDir' => TMP,
				'uploadDir' => 'files/uploads/news/',
				'baseDir' => 'files/uploads/news/',
				'prepend' => 'news_',
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
		)
	);
	public $validate = array(
        'name'         => array(
            'name_empty_validation'      => array(
                'rule'      => 'notEmpty',
                'message'   => 'name can not be left empty'
            ),
             
        ),
        
    );

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['users_id'] = AuthComponent::user('id');
		$this->data[$this->alias]['created_date'] = date("Y-m-d");
		$this->data[$this->alias]['created'] = date("Y-m-d H:i:s");
		$date = $this->data[$this->alias]['publishdate'];
       // $this->data[$this->alias]['publishdate'] =date('Y-m-d',strtotime(str_replace( '/','-',$date)));
 
        // save our HABTM relationships
        foreach (array_keys($this->hasAndBelongsToMany) as $model){
                if(isset($this->data[$this->name][$model])){
                        $this->data[$model][$model] = $this->data[$this->name][$model];
                        unset($this->data[$this->name][$model]);
                }
        }
    }
	public $belongsTo = array(
		 'Catenews' => array(
		 	'className' => 'Catenews',
		 	'foreignKey' => 'catenews_id',
		 	'conditions' => '',
		 	'fields' => '',
		 	'order' => ''
		 ),
		'Users' => array(
			'className' => 'Users',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)

	);

}
