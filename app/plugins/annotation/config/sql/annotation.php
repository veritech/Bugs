<?php

class annotationSchema extends CakeSchema{
	
	var $name = 'annotation';
	
	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}
	
	public $annotations = array(
		'id' => array(
			'type' => 'integer',
			'null' => false,
			'default' => NULL,
			'length' => 10,
			'key' => 'primary'
		),
		'user_id' => array(
			'type' => 'integer',
			'null' => false,
			'default' => NULL,
			'length' => 10
		),
		'model' => array(
			'type' => 'text',
			'null' => true,
			'default' => NULL
		),
		'foreign_key'  => array(
			'type' => 'integer',
			'null' => false,
			'default' => NULL,
			'length' => 10
		),
		'body' => array(
			'type' => 'text',
			'null' => true,
			'default' => NULL
		),
		'created'  => array(
			'type' => 'datetime',
			'null' => false
		),
		'modified'  => array(
			'type' => 'datetime',
			'null' => false
		),
		'indexes' => array(
			'PRIMARY' => array(
				'column' => 'id',
				'unique' => 1
			)
		)
	);
}