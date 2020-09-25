<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CategoriesAffaires Model
 *
 * @property \App\Model\Table\AffairesTable|\Cake\ORM\Association\HasMany $Affaires
 *
 * @method \App\Model\Entity\CategoriesAffaire get($primaryKey, $options = [])
 * @method \App\Model\Entity\CategoriesAffaire newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CategoriesAffaire[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CategoriesAffaire|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CategoriesAffaire patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CategoriesAffaire[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CategoriesAffaire findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CategoriesAffairesTable extends Table
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

        $this->setTable('categories_affaires');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Affaires', [
            'foreignKey' => 'categories_affaire_id'
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
            ->maxLength('libelle', 100)
            ->allowEmpty('libelle');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
