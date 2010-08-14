<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'username';
	var $validate = array(
		'username'=>array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message'=>'Letters and numbers only'
			)
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message'=>'Invalid email address'
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message'=>'Letters and numbers only'
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
?>