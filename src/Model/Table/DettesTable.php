<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dettes Model
 *
 * @property \App\Model\Table\AchatsTable|\Cake\ORM\Association\BelongsTo $Achats
 * @property \App\Model\Table\VersementsTable|\Cake\ORM\Association\HasMany $Versements
 *
 * @method \App\Model\Entity\Dette get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dette newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dette[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dette|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dette patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dette[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dette findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DettesTable extends Table
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

        $this->setTable('dettes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Achats', [
            'foreignKey' => 'achat_id'
        ]);
        $this->hasMany('Versements', [
            'foreignKey' => 'dette_id',
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
            ->date('datedette')
            ->allowEmpty('datedette');

        $validator
            ->scalar('etat')
            ->maxLength('etat', 3)
            ->allowEmpty('etat');

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
        $rules->add($rules->existsIn(['achat_id'], 'Achats'));

        return $rules;
    }
}
