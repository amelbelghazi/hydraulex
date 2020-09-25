<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CorrespondancesEntrantes Model
 *
 * @property \App\Model\Table\ExpediteursTable|\Cake\ORM\Association\BelongsTo $Expediteurs
 *
 * @method \App\Model\Entity\CorrespondancesEntrante get($primaryKey, $options = [])
 * @method \App\Model\Entity\CorrespondancesEntrante newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CorrespondancesEntrante[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CorrespondancesEntrante|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CorrespondancesEntrante patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CorrespondancesEntrante[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CorrespondancesEntrante findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CorrespondancesEntrantesTable extends Table
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

        $this->setTable('correspondances_entrantes');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Expediteurs', [
            'foreignKey' => 'expediteur_id'
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
            ->date('dateenvoi')
            ->allowEmpty('dateenvoi');

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
        $rules->add($rules->existsIn(['expediteur_id'], 'Expediteurs'));

        return $rules;
    }
}
