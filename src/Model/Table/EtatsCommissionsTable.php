<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EtatsCommissions Model
 *
 * @property \App\Model\Table\CommissionsTable|\Cake\ORM\Association\BelongsTo $Commissions
 * @property \App\Model\Table\EtatsTable|\Cake\ORM\Association\BelongsTo $Etats
 *
 * @method \App\Model\Entity\EtatsCommission get($primaryKey, $options = [])
 * @method \App\Model\Entity\EtatsCommission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EtatsCommission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EtatsCommission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EtatsCommission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EtatsCommission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EtatsCommission findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EtatsCommissionsTable extends Table
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

        $this->setTable('etats_commissions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Commissions', [
            'foreignKey' => 'commission_id'
        ]);
        $this->belongsTo('Etats', [
            'foreignKey' => 'etat_id'
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
            ->date('dateetat')
            ->allowEmpty('dateetat');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        $validator
            ->scalar('cause')
            ->maxLength('cause', 255)
            ->allowEmpty('cause');

        $validator
            ->date('datecommission')
            ->allowEmpty('datecommission');

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
        $rules->add($rules->existsIn(['commission_id'], 'Commissions'));
        $rules->add($rules->existsIn(['etat_id'], 'Etats'));

        return $rules;
    }
}
