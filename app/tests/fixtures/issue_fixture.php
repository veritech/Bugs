<?php
/* Issue Fixture generated on: 2010-08-12 13:08:19 : 1281617419 */
class IssueFixture extends CakeTestFixture {
	var $name = 'Issue';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'status_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'project_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'version_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'creator_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'assigned_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'status_id' => 1,
			'project_id' => 1,
			'version_id' => 1,
			'creator_id' => 1,
			'assigned_id' => 1,
			'created' => 1,
			'modified' => 1
		),
	);
}
?>