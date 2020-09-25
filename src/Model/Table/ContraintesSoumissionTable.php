<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContraintesSoumission Model
 *
 * @property \App\Model\Table\UnitesTable|\Cake\ORM\Association\BelongsTo $Unites
 *
 * @method \App\Model\Entity\ContraintesSoumission get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContraintesSoumission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContraintesSoumission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContraintesSoumission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContraintesSoumission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContraintesSoumission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContraintesSoumission findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContraintesSoumissionTable extends Table
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

        $this->setTable('contraintes_soumission');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Unites', [
            'foreignKey' => 'unite_id'
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
            ->scalar('libelle')
            ->maxLength('libelle', 150)
            ->allowEmpty('libelle');

        $validator
            ->scalar('valeur')
            ->maxLength('valeur', 150)
            ->allowEmpty('valeur');

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
        $rules->add($rules->existsIn(['unite_id'], 'Unites'));

        return $rules;
    }
}
