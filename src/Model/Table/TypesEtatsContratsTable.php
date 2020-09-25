<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesEtatsContrats Model
 *
 * @property \App\Model\Table\EtatsContratsTable|\Cake\ORM\Association\HasMany $EtatsContrats
 *
 * @method \App\Model\Entity\TypesEtatsContrat get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesEtatsContrat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesEtatsContrat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesEtatsContrat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesEtatsContrat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesEtatsContrat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesEtatsContrat findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesEtatsContratsTable extends Table
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

        $this->setTable('types_etats_contrats');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('EtatsContrats', [
            'foreignKey' => 'types_etats_contrat_id'
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
            ->scalar('libelle')
            ->maxLength('libelle', 255)
            ->allowEmpty('libelle');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
