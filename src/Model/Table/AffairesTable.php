<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Affaires Model
 *
 * @property \App\Model\Table\CategoriesAffairesTable|\Cake\ORM\Association\BelongsTo $CategoriesAffaires
 * @property \App\Model\Table\MaitresOuvragesTable|\Cake\ORM\Association\BelongsTo $MaitresOuvrages
 * @property \App\Model\Table\WilayasTable|\Cake\ORM\Association\BelongsTo $Wilayas
 * @property \App\Model\Table\CommissionsTable|\Cake\ORM\Association\HasMany $Commissions
 * @property \App\Model\Table\FraisProjetTable|\Cake\ORM\Association\HasMany $FraisProjet
 * @property \App\Model\Table\MarchesTable|\Cake\ORM\Association\HasMany $Marches
 * @property \App\Model\Table\SoumissionsTable|\Cake\ORM\Association\HasMany $Soumissions
 *
 * @method \App\Model\Entity\Affaire get($primaryKey, $options = [])
 * @method \App\Model\Entity\Affaire newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Affaire[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Affaire|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Affaire patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Affaire[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Affaire findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AffairesTable extends Table
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

        $this->setTable('affaires');
        $this->setDisplayField('intitule');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CategoriesAffaires', [
            'foreignKey' => 'categories_affaire_id'
        ]);
        $this->belongsTo('MaitresOuvrages', [
            'foreignKey' => 'maitres_ouvrage_id'
        ]);
        $this->belongsTo('Wilayas', [
            'foreignKey' => 'wilaya_id'
        ]);
        $this->belongsTo('TypesAffaires', [
            'foreignKey' => 'types_affaire_id'
        ]);
        $this->hasMany('Commissions', [
            'foreignKey' => 'affaire_id'
        ]);
        $this->hasMany('FraisProjets', [
            'foreignKey' => 'affaire_id'
        ]);
        $this->hasMany('Marches', [
            'foreignKey' => 'affaire_id'
        ]);
        $this->hasMany('Soumissions', [
            'foreignKey' => 'affaire_id'
        ]);
        $this->hasMany('EtatsAffaires', [
            'foreignKey' => 'affaire_id'
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
            ->scalar('intitule')
            ->maxLength('intitule', 250)
            ->requirePresence('intitule', 'create')
            ->notEmpty('intitule');

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
        $rules->add($rules->existsIn(['categories_affaire_id'], 'CategoriesAffaires'));
        $rules->add($rules->existsIn(['maitres_ouvrage_id'], 'MaitresOuvrages'));
        $rules->add($rules->existsIn(['types_affaire_id'], 'TypesAffaires'));
        $rules->add($rules->existsIn(['wilaya_id'], 'Wilayas'));

        return $rules;
    }
}
