<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ModesReglements Model
 *
 * @property \App\Model\Table\AchatsTable|\Cake\ORM\Association\HasMany $Achats
 *
 * @method \App\Model\Entity\ModesReglement get($primaryKey, $options = [])
 * @method \App\Model\Entity\ModesReglement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ModesReglement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ModesReglement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ModesReglement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ModesReglement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ModesReglement findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ModesReglementsTable extends Table
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

        $this->setTable('modes_reglements');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Achats', [
            'foreignKey' => 'modes_reglement_id'
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
            ->maxLength('libelle', 20)
            ->allowEmpty('libelle');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
