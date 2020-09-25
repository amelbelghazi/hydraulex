<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesProduits Model
 *
 * @property \App\Model\Table\TypesProduitsTable|\Cake\ORM\Association\BelongsTo $TypesProduits
 * @property \App\Model\Table\ProduitsTable|\Cake\ORM\Association\HasMany $Produits
 * @property \App\Model\Table\TypesProduitsTable|\Cake\ORM\Association\HasMany $TypesProduits
 *
 * @method \App\Model\Entity\TypesProduit get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesProduit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesProduit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesProduit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesProduit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesProduit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesProduit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesProduitsTable extends Table
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

        $this->setTable('types_produits');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TypesProduits', [
            'foreignKey' => 'types_produit_id'
        ]);
        $this->hasMany('Produits', [
            'foreignKey' => 'types_produit_id'
        ]);
        $this->hasMany('TypesProduits', [
            'foreignKey' => 'types_produit_id'
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
            ->maxLength('libelle', 250)
            ->allowEmpty('libelle');

        $validator
            ->scalar('couleur')
            ->maxLength('couleur', 10)
            ->allowEmpty('couleur');

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
        $rules->add($rules->existsIn(['types_produit_id'], 'TypesProduits'));

        return $rules;
    }
}
