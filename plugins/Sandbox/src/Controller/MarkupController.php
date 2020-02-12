<?php

namespace Sandbox\Controller;

class MarkupController extends SandboxAppController {

	/**
	 * @return void
	 */
	public function index() {
		$actions = $this->_getActions($this);

		$this->set(compact('actions'));
	}

	/**
	 * @see http://fontawesome.io/
	 *
	 * @return void
	 */
	public function markdown() {
	}

}
