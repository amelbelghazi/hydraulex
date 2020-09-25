<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StocksRessources Model
 *
 * @property \App\Model\Table\StocksTable|\Cake\ORM\Association\BelongsTo $Stocks
 * @property \App\Model\Table\RessourcesTable|\Cake\ORM\Association\BelongsTo $Ressources
 *
 * @method \App\Model\Entity\StocksRessource get($primaryKey, $options = [])
 * @method \App\Model\Entity\StocksRessource newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StocksRessource[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StocksRessource|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StocksRessource patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StocksRessource[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StocksRessource findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StocksRessourcesTable extends Table
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

        $this->setTable('stocks_ressources');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Stocks', [
            'foreignKey' => 'stock_id'
        ]);
        $this->belongsTo('Ressources', [
            'foreignKey' => 'ressource_id'
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
            ->integer('qte')
            ->allowEmpty('qte');

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
        $rules->add($rules->existsIn(['stock_id'], 'Stocks'));
        $rules->add($rules->existsIn(['ressource_id'], 'Ressources'));

        return $rules;
    }
}
