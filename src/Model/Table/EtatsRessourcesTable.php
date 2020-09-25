<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EtatsRessources Model
 *
 * @property \App\Model\Table\RessourcesTable|\Cake\ORM\Association\BelongsTo $Ressources
 * @property \App\Model\Table\TypesEtatsRessourcesTable|\Cake\ORM\Association\BelongsTo $TypesEtatsRessources
 *
 * @method \App\Model\Entity\EtatsRessource get($primaryKey, $options = [])
 * @method \App\Model\Entity\EtatsRessource newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EtatsRessource[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EtatsRessource|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EtatsRessource patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EtatsRessource[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EtatsRessource findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EtatsRessourcesTable extends Table
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

        $this->setTable('etats_ressources');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ressources', [
            'foreignKey' => 'ressource_id'
        ]);
        $this->belongsTo('TypesEtatsRessource', [
            'foreignKey' => 'types_etats_ressource_id'
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
            ->scalar('cause')
            ->maxLength('cause', 250)
            ->allowEmpty('cause');

        $validator
            ->date('dateetat')
            ->allowEmpty('dateetat');

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
        $rules->add($rules->existsIn(['types_etats_ressource_id'], 'TypesEtatsRessource'));

        return $rules;
    }
}
