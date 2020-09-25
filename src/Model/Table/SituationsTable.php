<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Situations Model
 *
 * @property \App\Model\Table\AttachementsTravailsTable|\Cake\ORM\Association\BelongsTo $AttachementsTravails
 * @property \App\Model\Table\RemboursementsAvanceTable|\Cake\ORM\Association\HasMany $RemboursementsAvance
 * @property \App\Model\Table\SituationsDetailsTable|\Cake\ORM\Association\HasMany $SituationsDetails
 *
 * @method \App\Model\Entity\Situation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Situation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Situation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Situation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Situation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Situation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Situation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SituationsTable extends Table
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

        $this->setTable('situations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('AttachementsTravaux', [
            'foreignKey' => 'Attachements_Travail_id'
        ]);
        $this->hasMany('RemboursementsAvance', [
            'foreignKey' => 'situation_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('SituationsDetails', [
            'foreignKey' => 'situation_id',
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
            ->date('datesituation')
            ->allowEmpty('datesituation');

        $validator
            ->numeric('total')
            ->allowEmpty('total');

        $validator
            ->scalar('observation')
            ->maxLength('observation', 255)
            ->allowEmpty('observation');

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
        $rules->add($rules->existsIn(['Attachements_Travail_id'], 'AttachementsTravaux'));

        return $rules;
    }
}
