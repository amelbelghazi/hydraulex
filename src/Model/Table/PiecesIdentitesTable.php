<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PiecesIdentites Model
 *
 * @property \App\Model\Table\TypePieceentitesTable|\Cake\ORM\Association\BelongsTo $TypePieceentites
 * @property \App\Model\Table\DocumentsTable|\Cake\ORM\Association\BelongsTo $Documents
 *
 * @method \App\Model\Entity\PiecesIdentite get($primaryKey, $options = [])
 * @method \App\Model\Entity\PiecesIdentite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PiecesIdentite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PiecesIdentite|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PiecesIdentite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PiecesIdentite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PiecesIdentite findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PiecesIdentitesTable extends Table
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

        $this->setTable('pieces_identites');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TypePieceentites', [
            'foreignKey' => 'type_piece_identite_id'
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
            ->scalar('numero')
            ->maxLength('numero', 150)
            ->allowEmpty('numero');

        $validator
            ->date('datepiece')
            ->allowEmpty('datepiece');

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
        $rules->add($rules->existsIn(['type_piece_identite_id'], 'TypePieceentites'));
        $rules->add($rules->existsIn(['document_id'], 'Documents'));

        return $rules;
    }
}
