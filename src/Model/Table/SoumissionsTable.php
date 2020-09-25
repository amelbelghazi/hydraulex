<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Soumissions Model
 *
 * @property \App\Model\Table\SoumissionnairesTable|\Cake\ORM\Association\BelongsTo $Soumissionnaires
 * @property \App\Model\Table\AffairesTable|\Cake\ORM\Association\BelongsTo $Affaires
 * @property \App\Model\Table\AttributionsTable|\Cake\ORM\Association\HasMany $Attributions
 *
 * @method \App\Model\Entity\Soumission get($primaryKey, $options = [])
 * @method \App\Model\Entity\Soumission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Soumission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Soumission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Soumission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Soumission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Soumission findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SoumissionsTable extends Table
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

        $this->setTable('soumissions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Soumissionnaires', [
            'foreignKey' => 'soumissionnaire_id'
        ]);
        $this->belongsTo('Affaires', [
            'foreignKey' => 'affaire_id'
        ]);
        $this->hasMany('Attributions', [
            'foreignKey' => 'soumission_id'
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
            ->numeric('delais')
            ->maxLength('delais', 5)
            ->allowEmpty('delais');

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
        $rules->add($rules->existsIn(['soumissionnaire_id'], 'Soumissionnaires'));
        $rules->add($rules->existsIn(['affaire_id'], 'Affaires'));

        return $rules;
    }
}
