<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AchatsDetails Model
 *
 * @property \App\Model\Table\AchatsTable|\Cake\ORM\Association\BelongsTo $Achats
 * @property \App\Model\Table\StocksTable|\Cake\ORM\Association\BelongsTo $Stocks
 *
 * @method \App\Model\Entity\AchatsDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\AchatsDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AchatsDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AchatsDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AchatsDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AchatsDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AchatsDetail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AchatsDetailsTable extends Table
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

        $this->setTable('achats_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Achats', [
            'foreignKey' => 'achat_id'
        ]);
        $this->hasMany('Stocks', [
            'foreignKey' => 'achats_detail_id',
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
            ->scalar('nom')
            ->maxLength('nom', 250)
            ->allowEmpty('nom');

        $validator
            ->scalar('code')
            ->maxLength('code', 50)
            ->allowEmpty('code');

        $validator
            ->date('datedebutservice')
            ->allowEmpty('datedebutservice');

        $validator
            ->date('datedebutcirculation')
            ->allowEmpty('datedebutcirculation');

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
