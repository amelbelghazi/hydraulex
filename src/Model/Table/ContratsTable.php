<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contrats Model
 *
 * @property \App\Model\Table\EtatsContratsTable|\Cake\ORM\Association\BelongsTo $EtatsContrats
 * @property \App\Model\Table\ContratsSoustraitantTable|\Cake\ORM\Association\HasMany $ContratsSoustraitant
 * @property \App\Model\Table\PersonnelsTable|\Cake\ORM\Association\BelongsToMany $Personnels
 * @property \App\Model\Table\EtatsTable|\Cake\ORM\Association\BelongsToMany $Etats
 *
 * @method \App\Model\Entity\Contrat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contrat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contrat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contrat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contrat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contrat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contrat findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContratsTable extends Table
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

        $this->setTable('contrats');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('EtatsContrats', [
            'foreignKey' => 'etats_contrat_id'
        ]);        
        $this->belongsTo('Documents', [
            'foreignKey' => 'document_id',
        ]);
        $this->hasMany('ContratsSoustraitant', [
            'foreignKey' => 'contrat_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('ContratsPersonnels', [
            'foreignKey' => 'contrat_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('EtatsContrats', [
            'foreignKey' => 'contrat_id',
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
            ->integer('numero')
            ->allowEmpty('numero');

        $validator
            ->date('dateetablissement')
            ->allowEmpty('dateetablissement');

        $validator
            ->integer('durée')
            ->allowEmpty('durée');

        $validator
            ->scalar('type')
            ->maxLength('type', 3)
            ->allowEmpty('type');

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
        $rules->add($rules->existsIn(['etats_contrat_id'], 'EtatsContrats'));
        $rules->add($rules->existsIn(['document_id'], 'Documents'));

        return $rules;
    }
}
