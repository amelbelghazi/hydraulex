<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VersementsLocations Model
 *
 * @property \App\Model\Table\DettesLocationsTable|\Cake\ORM\Association\BelongsTo $DettesLocations
 *
 * @method \App\Model\Entity\VersementsLocation get($primaryKey, $options = [])
 * @method \App\Model\Entity\VersementsLocation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VersementsLocation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VersementsLocation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VersementsLocation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VersementsLocation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VersementsLocation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VersementsLocationsTable extends Table
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

        $this->setTable('versements_locations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('DettesLocations', [
            'foreignKey' => 'dettes_location_id'
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
            ->date('dateversement')
            ->allowEmpty('dateversement');

        $validator
            ->numeric('montant')
            ->allowEmpty('montant');

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
        $rules->add($rules->existsIn(['dettes_location_id'], 'DettesLocations'));

        return $rules;
    }
}
