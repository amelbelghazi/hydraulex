<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Etats Model
 *
 * @property \App\Model\Table\EtatsCommisionTable|\Cake\ORM\Association\HasMany $EtatsCommision
 * @property \App\Model\Table\EtatsMarcheTable|\Cake\ORM\Association\HasMany $EtatsMarche
 * @property \App\Model\Table\SoumissionsTable|\Cake\ORM\Association\HasMany $Soumissions
 * @property \App\Model\Table\EtatsRessourceTable|\Cake\ORM\Association\BelongsToMany $EtatsRessource
 *
 * @method \App\Model\Entity\Etat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Etat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Etat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Etat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Etat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Etat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Etat findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EtatsTable extends Table
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

        $this->setTable('etats');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('EtatsCommision', [
            'foreignKey' => 'etat_id'
        ]);
        $this->hasMany('EtatsMarches', [
            'foreignKey' => 'etat_id'
        ]);
        $this->hasMany('Soumissions', [
            'foreignKey' => 'etat_id'
        ]);
        $this->hasMany('EtatsAffaires', [
            'foreignKey' => 'etat_id'
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
            ->maxLength('libelle', 20)
            ->allowEmpty('libelle');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
