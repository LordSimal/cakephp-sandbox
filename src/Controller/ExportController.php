<?php
namespace App\Controller;

use Cake\Event\Event;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\ORM\TableRegistry;

class ExportController extends AppController {

	/**
	 * @var array
	 */
	public $components = ['Cache.Cache'];

	/**
	 * ExportController::beforeFilter()
	 *
	 * @param \Cake\Event\Event $event
	 * @return \Cake\Network\Response|null
	 */
	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);

		if (!$this->viewBuilder()->className() || $this->viewBuilder()->className() === 'View') {
			return;
		}

		if ($this->referer(null, true) !== '/export') {
			throw new MethodNotAllowedException('Please do not use this as a webservice (the capacities are limited). Download the JSON or XML file and import it.');
		}
	}

	/**
	 * ExportController::afterFilter()
	 *
	 * @param \Cake\Event\Event $event
	 * @return \Cake\Network\Response|null
	 */
	public function afterFilter(Event $event) {
		parent::afterFilter($event);

		if ($this->request->query('download')) {
			$this->response->download($this->request->params['action'] . '.' . $this->request->params['ext']);
		}
	}

	public function index() {
	}

	/**
	 * @return \Cake\Network\Response|null
	 */
	public function countries() {
		$this->Countries = TableRegistry::get('Data.Countries');
		$countries = $this->Countries->find('all', ['fields' => []]);

		$this->set(compact('countries'));
		$this->set('_serialize', ['countries']);
	}

	/**
	 * maybe with countries directly?
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function countryProvinces() {
		$this->CountryProvince = TableRegistry::get('Data.CountryProvinces');
		$countryProvinces = $this->CountryProvince->find('all', ['fields' => []]);

		$this->set(compact('countryProvinces'));
		$this->set('_serialize', ['countryProvinces']);
	}

	/**
	 * @return \Cake\Network\Response|null
	 */
	public function currencies() {
		$this->Currency = TableRegistry::get('Data.Currencies');
		$currencies = $this->Currency->find('all', ['fields' => []]);

		$this->set(compact('currencies'));
		$this->set('_serialize', ['currencies']);
	}

	/**
	 * @return \Cake\Network\Response|null
	 */
	public function languages() {
		$this->Language = TableRegistry::get('Data.Languages');
		$languages = $this->Language->find('all', ['fields' => []]);

		$this->set(compact('languages'));
		$this->set('_serialize', ['languages']);
	}

	/**
	 * @return \Cake\Network\Response|null
	 */
	public function continents() {
		$this->Continent = TableRegistry::get('Data.Continents');
		$continents = $this->Continent->find('all', ['fields' => []]);

		$this->set(compact('continents'));
		$this->set('_serialize', ['continents']);
	}

	/**
	 * @return \Cake\Network\Response|null
	 */
	public function postalCodes() {
		$this->PostalCode = TableRegistry::get('Data.PostalCodes');
		$postalCodes = $this->PostalCode->find('all', ['fields' => []]);

		$this->set(compact('postalCodes'));
		$this->set('_serialize', ['postalCodes']);
	}

	/**
	 * @return \Cake\Network\Response|null
	 */
	public function mimeTypes() {
	}

}
