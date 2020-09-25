<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Departements Model
 *
 * @property \App\Model\Table\SocietesTable|\Cake\ORM\Association\BelongsTo $Societes
 * @property \App\Model\Table\AchatsTable|\Cake\ORM\Association\HasMany $Achats
 * @property \App\Model\Table\BonsCommandesTable|\Cake\ORM\Association\HasMany $BonsCommandes
 * @property \App\Model\Table\DepensesTable|\Cake\ORM\Association\HasMany $Depenses
 * @property \App\Model\Table\FournituresTable|\Cake\ORM\Association\HasMany $Fournitures
 * @property \App\Model\Table\PositionsAdministrativesTable|\Cake\ORM\Association\HasMany $PositionsAdministratives
 *
 * @method \App\Model\Entity\Departement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Departement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Departement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Departement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Departement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Departement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Departement findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DepartementsTable extends Table
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

        $this->setTable('departements');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Societes', [
            'foreignKey' => 'societe_id'
        ]);
        $this->hasMany('Achats', [
            'foreignKey' => 'departement_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('BonsCommandes', [
            'foreignKey' => 'departement_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Depenses', [
            'foreignKey' => 'departement_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Fournitures', [
            'foreignKey' => 'departement_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('PositionsAdministratives', [
            'foreignKey' => 'departement_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('AffectationsRessource', [
            'foreignKey' => 'departement_id',
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
        $rules->add($rules->existsIn(['societe_id'], 'Societes'));

        return $rules;
    }
}
