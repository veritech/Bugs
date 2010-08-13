<?php
/* Version Fixture generated on: 2010-08-12 13:08:02 : 1281617042 */
class VersionFixture extends CakeTestFixture {
	var $name = 'Version';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'project_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'commit' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 64),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'project_id' => 1,
			'commit' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2010-08-12 13:44:02',
			'modified' => '2010-08-12 13:44:02'
		),
	);
}
?>