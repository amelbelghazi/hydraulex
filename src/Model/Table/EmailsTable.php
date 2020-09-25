<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Emails Model
 *
 * @property \App\Model\Table\AttachementsTable|\Cake\ORM\Association\HasMany $Attachements
 *
 * @method \App\Model\Entity\Email get($primaryKey, $options = [])
 * @method \App\Model\Entity\Email newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Email[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Email|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Email patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Email[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Email findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmailsTable extends Table
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

        $this->setTable('emails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Attachements', [
            'foreignKey' => 'email_id'
        ]);

        $this->belongsTo('Documents', [
            'foreignKey' => 'document_id'
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
            ->email('destinataire')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->email('expediteur')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('objet')
            ->maxLength('objet', 250)
            ->allowEmpty('objet');

        $validator
            ->scalar('message')
            ->maxLength('message', 750)
            ->allowEmpty('message');

        $validator
            ->scalar('etat')
            ->maxLength('etat', 10)
            ->allowEmpty('etat');

        $validator
            ->date('dateenvoi')
            ->allowEmpty('dateenvoi');

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

        return $rules;
    }
}
