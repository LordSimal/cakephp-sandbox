<?php
namespace Sandbox\Controller;

use Cake\Event\Event;

class JqueryExamplesController extends SandboxAppController {

	public $helpers = ['Markup.Highlighter'];

	public $uses = [];

	public $jqueryPlugins = ['media'];

	/**
	 * @param \Cake\Event\Event $event
	 * @return void
	 */
	public function beforeRender(Event $event) {
		$this->set('jquery_plugins', $this->jqueryPlugins);

		parent::beforeRender($event);
	}

	/**
	 * @return void
	 */
	public function index() {
		$actions = $this->_getActions($this);

		$this->set(compact('actions'));
	}

	/**
	 * @return void
	 */
	public function autopreview() {
	}

	/**
	 * @return void
	 */
	public function maxlength() {
	}

	/**
	 * Example of an autocomplete field using jQueryUI autocomplete with JSON
	 * and AJAX
	 *
	 * @return void
	 */
	public function autocomplete() {
		if ($this->request->is(['ajax'])) {
			$this->loadModel('Sandbox.Animals');
			$items = $this->Animals->find('list', [
					'conditions' => [
						'name LIKE' => '%' . $this->request->query('term') . '%'
					]
			]);

			$this->set('items', $items);
			$this->set('_serialize', ['items']);
		}
	}

}
