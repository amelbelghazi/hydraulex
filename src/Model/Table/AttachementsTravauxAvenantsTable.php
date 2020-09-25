<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttachementsTravauxAvenants Model
 *
 * @property \App\Model\Table\DetailsArticlesAvenantsTable|\Cake\ORM\Association\BelongsTo $DetailsArticlesAvenants
 *
 * @method \App\Model\Entity\AttachementsTravauxAvenant get($primaryKey, $options = [])
 * @method \App\Model\Entity\AttachementsTravauxAvenant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AttachementsTravauxAvenant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AttachementsTravauxAvenant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttachementsTravauxAvenant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AttachementsTravauxAvenant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AttachementsTravauxAvenant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AttachementsTravauxAvenantsTable extends Table
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

        $this->setTable('attachements_travaux_avenants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('DetailsArticlesAvenants', [
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
            ->date('dateattachementavenant')
            ->allowEmpty('dateattachementavenant');

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
        $rules->add($rules->existsIn(['details_articles_avenant_id'], 'DetailsArticlesAvenants'));

        return $rules;
    }
}
