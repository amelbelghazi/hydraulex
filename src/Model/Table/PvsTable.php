<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pvs Model
 *
 * @property \App\Model\Table\MarchesTable|\Cake\ORM\Association\BelongsTo $Marches
 * @property \App\Model\Table\TypesPvsTable|\Cake\ORM\Association\BelongsTo $TypesPVs
 *
 * @method \App\Model\Entity\Pv get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pv newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pv[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pv|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pv patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pv[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pv findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PvsTable extends Table
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

        $this->setTable('pvs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Marches', [
            'foreignKey' => 'marche_id'
        ]);
        $this->belongsTo('TypesPVs', [
            'foreignKey' => 'types_PV_id'
        ]);
        $this->belongsTo('Documents', [
            'foreignKey' => 'document_id'
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
            ->date('datePV')
            ->allowEmpty('datePV');

        $validator
            ->scalar('libelle')
            ->maxLength('libelle', 250)
            ->allowEmpty('libelle');

        $validator
            ->integer('numero')
            ->allowEmpty('numero');

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
        $rules->add($rules->existsIn(['marche_id'], 'Marches'));
        $rules->add($rules->existsIn(['types_PV_id'], 'TypesPVs'));
        $rules->add($rules->existsIn(['document_id'], 'Documents'));

        return $rules;
    }
}
