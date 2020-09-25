<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesGifts Model
 *
 * @property \App\Model\Table\GiftsTable|\Cake\ORM\Association\HasMany $Gifts
 *
 * @method \App\Model\Entity\TypesGift get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesGift newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesGift[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesGift|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesGift patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesGift[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesGift findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesGiftsTable extends Table
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

        $this->setTable('types_gifts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Gifts', [
            'foreignKey' => 'types_gift_id'
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
            ->maxLength('libelle', 250)
            ->allowEmpty('libelle');

        return $validator;
    }
}
