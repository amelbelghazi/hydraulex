<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chantiers Model
 *
 * @property \App\Model\Table\MarchesTable|\Cake\ORM\Association\BelongsTo $Marches
 * @property \App\Model\Table\WilayasTable|\Cake\ORM\Association\BelongsTo $Wilayas
 * @property \App\Model\Table\EtatsChantiersTable|\Cake\ORM\Association\BelongsTo $EtatsChantiers
 * @property \App\Model\Table\ResponsablesTable|\Cake\ORM\Association\BelongsTo $Responsables
 * @property \App\Model\Table\FraisChantiersTable|\Cake\ORM\Association\HasMany $FraisChantiers
 * @property \App\Model\Table\PositionsChantierTable|\Cake\ORM\Association\HasMany $PositionsChantier
 * @property \App\Model\Table\EtatsTable|\Cake\ORM\Association\BelongsToMany $Etats
 *
 * @method \App\Model\Entity\Chantier get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chantier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Chantier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chantier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chantier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chantier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chantier findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChantiersTable extends Table
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

        $this->setTable('chantiers');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Marches', [
            'foreignKey' => 'marche_id'
        ]);
        $this->belongsTo('Wilayas', [
            'foreignKey' => 'wilaya_id'
        ]);
        $this->hasMany('EtatsChantiers', [
            'foreignKey' => 'chantier_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Responsables', [
            'foreignKey' => 'chantier_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('FraisChantiers', [
            'foreignKey' => 'chantier_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('PositionsChantiers', [
            'foreignKey' => 'chantier_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('AffectationsRessource', [
            'foreignKey' => 'chantier_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('OdssChantiers', [
            'foreignKey' => 'chantier_id',
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
            ->scalar('adresse')
            ->maxLength('adresse', 250)
            ->allowEmpty('adresse');

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
        $rules->add($rules->existsIn(['marche_id'], 'Marches'));
        $rules->add($rules->existsIn(['wilaya_id'], 'Wilayas'));
        $rules->add($rules->existsIn(['etats_chantier_id'], 'EtatsChantiers'));
        $rules->add($rules->existsIn(['responsable_id'], 'Responsables'));

        return $rules;
    }
}
