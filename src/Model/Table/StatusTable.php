<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Status Model
 *
 * @property \App\Model\Table\TasksTable|\Cake\ORM\Association\BelongsTo $Tasks
 * @property \App\Model\Table\TypesStatusTable|\Cake\ORM\Association\BelongsTo $TypesStatus
 *
 * @method \App\Model\Entity\Status get($primaryKey, $options = [])
 * @method \App\Model\Entity\Status newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Status[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Status|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Status patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Status[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Status findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StatusTable extends Table
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

        $this->setTable('status');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Tasks', [
            'foreignKey' => 'task_id'
        ]);
        $this->belongsTo('TypesStatus', [
            'foreignKey' => 'types_statu_id'
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
        $rules->add($rules->existsIn(['task_id'], 'Tasks'));
        $rules->add($rules->existsIn(['types_statu_id'], 'TypesStatus'));
        

        return $rules;
    }
}
