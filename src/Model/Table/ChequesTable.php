<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cheques Model
 *
 * @property \App\Model\Table\AchatsTable|\Cake\ORM\Association\BelongsTo $Achats
 * @property |\Cake\ORM\Association\BelongsTo $Documents
 *
 * @method \App\Model\Entity\Cheque get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cheque newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cheque[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cheque|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cheque patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cheque[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cheque findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChequesTable extends Table
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

        $this->setTable('cheques');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Achats', [
            'foreignKey' => 'achat_id'
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
            ->integer('etat')
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
        $rules->add($rules->existsIn(['achat_id'], 'Achats'));
        $rules->add($rules->existsIn(['document_id'], 'Documents'));

        return $rules;
    }
}
