<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EtatsChantiers Model
 *
 * @property \App\Model\Table\TypesEtatsChantiersTable|\Cake\ORM\Association\BelongsTo $TypesEtatsChantiers
 *
 * @method \App\Model\Entity\EtatsChantier get($primaryKey, $options = [])
 * @method \App\Model\Entity\EtatsChantier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EtatsChantier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EtatsChantier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EtatsChantier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EtatsChantier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EtatsChantier findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EtatsChantiersTable extends Table
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

        $this->setTable('etats_chantiers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Chantiers', [
            'foreignKey' => 'etats_chantier_id'
        ]);

        $this->belongsTo('TypesEtatsChantiers', [
            'foreignKey' => 'types_etats_chantier_id'
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
        $rules->add($rules->existsIn(['types_etats_chantier_id'], 'TypesEtatsChantiers'));

        return $rules;
    }
}
