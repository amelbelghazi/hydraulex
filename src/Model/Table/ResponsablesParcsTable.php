<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResponsablesParcs Model
 *
 * @property \App\Model\Table\ParcsTable|\Cake\ORM\Association\BelongsTo $Parcs
 * @property \App\Model\Table\ResponsablesTable|\Cake\ORM\Association\BelongsTo $Responsables
 *
 * @method \App\Model\Entity\ResponsablesParc get($primaryKey, $options = [])
 * @method \App\Model\Entity\ResponsablesParc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ResponsablesParc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ResponsablesParc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ResponsablesParc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ResponsablesParc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ResponsablesParc findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ResponsablesParcsTable extends Table
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

        $this->setTable('responsables_parcs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Parcs', [
            'foreignKey' => 'parc_id'
        ]);
        $this->belongsTo('Responsables', [
            'foreignKey' => 'responsable_id'
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
        $rules->add($rules->existsIn(['parc_id'], 'Parcs'));
        $rules->add($rules->existsIn(['responsable_id'], 'Responsables'));

        return $rules;
    }
}
