<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesDepenses Model
 *
 * @property \App\Model\Table\DepensesTable|\Cake\ORM\Association\HasMany $Depenses
 *
 * @method \App\Model\Entity\TypesDepense get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesDepense newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesDepense[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesDepense|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesDepense patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesDepense[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesDepense findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesDepensesTable extends Table
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

        $this->setTable('types_depenses');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Depenses', [
            'foreignKey' => 'types_depense_id'
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
            ->scalar('name')
            ->maxLength('name', 250)
            ->allowEmpty('name');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
