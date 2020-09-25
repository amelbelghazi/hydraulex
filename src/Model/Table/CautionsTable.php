<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cautions Model
 *
 * @property \App\Model\Table\MarchesTable|\Cake\ORM\Association\BelongsTo $Marches
 * @property \App\Model\Table\TypesCautionsTable|\Cake\ORM\Association\BelongsTo $TypesCautions
 * @property \App\Model\Table\RemboursementsCautionTable|\Cake\ORM\Association\HasMany $RemboursementsCaution
 *
 * @method \App\Model\Entity\Caution get($primaryKey, $options = [])
 * @method \App\Model\Entity\Caution newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Caution[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Caution|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Caution patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Caution[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Caution findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CautionsTable extends Table
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

        $this->setTable('cautions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Marches', [
            'foreignKey' => 'marche_id'
        ]);
        $this->belongsTo('TypesCautions', [
            'foreignKey' => 'types_caution_id'
        ]);
        $this->hasMany('RemboursementsCaution', [ 
            'foreignKey' => 'caution_id'
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
            ->integer('numero')
            ->allowEmpty('numero');

        $validator
            ->numeric('montant')
            ->allowEmpty('montant');

        $validator
            ->scalar('etat')
            ->maxLength('etat', 10)
            ->allowEmpty('etat');

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
        $rules->add($rules->existsIn(['types_caution_id'], 'TypesCautions'));
          $rules->add($rules->existsIn(['document_id'], 'Documents'));

        return $rules;
    }
}
