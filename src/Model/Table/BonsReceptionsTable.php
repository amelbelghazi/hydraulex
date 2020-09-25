<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BonsReceptions Model
 *
 * @property \App\Model\Table\AchatsTable|\Cake\ORM\Association\BelongsTo $Achats
 * @property \App\Model\Table\BonsCommandesTable|\Cake\ORM\Association\BelongsTo $BonsCommandes
 * @property \App\Model\Table\DetailsBonReceptionTable|\Cake\ORM\Association\HasMany $DetailsBonReception
 *
 * @method \App\Model\Entity\BonsReception get($primaryKey, $options = [])
 * @method \App\Model\Entity\BonsReception newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BonsReception[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BonsReception|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BonsReception patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BonsReception[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BonsReception findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BonsReceptionsTable extends Table
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

        $this->setTable('bons_receptions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Achats', [
            'foreignKey' => 'bons_reception_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->belongsTo('BonsCommandes', [
            'foreignKey' => 'bons_commande_id'
        ]);
        $this->hasMany('DetailsBonReception', [
            'foreignKey' => 'bons_reception_id',
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
            ->date('datereception')
            ->allowEmpty('datereception');

        $validator
            ->scalar('observation')
            ->maxLength('observation', 250)
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
        $rules->add($rules->existsIn(['achat_id'], 'Achats'));
        $rules->add($rules->existsIn(['bons_commande_id'], 'BonsCommandes'));

        return $rules;
    }
}
