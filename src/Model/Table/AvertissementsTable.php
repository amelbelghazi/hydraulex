<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Avertissements Model
 *
 * @property \App\Model\Table\PersonnelsTable|\Cake\ORM\Association\BelongsTo $Personnels
 * @property \App\Model\Table\TypeAvertissementsTable|\Cake\ORM\Association\BelongsTo $TypeAvertissements
 * @property \App\Model\Table\PunitionsTable|\Cake\ORM\Association\HasMany $Punitions
 *
 * @method \App\Model\Entity\Avertissement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Avertissement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Avertissement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Avertissement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Avertissement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Avertissement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Avertissement findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AvertissementsTable extends Table
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

        $this->setTable('avertissements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Personnels', [
            'foreignKey' => 'personnel_id'
        ]);
        $this->belongsTo('TypeAvertissements', [
            'foreignKey' => 'type__avertissement_id'
        ]);
        $this->hasMany('Punitions', [
            'foreignKey' => 'avertissement_id'
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
            ->date('dateavertissement')
            ->allowEmpty('dateavertissement');

        $validator
            ->scalar('cause')
            ->maxLength('cause', 500)
            ->allowEmpty('cause');

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
        $rules->add($rules->existsIn(['personnel_id'], 'Personnels'));
        $rules->add($rules->existsIn(['type__avertissement_id'], 'TypeAvertissements'));

        return $rules;
    }
}
