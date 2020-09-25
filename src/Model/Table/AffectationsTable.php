<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Affectations Model
 *
 * @property \App\Model\Table\RessourcesTable|\Cake\ORM\Association\BelongsTo $Ressources
 * @property \App\Model\Table\AffectationsAdministrationTable|\Cake\ORM\Association\HasMany $AffectationsAdministration
 * @property \App\Model\Table\AffectationsChantierTable|\Cake\ORM\Association\HasMany $AffectationsChantier
 *
 * @method \App\Model\Entity\Affectation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Affectation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Affectation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Affectation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Affectation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Affectation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Affectation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AffectationsTable extends Table
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

        $this->setTable('affectations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ressources', [
            'foreignKey' => 'ressource_id'
        ]);
        $this->hasMany('AffectationsAdministration', [
            'foreignKey' => 'affectation_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('AffectationsChantier', [
            'foreignKey' => 'affectation_id',
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
            ->date('dateaffectation')
            ->allowEmpty('dateaffectation');

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
        $rules->add($rules->existsIn(['ressource_id'], 'Ressources'));

        return $rules;
    }
}
