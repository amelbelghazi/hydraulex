<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fournitures Model
 *
 * @property \App\Model\Table\DepartementsTable|\Cake\ORM\Association\BelongsTo $Departements
 * @property \App\Model\Table\StocksTable|\Cake\ORM\Association\BelongsTo $Stocks
 *
 * @method \App\Model\Entity\Fourniture get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fourniture newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fourniture[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fourniture|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fourniture patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fourniture[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fourniture findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FournituresTable extends Table
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

        $this->setTable('fournitures');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Departements', [
            'foreignKey' => 'departement_id'
        ]);
        $this->belongsTo('Stocks', [
            'foreignKey' => 'stock_id'
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
            ->date('dateutilisation')
            ->allowEmpty('dateutilisation');

        $validator
            ->integer('qte')
            ->allowEmpty('qte');

        $validator
            ->scalar('observation')
            ->maxLength('observation', 500)
            ->allowEmpty('observation');

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
        $rules->add($rules->existsIn(['departement_id'], 'Departements'));
        $rules->add($rules->existsIn(['stock_id'], 'Stocks'));

        return $rules;
    }
}
