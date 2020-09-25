<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RemboursementsAvance Model
 *
 * @property \App\Model\Table\AvancesTable|\Cake\ORM\Association\BelongsTo $Avances
 *
 * @method \App\Model\Entity\RemboursementsAvance get($primaryKey, $options = [])
 * @method \App\Model\Entity\RemboursementsAvance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RemboursementsAvance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RemboursementsAvance|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RemboursementsAvance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RemboursementsAvance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RemboursementsAvance findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RemboursementsAvanceTable extends Table
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

        $this->setTable('remboursements_avance');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Situations', [
            'foreignKey' => 'situation_id'
        ]);

        $this->belongsTo('Avances', [
            'foreignKey' => 'avance_id'
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
            ->date('dateremboursement')
            ->allowEmpty('dateremboursement');

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
        $rules->add($rules->existsIn(['avance_id'], 'Avances'));
        $rules->add($rules->existsIn(['situation_id'], 'Situations'));

        return $rules;
    }
}
