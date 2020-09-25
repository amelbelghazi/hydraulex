<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PiecesMachine Model
 *
 * @property \App\Model\Table\MachinesTable|\Cake\ORM\Association\BelongsTo $Machines
 * @property \App\Model\Table\PiecesTable|\Cake\ORM\Association\BelongsTo $Pieces
 *
 * @method \App\Model\Entity\PiecesMachine get($primaryKey, $options = [])
 * @method \App\Model\Entity\PiecesMachine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PiecesMachine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PiecesMachine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PiecesMachine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PiecesMachine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PiecesMachine findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PiecesMachineTable extends Table
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

        $this->setTable('pieces_machine');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Machines', [
            'foreignKey' => 'machine_id'
        ]);
        $this->belongsTo('Pieces', [
            'foreignKey' => 'piece_id'
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
        $rules->add($rules->existsIn(['machine_id'], 'Machines'));
        $rules->add($rules->existsIn(['piece_id'], 'Pieces'));

        return $rules;
    }
}
