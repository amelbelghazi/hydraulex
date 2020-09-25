<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Equipes Model
 *
 * @property \App\Model\Table\EquipesPersonnelTable|\Cake\ORM\Association\HasMany $EquipesPersonnel
 * @property \App\Model\Table\EquipesSoustraitantTable|\Cake\ORM\Association\HasMany $EquipesSoustraitant
 * @property \App\Model\Table\MembresEquipeTable|\Cake\ORM\Association\HasMany $MembresEquipe
 *
 * @method \App\Model\Entity\Equipe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Equipe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Equipe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Equipe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Equipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Equipe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Equipe findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EquipesTable extends Table
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

        $this->setTable('equipes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('EquipesPersonnel', [
            'foreignKey' => 'equipe_id'
        ]);
        $this->hasMany('EquipesSoustraitant', [
            'foreignKey' => 'equipe_id'
        ]);
        $this->hasMany('MembresEquipe', [
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
            ->scalar('nom')
            ->maxLength('nom', 250)
            ->allowEmpty('nom');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
