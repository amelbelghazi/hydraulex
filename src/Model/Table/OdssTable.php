<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Odss Model
 * 
 * @property \App\Model\Table\TypesOdssTable|\Cake\ORM\Association\BelongsTo $TypesODSs
 * @property \App\Model\Table\MarchesTable|\Cake\ORM\Association\BelongsTo $Marches
 *
 * @method \App\Model\Entity\Ods get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ods newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ods[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ods|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ods patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ods[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ods findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OdssTable extends Table
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

        $this->setTable('odss');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TypesODSs', [
            'foreignKey' => 'types_ODS_id'
        ]);
        $this->belongsTo('Marches', [
            'foreignKey' => 'marche_id'
        ]);
        $this->belongsTo('Documents', [
            'foreignKey' => 'document_id'
        ]);
        $this->hasOne('EtatsMarches', [
            'foreignKey' => 'ODS_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('OdssChantiers', [
            'foreignKey' => 'ODS_id',
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
            ->date('dateODS')
            ->notEmpty('dateODS');

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
        $rules->add($rules->existsIn(['types_ODS_id'], 'TypesODSs'));
        $rules->add($rules->existsIn(['marche_id'], 'Marches'));
        $rules->add($rules->existsIn(['document_id'], 'Documents'));

        return $rules;
    }
}
