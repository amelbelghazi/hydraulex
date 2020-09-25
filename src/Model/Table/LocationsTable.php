<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locations Model
 *
 * @property \App\Model\Table\DepartementsTable|\Cake\ORM\Association\BelongsTo $Departements
 * @property \App\Model\Table\ProprietairesTable|\Cake\ORM\Association\BelongsTo $Proprietaires
 * @property \App\Model\Table\ModesReglementsTable|\Cake\ORM\Association\BelongsTo $ModesReglements
 * @property \App\Model\Table\LocationsDetailsTable|\Cake\ORM\Association\HasMany $LocationsDetails
 * @property \App\Model\Table\RessourcesTable|\Cake\ORM\Association\HasMany $Ressources
 * @property \App\Model\Table\DettesTable|\Cake\ORM\Association\BelongsToMany $Dettes
 * @property \App\Model\Table\StocksTable|\Cake\ORM\Association\BelongsToMany $Stocks
 * @property \App\Model\Table\VersementsTable|\Cake\ORM\Association\BelongsToMany $Versements
 *
 * @method \App\Model\Entity\Location get($primaryKey, $options = [])
 * @method \App\Model\Entity\Location newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Location[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Location|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Location patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Location[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Location findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LocationsTable extends Table
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

        $this->setTable('locations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Departements', [
            'foreignKey' => 'departement_id'
        ]);
        $this->belongsTo('Proprietaires', [
            'foreignKey' => 'proprietaire_id'
        ]);
        $this->belongsTo('ModesReglements', [
            'foreignKey' => 'modes_reglement_id'
        ]);
        $this->hasMany('LocationsDetails', [
            'foreignKey' => 'location_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('DettesLocations', [
            'foreignKey' => 'location_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('ChequesLocations', [
            'foreignKey' => 'location_id',
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
            ->scalar('numero')
            ->maxLength('numero', 20)
            ->allowEmpty('numero');

        $validator
            ->date('datelocation')
            ->allowEmpty('datelocation');

        $validator
            ->scalar('regle')
            ->maxLength('regle', 3)
            ->allowEmpty('regle');

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
        $rules->add($rules->existsIn(['proprietaire_id'], 'Proprietaires'));
        $rules->add($rules->existsIn(['modes_reglement_id'], 'ModesReglements'));

        return $rules;
    }
}
