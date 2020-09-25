<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjetsSoustraitant Model
 *
 * @property \App\Model\Table\MarchesTable|\Cake\ORM\Association\BelongsTo $Marches
 * @property \App\Model\Table\SoustraitantsTable|\Cake\ORM\Association\BelongsTo $Soustraitants
 *
 * @method \App\Model\Entity\ProjetsSoustraitant get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjetsSoustraitant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjetsSoustraitant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjetsSoustraitant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjetsSoustraitant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjetsSoustraitant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjetsSoustraitant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjetsSoustraitantTable extends Table
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

        $this->setTable('projets_soustraitant');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Marches', [
            'foreignKey' => 'marche_id'
        ]);
        $this->belongsTo('Soustraitants', [
            'foreignKey' => 'soustraitant_id'
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
            ->integer('duree')
            ->allowEmpty('duree');

        $validator
            ->numeric('montant')
            ->allowEmpty('montant');

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
        $rules->add($rules->existsIn(['soustraitant_id'], 'Soustraitants'));

        return $rules;
    }
}
