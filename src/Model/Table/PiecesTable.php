<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pieces Model
 *
 * @property \App\Model\Table\EntretiensMachineTable|\Cake\ORM\Association\HasMany $EntretiensMachine
 * @property \App\Model\Table\PiecesMachineTable|\Cake\ORM\Association\HasMany $PiecesMachine
 * @property \App\Model\Table\RessourcesTable|\Cake\ORM\Association\BelongsToMany $Ressources
 *
 * @method \App\Model\Entity\Piece get($primaryKey, $options = [])
 * @method \App\Model\Entity\Piece newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Piece[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Piece|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Piece patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Piece[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Piece findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PiecesTable extends Table
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

        $this->setTable('pieces');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('EntretiensMachine', [
            'foreignKey' => 'piece_id'
        ]);
        $this->hasMany('PiecesMachine', [
            'foreignKey' => 'piece_id'
        ]);
        $this->belongsToMany('Ressources', [
            'foreignKey' => 'piece_id',
            'targetForeignKey' => 'ressource_id',
            'joinTable' => 'pieces_ressources'
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
            ->maxLength('nom', 20)
            ->allowEmpty('nom');

        $validator
            ->scalar('ref')
            ->maxLength('ref', 20)
            ->allowEmpty('ref');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
