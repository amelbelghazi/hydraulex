<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EtatsMarches Model
 *
 * @property \App\Model\Table\MarchesTable|\Cake\ORM\Association\BelongsTo $Marches
 * @property \App\Model\Table\OdssTable|\Cake\ORM\Association\BelongsTo $ODSs
 * @property \App\Model\Table\EtatsTable|\Cake\ORM\Association\BelongsTo $Etats
 *
 * @method \App\Model\Entity\Etatsmarche get($primaryKey, $options = [])
 * @method \App\Model\Entity\Etatsmarche newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Etatsmarche[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Etatsmarche|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Etatsmarche patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Etatsmarche[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Etatsmarche findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EtatsMarchesTable extends Table
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

        $this->setTable('etats_marches');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Marches', [
            'foreignKey' => 'marche_id'
        ]);
        $this->belongsTo('ODSs', [
            'foreignKey' => 'ODS_id'
        ]);
        $this->belongsTo('Etats', [
            'foreignKey' => 'etat_id'
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
            ->date('dateetat')
            ->allowEmpty('dateetat');

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
        $rules->add($rules->existsIn(['ODS_id'], 'ODSs'));
        $rules->add($rules->existsIn(['etat_id'], 'Etats'));

        return $rules;
    }
}
