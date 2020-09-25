<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormationsPersonnel Model
 *
 * @property \App\Model\Table\FormationsTable|\Cake\ORM\Association\BelongsTo $Formations
 * @property \App\Model\Table\PersonnelsTable|\Cake\ORM\Association\BelongsTo $Personnels
 *
 * @method \App\Model\Entity\FormationsPersonnel get($primaryKey, $options = [])
 * @method \App\Model\Entity\FormationsPersonnel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FormationsPersonnel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormationsPersonnel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormationsPersonnel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FormationsPersonnel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormationsPersonnel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FormationsPersonnelTable extends Table
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

        $this->setTable('formations_personnel');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Formations', [
            'foreignKey' => 'formation_id'
        ]);
        $this->belongsTo('Personnels', [
            'foreignKey' => 'personnel_id'
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
        $rules->add($rules->existsIn(['formation_id'], 'Formations'));
        $rules->add($rules->existsIn(['personnel_id'], 'Personnels'));

        return $rules;
    }
}
