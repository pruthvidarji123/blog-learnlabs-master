<?php
	App::uses('CakeEmail', 'Network/Email');
	class User extends AppModel{
		public $validate = array(
			 'username' => array(	
				 'unique' => array(
					'rule'    => 'isUnique',
					'message' => 'This username is already in use'
				),
				'nonEmpty' => array(
	                'rule' => array('notEmpty'),
	                'message' => 'A username is required',
					'allowEmpty' => false
	            ),
	        )

		);
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
	}
?>