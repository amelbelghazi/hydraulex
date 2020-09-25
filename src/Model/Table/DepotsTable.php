<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Depots Model
 *
 * @property \App\Model\Table\StocksTable|\Cake\ORM\Association\HasMany $Stocks
 *
 * @method \App\Model\Entity\Depot get($primaryKey, $options = [])
 * @method \App\Model\Entity\Depot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Depot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Depot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Depot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Depot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Depot findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DepotsTable extends Table
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

        $this->setTable('depots');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Stocks', [
            'foreignKey' => 'depot_id'
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
            ->maxLength('libelle', 50)
            ->allowEmpty('libelle');

        $validator
            ->scalar('adresse')
            ->maxLength('adresse', 500)
            ->allowEmpty('adresse');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
