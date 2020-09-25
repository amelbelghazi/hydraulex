<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Entretiens Model
 *
 * @property \App\Model\Table\PeriodesTable|\Cake\ORM\Association\BelongsTo $Periodes
 * @property \App\Model\Table\RessourcesTable|\Cake\ORM\Association\BelongsToMany $Ressources
 *
 * @method \App\Model\Entity\Entretien get($primaryKey, $options = [])
 * @method \App\Model\Entity\Entretien newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Entretien[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Entretien|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Entretien patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Entretien[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Entretien findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EntretiensTable extends Table
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

        $this->setTable('entretiens');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Periodes', [
            'foreignKey' => 'periode_id'
        ]);
        $this->belongsToMany('Ressources', [
            'foreignKey' => 'entretien_id',
            'targetForeignKey' => 'ressource_id',
            'joinTable' => 'entretiens_ressources'
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
            ->scalar('libelle')
            ->maxLength('libelle', 255)
            ->allowEmpty('libelle');

        $validator
            ->numeric('cout')
            ->allowEmpty('cout');

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
        $rules->add($rules->existsIn(['periode_id'], 'Periodes'));

        return $rules;
    }
}
