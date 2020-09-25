<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Materiels Model
 *
 * @property \App\Model\Table\RessourcesTable|\Cake\ORM\Association\BelongsTo $Ressources
 * @property \App\Model\Table\ReparationsMaterielTable|\Cake\ORM\Association\HasMany $ReparationsMateriel
 *
 * @method \App\Model\Entity\Materiel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Materiel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Materiel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Materiel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Materiel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Materiel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Materiel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MaterielsTable extends Table
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

        $this->setTable('materiels');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ressources', [
            'foreignKey' => 'ressource_id'
        ]);
        $this->hasMany('ReparationsMateriel', [
            'foreignKey' => 'materiel_id'
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
        $rules->add($rules->existsIn(['ressource_id'], 'Ressources'));

        return $rules;
    }
}
