<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttachementsTravaux Model
 *
 * @property \App\Model\Table\DevisTable|\Cake\ORM\Association\BelongsTo $Devis
 * @property \App\Model\Table\AvenantsTable|\Cake\ORM\Association\BelongsToMany $Avenants
 *
 * @method \App\Model\Entity\AttachementsTravaux get($primaryKey, $options = [])
 * @method \App\Model\Entity\AttachementsTravaux newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AttachementsTravaux[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AttachementsTravaux|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttachementsTravaux patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AttachementsTravaux[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AttachementsTravaux findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AttachementsTravauxTable extends Table
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

        $this->setTable('attachements_travaux');
        $this->setDisplayField('intitule');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Devis', [
            'foreignKey' => 'devi_id'
        ]);
        $this->hasMany('DetailsAttachements', [
            'foreignKey' => 'Attachements_Travail_id',
            'dependent' => true,
            'cascadeCallbacks' => true
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
            ->scalar('intitule')
            ->maxLength('intitule', 255)
            ->allowEmpty('intitule');

        $validator
            ->date('dateattachement')
            ->allowEmpty('dateattachement');

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
        $rules->add($rules->existsIn(['devi_id'], 'Devis'));

        return $rules;
    }
}
