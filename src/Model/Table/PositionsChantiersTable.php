<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PositionsChantiers Model
 *
 * @property \App\Model\Table\PersonnelsTable|\Cake\ORM\Association\BelongsTo $Personnels
 * @property \App\Model\Table\FonctionsTable|\Cake\ORM\Association\BelongsTo $Fonctions
 * @property \App\Model\Table\ChantiersTable|\Cake\ORM\Association\BelongsTo $Chantiers
 *
 * @method \App\Model\Entity\PositionsChantier get($primaryKey, $options = [])
 * @method \App\Model\Entity\PositionsChantier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PositionsChantier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PositionsChantier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PositionsChantier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PositionsChantier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PositionsChantier findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PositionsChantiersTable extends Table
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

        $this->setTable('positions_chantiers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Positions', [
            'foreignKey' => 'position_id'
        ]);
        $this->belongsTo('Fonctions', [
            'foreignKey' => 'fonction_id'
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
        $rules->add($rules->existsIn(['position_id'], 'Positions'));
        $rules->add($rules->existsIn(['fonction_id'], 'Fonctions'));
        $rules->add($rules->existsIn(['chantier_id'], 'Chantiers'));

        return $rules;
    }
}
