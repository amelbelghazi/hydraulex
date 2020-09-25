<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MaitresOeuvres Model
 *
 * @method \App\Model\Entity\MaitresOeuvre get($primaryKey, $options = [])
 * @method \App\Model\Entity\MaitresOeuvre newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MaitresOeuvre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MaitresOeuvre|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MaitresOeuvre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MaitresOeuvre[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MaitresOeuvre findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MaitresOeuvresTable extends Table
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

        $this->setTable('maitres_oeuvres');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->maxLength('nom', 100)
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->scalar('adresse')
            ->maxLength('adresse', 300)
            ->allowEmpty('adresse');

        $validator
            ->scalar('numeroFixe')
            ->maxLength('numeroFixe', 9)
            ->allowEmpty('numeroFixe');

        $validator
            ->scalar('numeroPortable')
            ->maxLength('numeroPortable', 10)
            ->allowEmpty('numeroPortable');

        $validator
            ->scalar('fax')
            ->maxLength('fax', 9)
            ->allowEmpty('fax');

        $validator
            ->scalar('nif')
            ->maxLength('nif', 20)
            ->allowEmpty('nif');

        $validator
            ->scalar('nis')
            ->maxLength('nis', 20)
            ->allowEmpty('nis');

        $validator
            ->scalar('nrcf')
            ->maxLength('nrcf', 20)
            ->allowEmpty('nrcf');

        $validator
            ->scalar('article')
            ->maxLength('article', 50)
            ->allowEmpty('article');

        $validator
            ->scalar('compte')
            ->maxLength('compte', 20)
            ->allowEmpty('compte');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('agence')
            ->maxLength('agence', 100)
            ->allowEmpty('agence');

        $validator
            ->integer('create_by')
            ->allowEmpty('create_by');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
