<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Assurances Model
 *
 * @property \App\Model\Table\TypesAssurancesTable|\Cake\ORM\Association\BelongsTo $TypesAssurances
 * @property \App\Model\Table\PersonnelsTable|\Cake\ORM\Association\BelongsTo $Personnels
 * @property \App\Model\Table\PersonnelsTable|\Cake\ORM\Association\BelongsToMany $Personnels
 *
 * @method \App\Model\Entity\Assurance get($primaryKey, $options = [])
 * @method \App\Model\Entity\Assurance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Assurance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Assurance|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Assurance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Assurance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Assurance findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AssurancesTable extends Table
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

        $this->setTable('assurances');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TypesAssurances', [
            'foreignKey' => 'types_assurance_id'
        ]);
        $this->belongsTo('Personnels', [
            'foreignKey' => 'personnel_id'
        ]);
        $this->belongsToMany('Personnels', [
            'foreignKey' => 'assurance_id',
            'targetForeignKey' => 'personnel_id',
            'joinTable' => 'assurances_personnels'
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
        $rules->add($rules->existsIn(['types_assurance_id'], 'TypesAssurances'));
        $rules->add($rules->existsIn(['personnel_id'], 'Personnels'));

        return $rules;
    }
}
