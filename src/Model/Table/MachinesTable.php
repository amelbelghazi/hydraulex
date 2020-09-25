<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Machines Model
 *
 * @property \App\Model\Table\ProprietairesTable|\Cake\ORM\Association\BelongsTo $Proprietaires
 * @property \App\Model\Table\RessourcesTable|\Cake\ORM\Association\BelongsTo $Ressources
 * @property \App\Model\Table\MarquesTable|\Cake\ORM\Association\BelongsTo $Marques
 * @property \App\Model\Table\EntretiensMachineTable|\Cake\ORM\Association\HasMany $EntretiensMachine
 * @property \App\Model\Table\LocationsMachineTable|\Cake\ORM\Association\HasMany $LocationsMachine
 * @property \App\Model\Table\PannesTable|\Cake\ORM\Association\HasMany $Pannes
 * @property \App\Model\Table\PiecesMachineTable|\Cake\ORM\Association\HasMany $PiecesMachine
 *
 * @method \App\Model\Entity\Machine get($primaryKey, $options = [])
 * @method \App\Model\Entity\Machine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Machine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Machine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Machine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Machine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Machine findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MachinesTable extends Table
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

        $this->setTable('machines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Proprietaires', [
            'foreignKey' => 'proprietaire_id'
        ]);
        $this->belongsTo('Ressources', [
            'foreignKey' => 'ressource_id'
        ]);
        $this->belongsTo('Marques', [
            'foreignKey' => 'marque_id'
        ]);
        $this->hasMany('EntretiensMachine', [
            'foreignKey' => 'machine_id'
        ]);
        $this->hasMany('LocationsMachine', [
            'foreignKey' => 'machine_id'
        ]);
        $this->hasMany('Pannes', [
            'foreignKey' => 'machine_id'
        ]);
        $this->hasMany('PiecesMachine', [
            'foreignKey' => 'machine_id'
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
        $rules->add($rules->existsIn(['proprietaire_id'], 'Proprietaires'));
        $rules->add($rules->existsIn(['ressource_id'], 'Ressources'));
        $rules->add($rules->existsIn(['marque_id'], 'Marques'));

        return $rules;
    }
}
