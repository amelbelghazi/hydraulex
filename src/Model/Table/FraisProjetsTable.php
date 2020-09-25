<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FraisProjets Model
 *
 * @property \App\Model\Table\TypesFraisTable|\Cake\ORM\Association\BelongsTo $TypesFrais
 * @property \App\Model\Table\AffairesTable|\Cake\ORM\Association\BelongsTo $Affaires
 *
 * @method \App\Model\Entity\FraisProjet get($primaryKey, $options = [])
 * @method \App\Model\Entity\FraisProjet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FraisProjet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FraisProjet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FraisProjet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FraisProjet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FraisProjet findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FraisProjetsTable extends Table
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

        $this->setTable('frais_projets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Affaires', [
            'foreignKey' => 'affaire_id'
        ]);
        $this->hasMany('DetailsFraisProjets', [
            'foreignKey' => 'frais_projet_id'
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
            ->notEmpty('montant');

        $validator
            ->numeric('total')
            ->notEmpty('total');

        $validator
            ->date('datefrais')
            ->notEmpty('datefrais');

        $validator
            ->notEmpty('affaire_id');

        $validator
            ->scalar('observation')
            ->maxLength('observation', 255)
            ->allowEmpty('observation');

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

        return $rules;
    }
}
