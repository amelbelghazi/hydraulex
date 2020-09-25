<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Periodes Model
 *
 * @property \App\Model\Table\EntretiensTable|\Cake\ORM\Association\HasMany $Entretiens
 *
 * @method \App\Model\Entity\Periode get($primaryKey, $options = [])
 * @method \App\Model\Entity\Periode newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Periode[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Periode|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Periode patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Periode[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Periode findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PeriodesTable extends Table
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

        $this->setTable('periodes');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Entretiens', [
            'foreignKey' => 'periode_id'
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
            ->allowEmpty('libelle');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
