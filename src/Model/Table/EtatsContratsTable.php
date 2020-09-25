<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EtatsContrats Model
 *
 * @property \App\Model\Table\ContratsTable|\Cake\ORM\Association\BelongsTo $Contrats
 * @property \App\Model\Table\TypesEtatsContratsTable|\Cake\ORM\Association\BelongsTo $TypesEtatsContrats
 * @property \App\Model\Table\ContratsTable|\Cake\ORM\Association\HasMany $Contrats
 *
 * @method \App\Model\Entity\EtatsContrat get($primaryKey, $options = [])
 * @method \App\Model\Entity\EtatsContrat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EtatsContrat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EtatsContrat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EtatsContrat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EtatsContrat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EtatsContrat findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EtatsContratsTable extends Table
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

        $this->setTable('etats_contrats');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Contrats', [
            'foreignKey' => 'contrat_id'
        ]);
        $this->belongsTo('TypesEtatsContrats', [
            'foreignKey' => 'types_etats_contrat_id'
        ]);
        $this->hasMany('Contrats', [
            'foreignKey' => 'etats_contrat_id'
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
        $rules->add($rules->existsIn(['contrat_id'], 'Contrats'));
        $rules->add($rules->existsIn(['types_etats_contrat_id'], 'TypesEtatsContrats'));

        return $rules;
    }
}
