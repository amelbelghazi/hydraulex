<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetailsFraisProjets Model
 *
 * @property \App\Model\Table\TypesFraisTable|\Cake\ORM\Association\BelongsTo $TypesFrais
 * @property \App\Model\Table\FraisProjetsTable|\Cake\ORM\Association\BelongsTo $FraisProjets
 *
 * @method \App\Model\Entity\DetailsFraisProjet get($primaryKey, $options = [])
 * @method \App\Model\Entity\DetailsFraisProjet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DetailsFraisProjet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetailsFraisProjet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DetailsFraisProjet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DetailsFraisProjet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetailsFraisProjet findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DetailsFraisProjetsTable extends Table
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

        $this->setTable('details_frais_projets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TypesFrais', [
            'foreignKey' => 'types_frais_id'
        ]);
        $this->belongsTo('FraisProjets', [
            'foreignKey' => 'frais_projet_id'
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
            ->numeric('montant')
            ->allowEmpty('montant');

        $validator
            ->date('datefrais')
            ->allowEmpty('datefrais');

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
        $rules->add($rules->existsIn(['types_frais_id'], 'TypesFrais'));
        $rules->add($rules->existsIn(['frais_projet_id'], 'FraisProjets'));

        return $rules;
    }
}
