<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stocks Model
 *
 * @property \App\Model\Table\DepotsTable|\Cake\ORM\Association\BelongsTo $Depots
 * @property \App\Model\Table\AchatsDetailsTable|\Cake\ORM\Association\BelongsTo $AchatsDetails
 * @property \App\Model\Table\ProduitsTable|\Cake\ORM\Association\BelongsTo $Produits
 * @property \App\Model\Table\FournituresTable|\Cake\ORM\Association\HasMany $Fournitures
 * @property \App\Model\Table\RessourcesTable|\Cake\ORM\Association\HasMany $Ressources
 *
 * @method \App\Model\Entity\Stock get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stock newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stock|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stock[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stock findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StocksTable extends Table
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

        $this->setTable('stocks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Depots', [
            'foreignKey' => 'depot_id'
        ]);
        $this->belongsTo('AchatsDetails', [
            'foreignKey' => 'achats_detail_id'
        ]);
        $this->belongsTo('Produits', [
            'foreignKey' => 'produit_id'
        ]);
        $this->hasMany('Fournitures', [
            'foreignKey' => 'stock_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('StocksRessources', [
            'foreignKey' => 'stock_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
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
            ->date('datestock')
            ->allowEmpty('datestock');

        $validator
            ->integer('qte')
            ->allowEmpty('qte');

        $validator
            ->numeric('prix')
            ->allowEmpty('prix');

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
        if(isset($depot_id))
            $rules->add($rules->existsIn(['depot_id'], 'Depots'));
        $rules->add($rules->existsIn(['produit_id'], 'Produits'));
        $rules->add($rules->existsIn(['achats_detail_id'], 'AchatsDetails'));

        return $rules;
    }
}
