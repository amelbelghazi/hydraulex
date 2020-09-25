<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PositionsAdministratives Model
 *
 * @property \App\Model\Table\PersonnelsTable|\Cake\ORM\Association\BelongsTo $Personnels
 * @property \App\Model\Table\FonctionsTable|\Cake\ORM\Association\BelongsTo $Fonctions
 * @property \App\Model\Table\DepartementsTable|\Cake\ORM\Association\BelongsTo $Departements
 *
 * @method \App\Model\Entity\PositionsAdministrative get($primaryKey, $options = [])
 * @method \App\Model\Entity\PositionsAdministrative newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PositionsAdministrative[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PositionsAdministrative|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PositionsAdministrative patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PositionsAdministrative[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PositionsAdministrative findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PositionsAdministrativesTable extends Table
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

        $this->setTable('positions_administratives');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Positions', [
            'foreignKey' => 'personnel_id'
        ]);
        $this->belongsTo('Fonctions', [
            'foreignKey' => 'fonction_id'
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
        $rules->add($rules->existsIn(['position_id'], 'Positions'));
        $rules->add($rules->existsIn(['fonction_id'], 'Fonctions'));
        $rules->add($rules->existsIn(['departement_id'], 'Departements'));

        return $rules;
    }
}
