<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PartiesAvenants Model
 *
 * @property \App\Model\Table\LotsAvenantsTable|\Cake\ORM\Association\BelongsTo $LotsAvenants
 * @property \App\Model\Table\ArticlesAvenantsTable|\Cake\ORM\Association\HasMany $ArticlesAvenants
 *
 * @method \App\Model\Entity\PartiesAvenant get($primaryKey, $options = [])
 * @method \App\Model\Entity\PartiesAvenant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PartiesAvenant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PartiesAvenant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PartiesAvenant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PartiesAvenant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PartiesAvenant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PartiesAvenantsTable extends Table
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

        $this->setTable('parties_avenants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('LotsAvenants', [
            'foreignKey' => 'lots_avenant_id'
        ]);
        $this->hasMany('ArticlesAvenants', [
            'foreignKey' => 'parties_avenant_id',
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
            ->scalar('libelle')
            ->maxLength('libelle', 250)
            ->notEmpty('libelle');

        $validator
            ->integer('numero')
            ->notEmpty('numero');

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
        $rules->add($rules->existsIn(['lots_avenant_id'], 'LotsAvenants'));

        return $rules;
    }
}
