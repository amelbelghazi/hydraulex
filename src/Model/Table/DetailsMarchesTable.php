<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetailsMarches Model
 *
 * @property \App\Model\Table\MarchesTable|\Cake\ORM\Association\BelongsTo $Marches
 * @property \App\Model\Table\AvenantsTable|\Cake\ORM\Association\BelongsTo $Avenants
 *
 * @method \App\Model\Entity\Detailsmarche get($primaryKey, $options = [])
 * @method \App\Model\Entity\Detailsmarche newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Detailsmarche[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Detailsmarche|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Detailsmarche patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Detailsmarche[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Detailsmarche findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DetailsMarchesTable extends Table
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

        $this->setTable('details_marches');
        $this->setDisplayField('intitule');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Marches', [
            'foreignKey' => 'marche_id'
        ]);
        $this->belongsTo('Avenants', [
            'foreignKey' => 'avenant_id'
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
            ->date('datedetails')
            ->allowEmpty('datedetails');

        $validator
            ->scalar('intitule')
            ->maxLength('intitule', 255)
            ->allowEmpty('intitule');

        $validator
            ->numeric('montant')
            ->allowEmpty('montant');

        $$validator
            ->numeric('delai')
            ->maxLength('delai', 5)
            ->allowEmpty('delai');

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
        $rules->add($rules->existsIn(['marche_id'], 'Marches'));
        $rules->add($rules->existsIn(['avenant_id'], 'Avenants'));

        return $rules;
    }
}
