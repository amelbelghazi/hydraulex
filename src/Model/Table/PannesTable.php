<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pannes Model
 *
 * @property \App\Model\Table\RessourcesTable|\Cake\ORM\Association\BelongsTo $Ressources
 * @property \App\Model\Table\ReparationsTable|\Cake\ORM\Association\HasMany $Reparations
 * @property \App\Model\Table\ReparationsMachineTable|\Cake\ORM\Association\HasMany $ReparationsMachine
 *
 * @method \App\Model\Entity\Panne get($primaryKey, $options = [])
 * @method \App\Model\Entity\Panne newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Panne[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Panne|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Panne patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Panne[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Panne findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PannesTable extends Table
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

        $this->setTable('pannes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ressources', [
            'foreignKey' => 'ressource_id'
        ]);
        $this->hasMany('Reparations', [
            'foreignKey' => 'panne_id'
        ]);
        $this->hasMany('ReparationsMachine', [
            'foreignKey' => 'panne_id'
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
            ->date('datepanne')
            ->allowEmpty('datepanne');

        $validator
            ->scalar('cause')
            ->maxLength('cause', 200)
            ->allowEmpty('cause');

        $validator
            ->integer('duree')
            ->allowEmpty('duree');

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
        $rules->add($rules->existsIn(['ressource_id'], 'Ressources'));

        return $rules;
    }
}
