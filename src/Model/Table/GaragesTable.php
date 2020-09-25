<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Garages Model
 *
 * @property \App\Model\Table\ReparationsMachineTable|\Cake\ORM\Association\HasMany $ReparationsMachine
 *
 * @method \App\Model\Entity\Garage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Garage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Garage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Garage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Garage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Garage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Garage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GaragesTable extends Table
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

        $this->setTable('garages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ReparationsMachine', [
            'foreignKey' => 'garage_id'
        ]);
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
            ->scalar('nom')
            ->maxLength('nom', 50)
            ->allowEmpty('nom');

        $validator
            ->scalar('adresse')
            ->maxLength('adresse', 250)
            ->allowEmpty('adresse');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
