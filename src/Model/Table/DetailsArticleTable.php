<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetailsArticle Model
 *
 * @property \App\Model\Table\ArticlesTable|\Cake\ORM\Association\BelongsTo $Articles
 * @property \App\Model\Table\UnitesTable|\Cake\ORM\Association\BelongsTo $Unites
 * @property \App\Model\Table\SoustraitantsTable|\Cake\ORM\Association\BelongsTo $Soustraitants
 *
 * @method \App\Model\Entity\DetailsArticle get($primaryKey, $options = [])
 * @method \App\Model\Entity\DetailsArticle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DetailsArticle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetailsArticle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DetailsArticle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DetailsArticle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetailsArticle findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DetailsArticleTable extends Table
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

        $this->setTable('details_article');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Articles', [
            'foreignKey' => 'article_id'
        ]);
        $this->hasMany('DetailsAttachements', [
            'foreignKey' => 'details_article_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->belongsTo('Unites', [
            'foreignKey' => 'unite_id'
        ]);
        $this->belongsTo('Soustraitants', [
            'foreignKey' => 'soustraitant_id'
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
            ->numeric('prix')
            ->allowEmpty('prix');

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
        $rules->add($rules->existsIn(['article_id'], 'Articles'));
        $rules->add($rules->existsIn(['unite_id'], 'Unites'));
        $rules->add($rules->existsIn(['soustraitant_id'], 'Soustraitants'));

        return $rules;
    }
}
