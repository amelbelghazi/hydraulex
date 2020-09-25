<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BonsCommandes Model
 *
 * @property \App\Model\Table\DepartementsTable|\Cake\ORM\Association\BelongsTo $Departements
 * @property \App\Model\Table\FournisseursTable|\Cake\ORM\Association\BelongsTo $Fournisseurs
 * @property \App\Model\Table\DetailsBonCommandeTable|\Cake\ORM\Association\HasMany $DetailsBonCommande
 *
 * @method \App\Model\Entity\BonsCommande get($primaryKey, $options = [])
 * @method \App\Model\Entity\BonsCommande newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BonsCommande[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BonsCommande|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BonsCommande patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BonsCommande[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BonsCommande findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BonsCommandesTable extends Table
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

        $this->setTable('bons_commandes');
        $this->setDisplayField('numero');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Departements', [
            'foreignKey' => 'departement_id'
        ]);
        $this->belongsTo('Fournisseurs', [
            'foreignKey' => 'fournisseur_id'
        ]);
        $this->hasMany('DetailsBonCommande', [
            'foreignKey' => 'bons_commande_id',
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
            ->numeric('total')
            ->allowEmpty('total');

        $validator
            ->integer('tva')
            ->allowEmpty('tva');

        $validator
            ->date('datebon')
            ->allowEmpty('datebon');

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
        $rules->add($rules->existsIn(['fournisseur_id'], 'Fournisseurs'));

        return $rules;
    }
}
