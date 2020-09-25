<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parcs Model
 *
 * @property \App\Model\Table\WilayasTable|\Cake\ORM\Association\BelongsTo $Wilayas
 * @property \App\Model\Table\ResponsablesTable|\Cake\ORM\Association\BelongsTo $Responsables
 * @property \App\Model\Table\GardiensTable|\Cake\ORM\Association\BelongsTo $Gardiens
 * @property \App\Model\Table\RessourcesTable|\Cake\ORM\Association\HasMany $Ressources
 *
 * @method \App\Model\Entity\Parc get($primaryKey, $options = [])
 * @method \App\Model\Entity\Parc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Parc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Parc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Parc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Parc findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ParcsTable extends Table
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

        $this->setTable('parcs');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Wilayas', [
            'foreignKey' => 'wilaya_id'
        ]);
        $this->hasMany('ResponsablesParcs', [
            'foreignKey' => 'parc_id'
        ]);
        $this->hasMany('GardiensParcs', [
            'foreignKey' => 'parc_id'
        ]);
        $this->hasMany('ParcsRessources', [
            'foreignKey' => 'parc_id',
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
            ->maxLength('libelle', 255)
            ->notEmpty('libelle');

        $validator
            ->scalar('adresse')
            ->maxLength('adresse', 500)
            ->notEmpty('adresse');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        $validator
            ->integer('delai')
            ->notEmpty('modified_by');

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
        $rules->add($rules->existsIn(['wilaya_id'], 'Wilayas'));

        return $rules;
    }
}
