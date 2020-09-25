<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Avances Model
 *
 * @property \App\Model\Table\MarchesTable|\Cake\ORM\Association\BelongsTo $Marches
 * @property \App\Model\Table\RemboursementsAvanceTable|\Cake\ORM\Association\HasMany $RemboursementsAvance
 *
 * @method \App\Model\Entity\Avance get($primaryKey, $options = [])
 * @method \App\Model\Entity\Avance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Avance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Avance|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Avance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Avance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Avance findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AvancesTable extends Table 
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

        $this->setTable('avances');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Marches', [
            'foreignKey' => 'marche_id'
        ]); 
        $this->belongsTo('TypesAvances', [
            'foreignKey' => 'types_avance_id'
        ]);
        $this->hasMany('RemboursementsAvance', [
            'foreignKey' => 'avance_id'
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
            ->numeric('montant')
            ->allowEmpty('montant');

        $validator
            ->integer('numero')
            ->allowEmpty('numero');

        $validator
            ->date('dateremboursement')
            ->allowEmpty('dateremboursement');

        $validator
            ->date('dateavance')
            ->allowEmpty('dateavance');

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
          $rules->add($rules->existsIn(['document_id'], 'Documents'));

        return $rules;
    }
}
