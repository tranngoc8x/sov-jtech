<?php
App::uses('AppModel', 'Model','AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Groups $Groups
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $actsAs = array('Acl' => array('type' => 'requester'));
	//public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Không được phép để trống.',
				'allowEmpty' => false
            )
        ),
        'username' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Không được phép để trống.',
				'allowEmpty' => false
            ),
			'between' => array(
				'rule' => array('between',5, 50),

				'message' => 'Tài khoản phải có ít nhất 5 ký tự và nhiều nhất 50 ký tự.'
			),
			 'unique' => array(
				'rule'    => array('isUniqueUsername'),
				'message' => 'Tài khoản này đã có người dùng'
			),
			'alphaNumericDashUnderscore' => array(
				'rule'    => array('alphaNumericDashUnderscore'),
				'message' => 'Tài khoản chỉ được phép là số, chữ cái và dấu gạch dưới.'
			),
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Mật khẩu không được để trống.'
            ),
			'min_length' => array(
				'rule' => array('minLength', '8'),
				'message' => 'Mật khẩu phải có ít nhất 8 ký tự.'
			)
        ),

		'password_confirm' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Hãy gõ lại mật khẩu'
            ),
			 'equaltofield' => array(
				'rule' => array('equaltofield','password'),
				'message' => 'Mật khẩu không trùng nhau.'
			)
        ),

		'email' => array(
			'required' => array(
				'rule' => array('email', true),
				'message' => 'Email không đúng định dạng.'
			),
			 'unique' => array(
				'rule'    => array('isUniqueEmail'),
				'message' => 'Email này đã được sử dụng.',
			),
			'between' => array(
				'rule' => array('between', 10, 60),
				'message' => 'Emailcó độ dài trong khoảng từ 10 tới 60 ký tự'
			)
		),
        'groups_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Chưa chọn quyền',
				'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),


		'password_update' => array(
			'min_length' => array(
				'rule' => array('minLength', '8'),
				'message' => 'Mật khẩu phải có ít nhất 8 ký tự.',
				'allowEmpty' => true,
				'required' => false
			)
        ),
		'password_confirm_update' => array(
			 'equaltofield' => array(
				'rule' => array('equaltofield','password_update'),
				'message' => 'Mật khẩu gõ lại không chính xác.',
				'required' => false,
			)
        )


    );

		/**
	 * Before isUniqueUsername
	 * @param array $options
	 * @return boolean
	 */
	function isUniqueUsername($check) {

		$username = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id',
					'User.username'
				),
				'conditions' => array(
					'User.username' => $check['username']
				)
			)
		);

		if(!empty($username)){
			if($this->data[$this->alias]['id'] == $username['User']['id']){
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
    }

	/**
	 * Before isUniqueEmail
	 * @param array $options
	 * @return boolean
	 */
	function isUniqueEmail($check) {

		$email = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id'
				),
				'conditions' => array(
					'User.email' => $check['email']
				)
			)
		);

		if(!empty($email)){
			if($this->data[$this->alias]['id'] == $email['User']['id']){
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
    }

	public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
    }

	public function equaltofield($check,$otherfield)
    {
        //get name of field
        $fname = '';
        foreach ($check as $key => $value){
            $fname = $key;
            break;
        }
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
    }

	/**
	 * Before Save
	 * @param array $options
	 * @return boolean
	 */
	 public function beforeSave($options = array()) {
		// hash our password
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}

		// if we get a new password, hash it
		if (isset($this->data[$this->alias]['password_update'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password_update']);
		}

		// fallback to our parent
		return parent::beforeSave($options);
	}
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Groups' => array(
			'className' => 'Groups',
			'foreignKey' => 'groups_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	// //for forum plugin
	// public $hasMany = array(
	// 	'ForumModerator' => array('className' => 'Forum.Moderator'),
	// 	'ForumPollVote' => array('className' => 'Forum.PollVote'),
	// 	'ForumPost' => array('className' => 'Forum.Post'),
	// 	'ForumPostRating' => array('className' => 'Forum.PostRating'),
	// 	'ForumSubscription' => array('className' => 'Forum.Subscription'),
	// 	'ForumTopic' => array('className' => 'Forum.Topic'),
	// );
	//end forum plugin


	public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['groups_id'])) {
            $groupId = $this->data['User']['groups_id'];
        } else {
            $groupId = $this->field('groups_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
}
