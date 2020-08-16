<?php
App::uses('Catenews', 'Model');

/**
 * Catenews Test Case
 *
 */
class CatenewsTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.catenews',
		'app.news'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Catenews = ClassRegistry::init('Catenews');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Catenews);

		parent::tearDown();
	}

}
