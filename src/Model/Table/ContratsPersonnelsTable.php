<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContratsPersonnels Model
 *
 * @property \App\Model\Table\ContratsTable|\Cake\ORM\Association\BelongsTo $Contrats
 * @property \App\Model\Table\PersonnelsTable|\Cake\ORM\Association\BelongsTo $Personnels
 *
 * @method \App\Model\Entity\ContratsPersonnel get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContratsPersonnel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContratsPersonnel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContratsPersonnel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContratsPersonnel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContratsPersonnel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContratsPersonnel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContratsPersonnelsTable extends Table
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

        $this->setTable('contrats_personnels');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Contrats', [
            'foreignKey' => 'contrat_id'
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
        $rules->add($rules->existsIn(['contrat_id'], 'Contrats'));
        $rules->add($rules->existsIn(['personnel_id'], 'Personnels'));

        return $rules;
    }
}
