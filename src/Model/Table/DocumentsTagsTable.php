<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DocumentsTags Model 
 *
 * @property \App\Model\Table\DocumentsTable|\Cake\ORM\Association\BelongsTo $Documents
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\DocumentsTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\DocumentsTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DocumentsTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DocumentsTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentsTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentsTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentsTag findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DocumentsTagsTable extends Table
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

        $this->setTable('documents_tags');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Documents', [
            'foreignKey' => 'document_id'
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id'
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
        $rules->add($rules->existsIn(['document_id'], 'Documents'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));

        return $rules;
    }
}
