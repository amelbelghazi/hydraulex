<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ressources Model
 *
 * @property \App\Model\Table\StocksTable|\Cake\ORM\Association\BelongsTo $Stocks
 * @property \App\Model\Table\TypesRessourcesTable|\Cake\ORM\Association\BelongsTo $TypesRessources
 * @property \App\Model\Table\AffectationsRessourceTable|\Cake\ORM\Association\HasMany $AffectationsRessource
 * @property \App\Model\Table\MachinesTable|\Cake\ORM\Association\HasMany $Machines
 * @property \App\Model\Table\MaterielsTable|\Cake\ORM\Association\HasMany $Materiels
 *
 * @method \App\Model\Entity\Ressource get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ressource newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ressource[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ressource|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ressource patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ressource[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ressource findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RessourcesTable extends Table
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

        $this->setTable('ressources');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);

        $this->belongsTo('DetailsLocations', [
            'foreignKey' => 'details_location_id'
        ]);

        $this->belongsTo('TypesRessources', [
            'foreignKey' => 'types_ressource_id'
        ]);
        $this->hasMany('Affectations', [
            'foreignKey' => 'ressource_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Machines', [
            'foreignKey' => 'ressource_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Materiels', [
            'foreignKey' => 'ressource_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('ParcsRessources', [
            'foreignKey' => 'ressource_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Affectations', [
            'foreignKey' => 'ressource_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('ParcsRessources', [
            'foreignKey' => 'ressource_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('PiecesRessources', [
            'foreignKey' => 'ressource_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('EtatsRessources', [
            'foreignKey' => 'ressource_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('StocksRessources', [
            'foreignKey' => 'ressource_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Pannes', [
            'foreignKey' => 'ressource_id',
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
            ->date('datedebutservice')
            ->allowEmpty('datedebutservice');

        $validator
            ->date('datedebutcirculation')
            ->allowEmpty('datedebutcirculation');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        $validator
            ->integer('qte');

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
        $rules->add($rules->existsIn(['types_ressource_id'], 'TypesRessources'));

        return $rules;
    }
}
