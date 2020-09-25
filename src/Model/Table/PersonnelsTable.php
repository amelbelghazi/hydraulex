<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Personnels Model
 *
 * @property \App\Model\Table\PersonnesTable|\Cake\ORM\Association\BelongsTo $Personnes
 * @property \App\Model\Table\TypesPersonnelsTable|\Cake\ORM\Association\BelongsTo $TypesPersonnels
 * @property \App\Model\Table\AffectationsRessourceTable|\Cake\ORM\Association\HasMany $AffectationsRessource
 * @property \App\Model\Table\AssurancesPersonnelTable|\Cake\ORM\Association\HasMany $AssurancesPersonnel
 * @property \App\Model\Table\AvertissementsTable|\Cake\ORM\Association\HasMany $Avertissements
 * @property \App\Model\Table\EquipesPersonnelTable|\Cake\ORM\Association\HasMany $EquipesPersonnel
 * @property \App\Model\Table\EtatsPersonnelTable|\Cake\ORM\Association\HasMany $EtatsPersonnel
 * @property \App\Model\Table\FormationsPersonnelTable|\Cake\ORM\Association\HasMany $FormationsPersonnel
 * @property \App\Model\Table\GerantsTable|\Cake\ORM\Association\HasMany $Gerants
 * @property \App\Model\Table\PaiesTable|\Cake\ORM\Association\HasMany $Paies
 * @property \App\Model\Table\PositionsAdministrativesTable|\Cake\ORM\Association\HasMany $PositionsAdministratives
 * @property \App\Model\Table\PositionsChantierTable|\Cake\ORM\Association\HasMany $PositionsChantier
 * @property \App\Model\Table\ResponsablesTable|\Cake\ORM\Association\HasMany $Responsables
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Personnel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Personnel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Personnel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Personnel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Personnel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Personnel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Personnel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PersonnelsTable extends Table
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

        $this->setTable('personnels');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Personnes', [
            'foreignKey' => 'personne_id'
        ]);
        $this->belongsTo('TypesPersonnels', [
            'foreignKey' => 'types_personnel_id'
        ]);
        $this->hasMany('AffectationsRessource', [
            'foreignKey' => 'personnel_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Avertissements', [
            'foreignKey' => 'personnel_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('EquipesPersonnel', [
            'foreignKey' => 'personnel_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('EtatsPersonnel', [
            'foreignKey' => 'personnel_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('FormationsPersonnel', [
            'foreignKey' => 'personnel_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Gerants', [
            'foreignKey' => 'personnel_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Salaires', [
            'foreignKey' => 'personnel_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Positions', [
            'foreignKey' => 'personnel_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Responsables', [
            'foreignKey' => 'personnel_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'personnel_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Gardiens', [
            'foreignKey' => 'personnel_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('AffectationsRessource', [
            'foreignKey' => 'personnel_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('ContratsPersonnels', [
            'foreignKey' => 'personnel_id',
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
        $rules->add($rules->existsIn(['personne_id'], 'Personnes'));
        $rules->add($rules->existsIn(['types_personnel_id'], 'TypesPersonnels'));

        return $rules;
    }
}
