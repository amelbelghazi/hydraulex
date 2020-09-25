<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reparations Model
 *
 * @property \App\Model\Table\PannesTable|\Cake\ORM\Association\BelongsTo $Pannes
 * @property \App\Model\Table\GaragesTable|\Cake\ORM\Association\BelongsTo $Garages
 *
 * @method \App\Model\Entity\Reparation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reparation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reparation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reparation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reparation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reparation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reparation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReparationsTable extends Table
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

        $this->setTable('reparations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pannes', [
            'foreignKey' => 'panne_id'
        ]);
        $this->belongsTo('Garages', [
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
            ->date('datereparation')
            ->allowEmpty('datereparation');

        $validator
            ->numeric('cout')
            ->allowEmpty('cout');

        $validator
            ->integer('duree')
            ->allowEmpty('duree');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['panne_id'], 'Pannes'));
        $rules->add($rules->existsIn(['garage_id'], 'Garages'));

        return $rules;
    }
}
