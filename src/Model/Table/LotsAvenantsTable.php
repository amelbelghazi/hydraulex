<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LotsAvenants Model
 *
 * @property \App\Model\Table\AvenantsTable|\Cake\ORM\Association\BelongsTo $Avenants
 * @property \App\Model\Table\PartiesAvenantsTable|\Cake\ORM\Association\HasMany $PartiesAvenants
 *
 * @method \App\Model\Entity\LotsAvenant get($primaryKey, $options = [])
 * @method \App\Model\Entity\LotsAvenant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LotsAvenant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LotsAvenant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LotsAvenant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LotsAvenant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LotsAvenant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LotsAvenantsTable extends Table
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

        $this->setTable('lots_avenants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Avenants', [
            'foreignKey' => 'avenant_id'
        ]);
        $this->hasMany('PartiesAvenants', [
            'foreignKey' => 'lots_avenant_id',
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
            ->scalar('intitule')
            ->maxLength('intitule', 250)
            ->allowEmpty('intitule');

        $validator
            ->integer('numero')
            ->allowEmpty('numero');

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
        $rules->add($rules->existsIn(['avenant_id'], 'Avenants'));

        return $rules;
    }
}
