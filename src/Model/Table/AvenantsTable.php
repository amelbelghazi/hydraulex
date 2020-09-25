<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Avenants Model
 *
 * @property \App\Model\Table\MarchesTable|\Cake\ORM\Association\BelongsTo $Marches
 * @property \App\Model\Table\DetailsMarcheTable|\Cake\ORM\Association\HasMany $DetailsMarche
 * @property \App\Model\Table\LotsAvenantTable|\Cake\ORM\Association\HasMany $LotsAvenant
 *
 * @method \App\Model\Entity\Avenant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Avenant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Avenant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Avenant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Avenant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Avenant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Avenant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AvenantsTable extends Table
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

        $this->setTable('avenants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Marches', [
            'foreignKey' => 'marche_id'
        ]);
        $this->hasMany('DetailsMarches', [
            'foreignKey' => 'avenant_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Devis', [
            'foreignKey' => 'avenant_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('LotsAvenants', [
            'foreignKey' => 'avenant_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
         $this->belongsTo('Documents', [
            'foreignKey' => 'document_id'
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
            ->date('dateavenant')
            ->allowEmpty('dateavenant');

        $validator
            ->integer('numero')
            ->allowEmpty('numero');

        $validator
            ->scalar('objet')
            ->maxLength('objet', 500)
            ->allowEmpty('objet');

        $validator
            ->scalar('intitule')
            ->maxLength('intitule', 255)
            ->allowEmpty('intitule');

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
        $rules->add($rules->existsIn(['document_id'], 'Documents'));

        return $rules;
    }
}
