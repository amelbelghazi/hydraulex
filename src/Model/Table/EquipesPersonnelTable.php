<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EquipesPersonnel Model
 *
 * @property \App\Model\Table\PersonnelsTable|\Cake\ORM\Association\BelongsTo $Personnels
 * @property \App\Model\Table\EquipesTable|\Cake\ORM\Association\BelongsTo $Equipes
 *
 * @method \App\Model\Entity\EquipesPersonnel get($primaryKey, $options = [])
 * @method \App\Model\Entity\EquipesPersonnel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EquipesPersonnel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EquipesPersonnel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EquipesPersonnel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EquipesPersonnel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EquipesPersonnel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EquipesPersonnelTable extends Table
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

        $this->setTable('equipes_personnel');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Personnels', [
            'foreignKey' => 'personnel_id'
        ]);
        $this->belongsTo('Equipes', [
            'foreignKey' => 'equipe_id'
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
        $rules->add($rules->existsIn(['personnel_id'], 'Personnels'));
        $rules->add($rules->existsIn(['equipe_id'], 'Equipes'));

        return $rules;
    }
}
