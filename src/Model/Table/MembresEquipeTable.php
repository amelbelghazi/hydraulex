<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MembresEquipe Model
 *
 * @property \App\Model\Table\MembresTable|\Cake\ORM\Association\BelongsTo $Membres
 * @property \App\Model\Table\EquipesTable|\Cake\ORM\Association\BelongsTo $Equipes
 *
 * @method \App\Model\Entity\MembresEquipe get($primaryKey, $options = [])
 * @method \App\Model\Entity\MembresEquipe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MembresEquipe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MembresEquipe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MembresEquipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MembresEquipe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MembresEquipe findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MembresEquipeTable extends Table
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

        $this->setTable('membres_equipe');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Membres', [
            'foreignKey' => 'membre_id'
        ]);
        $this->belongsTo('Equipes', [
            'foreignKey' => 'equipe_id'
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
        $rules->add($rules->existsIn(['membre_id'], 'Membres'));
        $rules->add($rules->existsIn(['equipe_id'], 'Equipes'));

        return $rules;
    }
}
