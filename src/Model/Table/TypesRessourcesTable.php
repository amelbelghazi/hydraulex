<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesRessources Model
 *
 * @property \App\Model\Table\RessourcesTable|\Cake\ORM\Association\HasMany $Ressources
 *
 * @method \App\Model\Entity\TypesRessource get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesRessource newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesRessource[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesRessource|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesRessource patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesRessource[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesRessource findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesRessourcesTable extends Table
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

        $this->setTable('types_ressources');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Ressources', [
            'foreignKey' => 'types_ressource_id'
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
