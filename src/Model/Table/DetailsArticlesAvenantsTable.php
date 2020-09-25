<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetailsArticlesAvenants Model
 *
 * @property \App\Model\Table\ArticlesAvenantsTable|\Cake\ORM\Association\BelongsTo $ArticlesAvenants
 * @property \App\Model\Table\UnitesTable|\Cake\ORM\Association\BelongsTo $Unites
 * @property \App\Model\Table\SoustraitantsTable|\Cake\ORM\Association\BelongsTo $Soustraitants
 * @property \App\Model\Table\AttachementsTravauxAvenantsTable|\Cake\ORM\Association\HasMany $AttachementsTravauxAvenants
 *
 * @method \App\Model\Entity\DetailsArticlesAvenant get($primaryKey, $options = [])
 * @method \App\Model\Entity\DetailsArticlesAvenant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DetailsArticlesAvenant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetailsArticlesAvenant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DetailsArticlesAvenant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DetailsArticlesAvenant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetailsArticlesAvenant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DetailsArticlesAvenantsTable extends Table
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

        $this->setTable('details_articles_avenants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ArticlesAvenants', [
            'foreignKey' => 'articles_avenant_id'
        ]);
        $this->belongsTo('Unites', [
            'foreignKey' => 'unite_id'
        ]);
        $this->belongsTo('Soustraitants', [
            'foreignKey' => 'soustraitant_id'
        ]);
        $this->hasMany('AttachementsTravauxAvenants', [
            'foreignKey' => 'details_articles_avenant_id'
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
            ->date('datedetailsavenant')
            ->allowEmpty('datedetailsavenant');

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
        $rules->add($rules->existsIn(['articles_avenant_id'], 'ArticlesAvenants'));
        $rules->add($rules->existsIn(['unite_id'], 'Unites'));
        $rules->add($rules->existsIn(['soustraitant_id'], 'Soustraitants'));

        return $rules;
    }
}
