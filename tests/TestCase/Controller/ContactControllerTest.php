<?php

namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Tools\TestSuite\IntegrationTestCase;

/**
 * @uses \App\Controller\ContactController
 */
class ContactControllerTest extends IntegrationTestCase {

	/**
	 * @var array
	 */
	protected $fixtures = [
		//'plugin.Captcha.Captchas',
	];

	/**
	 * @return void
	 */
	public function setUp(): void {
		parent::setUp();

		$this->session([
			'id' => '123',
		]);
		$this->configRequest([
			'environment' => [
				'REMOTE_ADDR' => '127.0.0.1',
			],
		]);
	}

	/**
	 * @return void
	 */
	public function tearDown(): void {
		parent::tearDown();

		TableRegistry::clear();
	}

	/**
	 * Test index method
	 *
	 * @return void
	 */
	public function testIndex() {
		$this->get(['controller' => 'Contact', 'action' => 'index']);

		$this->assertResponseCode(200);
		$this->assertNoRedirect();
	}

	/**
	 * Test index method
	 *
	 * @return void
	 */
	public function testIndexPost() {
		$data = [
			'name' => '',
			'email' => '',
			'body' => '',
			'subject' => '',
		];
		$this->post(['controller' => 'Contact', 'action' => 'index'], $data);

		$this->assertResponseCode(200);
		$this->assertNoRedirect();
	}

	/**
	 * Test index method
	 *
	 * @return void
	 */
	public function testIndexPostValid() {
		$data = [
			'name' => 'Foo',
			'email' => 'foo@bar.de',
			'body' => 'Test',
			'subject' => 'Test',
		];
		$this->post(['controller' => 'Contact', 'action' => 'index'], $data);

		$this->assertResponseCode(302);
		$this->assertRedirect();
	}

}
