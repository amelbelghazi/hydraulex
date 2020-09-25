<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SituationsFamiliales Model
 *
 * @property \App\Model\Table\PersonnesTable|\Cake\ORM\Association\HasMany $Personnes
 *
 * @method \App\Model\Entity\SituationsFamiliale get($primaryKey, $options = [])
 * @method \App\Model\Entity\SituationsFamiliale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SituationsFamiliale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SituationsFamiliale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SituationsFamiliale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SituationsFamiliale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SituationsFamiliale findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SituationsFamilialesTable extends Table
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

        $this->setTable('situations_familiales');
        $this->setDisplayField('libellé');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Personnes', [
            'foreignKey' => 'situations_familiale_id'
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
            ->scalar('libellé')
            ->maxLength('libellé', 100)
            ->allowEmpty('libellé');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
