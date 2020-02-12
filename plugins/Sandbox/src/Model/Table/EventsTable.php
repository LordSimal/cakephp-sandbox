<?php

namespace Sandbox\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Events Model
 *
 * @method \Sandbox\Model\Entity\Event get($primaryKey, $options = [])
 * @method \Sandbox\Model\Entity\Event newEntity(array $data, array $options = [])
 * @method \Sandbox\Model\Entity\Event[] newEntities(array $data, array $options = [])
 * @method \Sandbox\Model\Entity\Event|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Sandbox\Model\Entity\Event patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Sandbox\Model\Entity\Event[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Sandbox\Model\Entity\Event findOrCreate($search, ?callable $callback = null, $options = [])
 * @mixin \Calendar\Model\Behavior\CalendarBehavior
 * @method \Sandbox\Model\Entity\Event saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Sandbox\Model\Entity\Event newEmptyEntity()
 * @method \Sandbox\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \Sandbox\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \Sandbox\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \Sandbox\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EventsTable extends Table {

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('events');
		$this->setDisplayField('title');

		$this->addBehavior('Calendar.Calendar', [
			'field' => 'beginning',
		]);
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator): Validator {
		$validator
			->integer('id')
			->allowEmpty('id', 'create');

		$validator
			->requirePresence('title', 'create')
			->notEmpty('title');

		$validator
			->allowEmpty('location');

		$validator
			->numeric('lat')
			->allowEmpty('lat');

		$validator
			->numeric('lng')
			->allowEmpty('lng');

		$validator
			->allowEmpty('description');

		$validator
			->dateTime('beginning')
			->allowEmpty('beginning');

		$validator
			->dateTime('end')
			->allowEmpty('end');

		return $validator;
	}

}
