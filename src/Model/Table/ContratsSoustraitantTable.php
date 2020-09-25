<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContratsSoustraitant Model
 *
 * @property \App\Model\Table\ContratsTable|\Cake\ORM\Association\BelongsTo $Contrats
 * @property \App\Model\Table\ProjetSoustraitantsTable|\Cake\ORM\Association\BelongsTo $ProjetSoustraitants
 *
 * @method \App\Model\Entity\ContratsSoustraitant get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContratsSoustraitant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContratsSoustraitant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContratsSoustraitant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContratsSoustraitant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContratsSoustraitant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContratsSoustraitant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContratsSoustraitantTable extends Table
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

        $this->setTable('contrats_soustraitant');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Contrats', [
            'foreignKey' => 'contrat_id'
        ]);
        $this->belongsTo('ProjetSoustraitants', [
            'foreignKey' => 'projet_soustraitant_id'
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
            ->scalar('objet')
            ->maxLength('objet', 250)
            ->allowEmpty('objet');

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
        $rules->add($rules->existsIn(['contrat_id'], 'Contrats'));
        $rules->add($rules->existsIn(['projet_soustraitant_id'], 'ProjetSoustraitants'));

        return $rules;
    }
}
