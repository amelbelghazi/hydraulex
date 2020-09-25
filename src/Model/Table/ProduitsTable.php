<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produits Model
 *
 * @property \App\Model\Table\UnitesTable|\Cake\ORM\Association\BelongsTo $Unites
 * @property \App\Model\Table\TypesProduitsTable|\Cake\ORM\Association\BelongsTo $TypesProduits
 * @property \App\Model\Table\DetailsBonCommandeTable|\Cake\ORM\Association\HasMany $DetailsBonCommande
 * @property \App\Model\Table\DetailsBonReceptionTable|\Cake\ORM\Association\HasMany $DetailsBonReception
 * @property \App\Model\Table\StocksTable|\Cake\ORM\Association\HasMany $Stocks
 *
 * @method \App\Model\Entity\Produit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Produit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Produit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Produit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProduitsTable extends Table
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

        $this->setTable('produits');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Unites', [
            'foreignKey' => 'unite_id'
        ]);
        $this->belongsTo('TypesProduits', [
            'foreignKey' => 'types_produit_id'
        ]);
        $this->hasMany('DetailsBonCommande', [
            'foreignKey' => 'produit_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('DetailsBonReception', [
            'foreignKey' => 'produit_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Stocks', [
            'foreignKey' => 'produit_id',
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
            ->scalar('nom')
            ->maxLength('nom', 250)
            ->allowEmpty('nom');

        $validator
            ->scalar('code')
            ->maxLength('code', 50)
            ->allowEmpty('code');

        $validator
            ->date('qte')
            ->allowEmpty('qte');

        $validator
            ->integer('qtealert')
            ->allowEmpty('qtealert');

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
        $rules->add($rules->existsIn(['unite_id'], 'Unites'));
        $rules->add($rules->existsIn(['types_produit_id'], 'TypesProduits'));

        return $rules;
    }
}
