<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EntretiensRessources Model
 *
 * @property \App\Model\Table\RessourcesTable|\Cake\ORM\Association\BelongsTo $Ressources
 * @property \App\Model\Table\EntretiensTable|\Cake\ORM\Association\BelongsTo $Entretiens
 * @property \App\Model\Table\EntretiensRessourcesPeriodiquesTable|\Cake\ORM\Association\HasMany $EntretiensRessourcesPeriodiques
 *
 * @method \App\Model\Entity\EntretiensRessource get($primaryKey, $options = [])
 * @method \App\Model\Entity\EntretiensRessource newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EntretiensRessource[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EntretiensRessource|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EntretiensRessource patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EntretiensRessource[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EntretiensRessource findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EntretiensRessourcesTable extends Table
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

        $this->setTable('entretiens_ressources');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ressources', [
            'foreignKey' => 'ressource_id'
        ]);
        $this->belongsTo('Entretiens', [
            'foreignKey' => 'entretien_id'
        ]);
        $this->hasMany('EntretiensRessourcesPeriodiques', [
            'foreignKey' => 'entretiens_ressource_id'
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

        $validator
            ->date('datedebut')
            ->allowEmpty('datedebut');

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
        $rules->add($rules->existsIn(['entretien_id'], 'Entretiens'));

        return $rules;
    }
}
