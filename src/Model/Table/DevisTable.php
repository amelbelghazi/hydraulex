<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Devis Model
 *
 * @property \App\Model\Table\MarchesTable|\Cake\ORM\Association\BelongsTo $Marches
 *
 * @method \App\Model\Entity\Devi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Devi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Devi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Devi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Devi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Devi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Devi findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DevisTable extends Table
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

        $this->setTable('devis');
        $this->setDisplayField('intitule');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Marches', [
            'foreignKey' => 'marche_id'
        ]);

        $this->belongsTo('Avenants', [
            'foreignKey' => 'avenant_id'
        ]); 
        $this->belongsTo('Documents', [
            'foreignKey' => 'document_id'
        ]);

        $this->hasMany('Lots', [
            'foreignKey' => 'devi_id',
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
        $rules->add($rules->existsIn(['marche_id'], 'Marches'));
        $rules->add($rules->existsIn(['avenant_id'], 'Avenants'));
        $rules->add($rules->existsIn(['document_id'], 'Documents'));

        return $rules;
    }
}
