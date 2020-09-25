<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Achats Model
 *
 * @property \App\Model\Table\DepartementsTable|\Cake\ORM\Association\BelongsTo $Departements
 * @property \App\Model\Table\FournisseursTable|\Cake\ORM\Association\BelongsTo $Fournisseurs
 * @property \App\Model\Table\ModesReglementsTable|\Cake\ORM\Association\BelongsTo $ModesReglements
 * @property \App\Model\Table\AchatsDetailsTable|\Cake\ORM\Association\HasMany $AchatsDetails
 * @property \App\Model\Table\BonsReceptionTable|\Cake\ORM\Association\HasMany $BonsReception
 * @property \App\Model\Table\DettesTable|\Cake\ORM\Association\HasMany $Dettes
 *
 * @method \App\Model\Entity\Achat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Achat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Achat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Achat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Achat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Achat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Achat findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AchatsTable extends Table
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

        $this->setTable('achats');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Departements', [
            'foreignKey' => 'departement_id'
        ]);
        $this->belongsTo('Fournisseurs', [
            'foreignKey' => 'fournisseur_id'
        ]);
        $this->belongsTo('ModesReglements', [
            'foreignKey' => 'modes_reglement_id'
        ]);
        $this->belongsTo('BonsReceptions', [
            'foreignKey' => 'bons_reception_id'
        ]);
        $this->hasMany('AchatsDetails', [
            'foreignKey' => 'achat_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Cheques', [
            'foreignKey' => 'achat_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->belongsTo('BonsReception', [
            'foreignKey' => 'bons_reception_id'
        ]);
        $this->hasMany('Dettes', [
            'foreignKey' => 'achat_id',
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
            ->notEmpty('datebon');

        $validator
            ->scalar('regle')
            ->maxLength('regle', 3)
            ->notEmpty('regle');

        $validator
            ->notEmpty('modes_reglement_id');

        $validator
            ->notEmpty('fournisseur_id');
            
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
        $rules->add($rules->existsIn(['modes_reglement_id'], 'ModesReglements'));

        return $rules;
    }
}
