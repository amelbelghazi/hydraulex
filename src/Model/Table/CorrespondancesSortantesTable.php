<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CorrespondancesSortantes Model
 *
 * @property \App\Model\Table\DestinatairesTable|\Cake\ORM\Association\BelongsTo $Destinataires
 *
 * @method \App\Model\Entity\CorrespondancesSortante get($primaryKey, $options = [])
 * @method \App\Model\Entity\CorrespondancesSortante newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CorrespondancesSortante[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CorrespondancesSortante|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CorrespondancesSortante patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CorrespondancesSortante[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CorrespondancesSortante findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CorrespondancesSortantesTable extends Table
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

        $this->setTable('correspondances_sortantes');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Destinataires', [
            'foreignKey' => 'destinataire_id'
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
            ->date('datecorrespondance')
            ->allowEmpty('datecorrespondance');

        $validator
            ->integer('nombredocuments')
            ->allowEmpty('nombredocuments');

        $validator
            ->scalar('objet')
            ->maxLength('objet', 250)
            ->allowEmpty('objet');

        $validator
            ->scalar('observation')
            ->maxLength('observation', 500)
            ->allowEmpty('observation');

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
        $rules->add($rules->existsIn(['destinataire_id'], 'Destinataires'));

        return $rules;
    }
}
