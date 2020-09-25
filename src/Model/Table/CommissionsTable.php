<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Commissions Model
 *
 * @property \App\Model\Table\AffairesTable|\Cake\ORM\Association\BelongsTo $Affaires
 * @property \App\Model\Table\EtatsCommisionTable|\Cake\ORM\Association\HasMany $EtatsCommision
 *
 * @method \App\Model\Entity\Commission get($primaryKey, $options = [])
 * @method \App\Model\Entity\Commission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Commission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Commission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Commission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Commission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Commission findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CommissionsTable extends Table
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

        $this->setTable('commissions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Affaires', [
            'foreignKey' => 'affaire_id'
        ]); 
        $this->belongsTo('Documents', [
            'foreignKey' => 'document_id'
        ]);
        $this->hasMany('EtatsCommissions', [
            'foreignKey' => 'commission_id'
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
            ->date('datecommission')
            ->allowEmpty('datecommission');

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
        $rules->add($rules->existsIn(['affaire_id'], 'Affaires'));
        $rules->add($rules->existsIn(['document_id'], 'Documents'));
        //$rules->add($rules->isUnique(['affaire_id']));

        return $rules;
    }
}
