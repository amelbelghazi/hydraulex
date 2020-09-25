<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetailsBonCommande Model
 *
 * @property \App\Model\Table\BonsCommandesTable|\Cake\ORM\Association\BelongsTo $BonsCommandes
 * @property \App\Model\Table\UnitesTable|\Cake\ORM\Association\BelongsTo $Unites
 * @property \App\Model\Table\ProduitsTable|\Cake\ORM\Association\BelongsTo $Produits
 *
 * @method \App\Model\Entity\DetailsBonCommande get($primaryKey, $options = [])
 * @method \App\Model\Entity\DetailsBonCommande newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DetailsBonCommande[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetailsBonCommande|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DetailsBonCommande patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DetailsBonCommande[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetailsBonCommande findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DetailsBonCommandeTable extends Table
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

        $this->setTable('details_bon_commande');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('BonsCommandes', [
            'foreignKey' => 'bons_commande_id'
        ]);
        $this->belongsTo('Produits', [
            'foreignKey' => 'produit_id'
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
            ->numeric('prixachat')
            ->allowEmpty('prixachat');

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
        $rules->add($rules->existsIn(['bons_commande_id'], 'BonsCommandes'));
        $rules->add($rules->existsIn(['produit_id'], 'Produits'));

        return $rules;
    }
}
