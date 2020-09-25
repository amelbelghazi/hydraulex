<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesPersonnels Model
 *
 * @property \App\Model\Table\PersonnelsTable|\Cake\ORM\Association\HasMany $Personnels
 *
 * @method \App\Model\Entity\TypesPersonnel get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesPersonnel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesPersonnel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesPersonnel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesPersonnel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesPersonnel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesPersonnel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesPersonnelsTable extends Table
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

        $this->setTable('types_personnels');
        $this->setDisplayField('libellé');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Personnels', [
            'foreignKey' => 'types_personnel_id'
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
            ->scalar('libellé')
            ->maxLength('libellé', 50)
            ->allowEmpty('libellé');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
