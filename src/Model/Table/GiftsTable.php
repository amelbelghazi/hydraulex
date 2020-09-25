<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gifts Model
 *
 * @property \App\Model\Table\PersonnesTable|\Cake\ORM\Association\BelongsTo $Personnes
 * @property \App\Model\Table\TypesGiftsTable|\Cake\ORM\Association\BelongsTo $TypesGifts
 *
 * @method \App\Model\Entity\Gift get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gift newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gift[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gift|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gift patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gift[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gift findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GiftsTable extends Table
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

        $this->setTable('gifts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Personnes', [
            'foreignKey' => 'personne_id'
        ]);
        $this->belongsTo('TypesGifts', [
            'foreignKey' => 'types_gift_id'
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
            ->integer('qte')
            ->allowEmpty('qte');

        $validator
            ->numeric('montant')
            ->allowEmpty('montant');

        $validator
            ->date('datecadeau')
            ->allowEmpty('datecadeau');

        $validator
            ->scalar('observation')
            ->maxLength('observation', 250)
            ->allowEmpty('observation');

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
        $rules->add($rules->existsIn(['personne_id'], 'Personnes'));
        $rules->add($rules->existsIn(['types_gift_id'], 'TypesGifts'));

        return $rules;
    }
}
