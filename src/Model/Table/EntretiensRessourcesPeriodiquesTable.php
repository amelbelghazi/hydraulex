<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EntretiensRessourcesPeriodiques Model
 *
 * @property \App\Model\Table\EntretiensRessourcesTable|\Cake\ORM\Association\BelongsTo $EntretiensRessources
 * @property \App\Model\Table\GaragesTable|\Cake\ORM\Association\BelongsTo $Garages
 *
 * @method \App\Model\Entity\EntretiensRessourcesPeriodique get($primaryKey, $options = [])
 * @method \App\Model\Entity\EntretiensRessourcesPeriodique newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EntretiensRessourcesPeriodique[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EntretiensRessourcesPeriodique|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EntretiensRessourcesPeriodique patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EntretiensRessourcesPeriodique[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EntretiensRessourcesPeriodique findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EntretiensRessourcesPeriodiquesTable extends Table
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

        $this->setTable('entretiens_ressources_periodiques');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('EntretiensRessources', [
            'foreignKey' => 'entretiens_ressource_id'
        ]);
        $this->belongsTo('Garages', [
            'foreignKey' => 'garage_id'
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
            ->date('dateentretien')
            ->allowEmpty('dateentretien');

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
        $rules->add($rules->existsIn(['entretiens_ressource_id'], 'EntretiensRessources'));
        $rules->add($rules->existsIn(['garage_id'], 'Garages'));

        return $rules;
    }
}
