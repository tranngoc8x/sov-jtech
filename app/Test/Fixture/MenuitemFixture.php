<?php
/**
 * MenuitemFixture
 *
 */
class MenuitemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'integer', 'null' => false, 'default' => null),
		'url' => array('type' => 'integer', 'null' => false, 'default' => null),
		'menus_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null),
		'counts' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 1,
			'url' => 1,
			'menus_id' => 1,
			'status' => 1,
			'counts' => 1
		),
	);

}
