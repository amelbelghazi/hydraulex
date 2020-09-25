<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locataires Model
 *
 * @property \App\Model\Table\LocationsMachineTable|\Cake\ORM\Association\HasMany $LocationsMachine
 *
 * @method \App\Model\Entity\Locataire get($primaryKey, $options = [])
 * @method \App\Model\Entity\Locataire newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Locataire[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Locataire|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Locataire patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Locataire[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Locataire findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LocatairesTable extends Table
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

        $this->setTable('locataires');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('LocationsMachine', [
            'foreignKey' => 'locataire_id'
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
            ->scalar('nom')
            ->maxLength('nom', 100)
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->scalar('adresse')
            ->maxLength('adresse', 300)
            ->allowEmpty('adresse');

        $validator
            ->scalar('numeroFixe')
            ->maxLength('numeroFixe', 9)
            ->allowEmpty('numeroFixe');

        $validator
            ->scalar('numeroPortable')
            ->maxLength('numeroPortable', 10)
            ->allowEmpty('numeroPortable');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
