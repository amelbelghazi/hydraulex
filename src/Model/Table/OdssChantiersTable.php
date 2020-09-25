<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OdssChantiers Model
 *
 * @property \App\Model\Table\OdssTable|\Cake\ORM\Association\BelongsTo $ODSs
 * @property \App\Model\Table\ChantiersTable|\Cake\ORM\Association\BelongsTo $Chantiers
 *
 * @method \App\Model\Entity\OdssChantier get($primaryKey, $options = [])
 * @method \App\Model\Entity\OdssChantier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OdssChantier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OdssChantier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OdssChantier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OdssChantier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OdssChantier findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OdssChantiersTable extends Table
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

        $this->setTable('odss_chantiers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ODSs', [
            'foreignKey' => 'ODS_id'
        ]);
        $this->belongsTo('Chantiers', [
            'foreignKey' => 'chantier_id'
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
        $rules->add($rules->existsIn(['ODS_id'], 'ODSs'));
        $rules->add($rules->existsIn(['chantier_id'], 'Chantiers'));

        return $rules;
    }
}
