<?php
App::uses('Manufactor', 'Model');

/**
 * Manufactor Test Case
 *
 */
class ManufactorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.manufactor',
		'app.product',
		'app.cateproduct',
		'app.productfile'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Manufactor = ClassRegistry::init('Manufactor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Manufactor);

		parent::tearDown();
	}

}
