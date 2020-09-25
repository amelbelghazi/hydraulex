<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StocksLocations Model
 *
 * @property \App\Model\Table\DepotsTable|\Cake\ORM\Association\BelongsTo $Depots
 * @property \App\Model\Table\LocationsDetailsTable|\Cake\ORM\Association\BelongsTo $LocationsDetails
 * @property \App\Model\Table\ProduitsTable|\Cake\ORM\Association\BelongsTo $Produits
 * @property \App\Model\Table\LocationsDetailsTable|\Cake\ORM\Association\HasMany $LocationsDetails
 *
 * @method \App\Model\Entity\StocksLocation get($primaryKey, $options = [])
 * @method \App\Model\Entity\StocksLocation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StocksLocation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StocksLocation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StocksLocation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StocksLocation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StocksLocation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StocksLocationsTable extends Table
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

        $this->setTable('stocks_locations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Depots', [
            'foreignKey' => 'depot_id'
        ]);
        $this->belongsTo('LocationsDetails', [
            'foreignKey' => 'locations_detail_id'
        ]);
        $this->belongsTo('Produits', [
            'foreignKey' => 'produit_id'
        ]);
        $this->hasMany('LocationsDetails', [
            'foreignKey' => 'stocks_location_id'
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
        $rules->add($rules->existsIn(['depot_id'], 'Depots'));
        $rules->add($rules->existsIn(['locations_detail_id'], 'LocationsDetails'));
        $rules->add($rules->existsIn(['produit_id'], 'Produits'));

        return $rules;
    }
}
