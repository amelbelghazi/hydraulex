<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Punitions Model
 *
 * @property \App\Model\Table\AvertissementsTable|\Cake\ORM\Association\BelongsTo $Avertissements
 * @property \App\Model\Table\TypePunitionsTable|\Cake\ORM\Association\BelongsTo $TypePunitions
 *
 * @method \App\Model\Entity\Punition get($primaryKey, $options = [])
 * @method \App\Model\Entity\Punition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Punition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Punition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Punition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Punition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Punition findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PunitionsTable extends Table
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

        $this->setTable('punitions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Avertissements', [
            'foreignKey' => 'avertissement_id'
        ]);
        $this->belongsTo('TypePunitions', [
            'foreignKey' => 'type_punition_id'
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
        $rules->add($rules->existsIn(['avertissement_id'], 'Avertissements'));
        $rules->add($rules->existsIn(['type_punition_id'], 'TypePunitions'));

        return $rules;
    }
}
