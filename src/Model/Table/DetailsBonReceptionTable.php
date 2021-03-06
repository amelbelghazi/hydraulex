<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetailsBonReception Model
 *
 * @property \App\Model\Table\BonsReceptionsTable|\Cake\ORM\Association\BelongsTo $BonsReceptions
 * @property \App\Model\Table\ProduitsTable|\Cake\ORM\Association\BelongsTo $Produits
 *
 * @method \App\Model\Entity\DetailsBonReception get($primaryKey, $options = [])
 * @method \App\Model\Entity\DetailsBonReception newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DetailsBonReception[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetailsBonReception|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DetailsBonReception patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DetailsBonReception[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetailsBonReception findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DetailsBonReceptionTable extends Table
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

        $this->setTable('details_bon_reception');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('BonsReceptions', [
            'foreignKey' => 'bons_reception_id'
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
        $rules->add($rules->existsIn(['bons_reception_id'], 'BonsReceptions'));
        $rules->add($rules->existsIn(['produit_id'], 'Produits'));

        return $rules;
    }
}
