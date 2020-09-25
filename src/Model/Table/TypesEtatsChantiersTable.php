<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesEtatsChantiers Model
 *
 * @property \App\Model\Table\EtatsChantiersTable|\Cake\ORM\Association\HasMany $EtatsChantiers
 *
 * @method \App\Model\Entity\TypesEtatsChantier get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesEtatsChantier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesEtatsChantier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesEtatsChantier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesEtatsChantier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesEtatsChantier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesEtatsChantier findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesEtatsChantiersTable extends Table
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

        $this->setTable('types_etats_chantiers');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('EtatsChantiers', [
            'foreignKey' => 'types_etats_chantier_id'
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
            ->maxLength('libelle', 250)
            ->allowEmpty('libelle');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
