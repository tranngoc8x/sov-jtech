<?php
App::uses('AppModel', 'Model');
/**
 * Image Model
 *
 * @property Galleries $Galleries
 */
class Image extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'galleries_id' => array(
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
	public $actsAs = array(
		'Uploader.Attachment' => array(
			'url' => array(
				'name' => '',
				'nameCallback' => 'formatName',
				'tempDir' => TMP,
				'uploadDir' => 'files/uploads/galleries/',
				'baseDir' => 'files/uploads/galleries/',
				'prepend' => '',
				'dbColumn' => 'url',
				'transforms' => array(
                    'thumb' => array(
                        'class' => 'crop',
                        'overwrite' => true,
                        'self' => false,
                        'width' => 400,
                        'method' =>'crop',
                        'height' => 280,
                        'dbColumn' => 'thumb'
                    )
                )
			)
		)
	);

	private function _getcat()
	{
		$grequest  = Router::getRequest()->params;
		$cid = $grequest['pass']['0'];
		$this->Gallery->recursive = -1;
		$arpath = $this->Gallery->find("first", array('fields'=>array('Gallery.catpath','Gallery.name'),"conditions" => array("Gallery.id" => $cid)));
		return @$arpath['Gallery'];
	}
	public function beforeSave($options = array()) {
		$this->data[$this->alias]['imgdate'] = date('Y-m-d h:i:s');
		$this->data[$this->alias]['users_id'] = AuthComponent::user('id');
		$name = $this->_getcat();
		$idata = Router::getRequest()->data;
		$count = $this->find('count',array('conditions'=>array('galleries_id'=>$idata['Image']['galleries_id'])));
		$t = count($idata['Image']['url']);
		for ($i=0; $i < $t-1 ; $i++ ) {
			$this->data['Image']['name'] = $name['name'].'_'.($count+$i+1);
			$this->data['Image']['galleries_id'] = $idata['Image']['galleries_id'];
		}
	}
	public function beforeUpload($options) {
		$path = $this->_getcat();
    	$options['uploadDir'] = 'files/uploads/galleries/'.$path['catpath'].'/';
    	$options['baseDir'] = 'files/uploads/galleries/'.$path['catpath'].'/';
    	return $options;
	}
	public function beforeTransform($options) {
	    $path = $this->_getcat();
    	$options['uploadDir'] = 'files/uploads/galleries/'.$path['catpath'].'/';
    	$options['baseDir'] = 'files/uploads/galleries/'.$path['catpath'].'/';
	    return $options;
	}
	public $belongsTo = array(
		'Gallery' => array(
			'className' => 'Gallery',
			'foreignKey' => 'galleries_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
