<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Phases Model
 *
 * @method \App\Model\Entity\Phase get($primaryKey, $options = [])
 * @method \App\Model\Entity\Phase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Phase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Phase|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Phase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Phase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Phase findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PhasesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('phases');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('text')
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->integer('goal')
            ->requirePresence('goal', 'create')
            ->notEmpty('goal');

        $validator
            ->integer('funds_raised')
            ->requirePresence('funds_raised', 'create')
            ->notEmpty('funds_raised');

        $validator
            ->dateTime('deadline')
            ->requirePresence('deadline', 'create')
            ->notEmpty('deadline');

        return $validator;
    }
}
