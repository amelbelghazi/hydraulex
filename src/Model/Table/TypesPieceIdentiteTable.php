<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesPieceIdentite Model
 *
 * @method \App\Model\Entity\TypesPieceIdentite get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesPieceIdentite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesPieceIdentite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesPieceIdentite|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesPieceIdentite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesPieceIdentite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesPieceIdentite findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesPieceIdentiteTable extends Table
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

        $this->setTable('types_piece_identite');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->maxLength('libelle', 150)
            ->allowEmpty('libelle');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
