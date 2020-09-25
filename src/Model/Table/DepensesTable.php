<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Depenses Model
 *
 * @property \App\Model\Table\TypesDepensesTable|\Cake\ORM\Association\BelongsTo $TypesDepenses
 * @property \App\Model\Table\DepartementsTable|\Cake\ORM\Association\BelongsTo $Departements
 *
 * @method \App\Model\Entity\Depense get($primaryKey, $options = [])
 * @method \App\Model\Entity\Depense newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Depense[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Depense|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Depense patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Depense[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Depense findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DepensesTable extends Table
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

        $this->setTable('depenses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TypesDepenses', [
            'foreignKey' => 'types_depense_id'
        ]);
        $this->belongsTo('Departements', [
            'foreignKey' => 'departement_id'
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
            ->scalar('cause')
            ->maxLength('cause', 250)
            ->allowEmpty('cause');

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
        $rules->add($rules->existsIn(['types_depense_id'], 'TypesDepenses'));
        $rules->add($rules->existsIn(['departement_id'], 'Departements'));

        return $rules;
    }
}
