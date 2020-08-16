<?php
App::uses('AppModel', 'Model');
/**
 * Gallery Model
 *
 */
class Gallery extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

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
	public $hasMany = array(
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'galleries_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
			'dependent' => true
		)
	);
	private function _strip($str){
		if(!$str) return false;
		$unicode = array(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'd'=>'đ|Đ',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		);
		foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
		$str = preg_replace("`\[.*\]`U","",$str);
		$str = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$str);
		$str = htmlentities($str, ENT_COMPAT, 'utf-8');
		$str = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $str );
		$str = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "_", $str);
		return strtolower($str);
	}
	public function beforeSave($options = array()) {
		if(!isset(Router::getRequest()->data['Gallery']['id']) || empty(Router::getRequest()->data['Gallery']['id'])){
			$ids = uniqid();
			$name  = Router::getRequest()->data['Gallery']['name'].'_'.$ids;
			$this->data[$this->alias]['catpath'] = $this->_strip($name);
			$this->data[$this->alias]['users_id'] = AuthComponent::user('id');
			mkdir('files/uploads/galleries/'.$this->_strip($name));
			mkdir('files/uploads/galleries/'.$this->_strip($name).'/thumbnails');
		}
	}
	public function afterDelete() {
		$path = $this->data['Gallery']['catpath'];
		array_map('unlink', glob("files/uploads/galleries/$path/thumbnails/*.*"));
		array_map('unlink', glob("files/uploads/galleries/$path/*.*"));

		rmdir("files/uploads/galleries/$path/thumbnails/");
		rmdir("files/uploads/galleries/$path/");

	}

}
