<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FonctionsAdministratives Model
 *
 * @property \App\Model\Table\FonctionsTable|\Cake\ORM\Association\BelongsTo $Fonctions
 *
 * @method \App\Model\Entity\FonctionsAdministrative get($primaryKey, $options = [])
 * @method \App\Model\Entity\FonctionsAdministrative newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FonctionsAdministrative[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FonctionsAdministrative|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FonctionsAdministrative patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FonctionsAdministrative[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FonctionsAdministrative findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FonctionsAdministrativesTable extends Table
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

        $this->setTable('fonctions_administratives');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Fonctions', [
            'foreignKey' => 'fonction_id'
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
        $rules->add($rules->existsIn(['fonction_id'], 'Fonctions'));

        return $rules;
    }
}
