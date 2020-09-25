<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesAvances Model
 *
 * @property \App\Model\Table\AvancesTable|\Cake\ORM\Association\HasMany $Avances
 *
 * @method \App\Model\Entity\TypesAvance get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesAvance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesAvance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesAvance|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesAvance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesAvance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesAvance findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesAvancesTable extends Table
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

        $this->setTable('types_avances');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Avances', [
            'foreignKey' => 'types_avance_id'
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
            ->scalar('libelle')
            ->maxLength('libelle', 150)
            ->allowEmpty('libelle');

        $validator
            ->integer('pourcentage')
            ->allowEmpty('pourcentage');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
