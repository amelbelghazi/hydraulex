<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArticlesAvenants Model
 *
 * @property \App\Model\Table\PartiesAvenantsTable|\Cake\ORM\Association\BelongsTo $PartiesAvenants
 * @property \App\Model\Table\DetailsArticlesAvenantsTable|\Cake\ORM\Association\HasMany $DetailsArticlesAvenants
 *
 * @method \App\Model\Entity\ArticlesAvenant get($primaryKey, $options = [])
 * @method \App\Model\Entity\ArticlesAvenant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ArticlesAvenant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ArticlesAvenant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArticlesAvenant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ArticlesAvenant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ArticlesAvenant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArticlesAvenantsTable extends Table
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

        $this->setTable('articles_avenants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PartiesAvenants', [
            'foreignKey' => 'parties_avenant_id'
        ]);
        $this->hasMany('DetailsArticlesAvenants', [
            'foreignKey' => 'articles_avenant_id',
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
            ->scalar('libelle')
            ->maxLength('libelle', 250)
            ->notEmpty('libelle');

        $validator
            ->integer('numero')
            ->notEmpty('numero');

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
        $rules->add($rules->existsIn(['parties_avenant_id'], 'PartiesAvenants'));

        return $rules;
    }
}
