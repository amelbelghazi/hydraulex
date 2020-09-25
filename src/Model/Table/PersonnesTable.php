<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Personnes Model
 *
 * @property \App\Model\Table\SituationsFamilialesTable|\Cake\ORM\Association\BelongsTo $SituationsFamiliales
 * @property \App\Model\Table\SexesTable|\Cake\ORM\Association\BelongsTo $Sexes
 * @property \App\Model\Table\CadeauxTable|\Cake\ORM\Association\HasMany $Cadeaux
 * @property \App\Model\Table\MembresTable|\Cake\ORM\Association\HasMany $Membres
 * @property \App\Model\Table\PersonnelsTable|\Cake\ORM\Association\HasMany $Personnels
 *
 * @method \App\Model\Entity\Personne get($primaryKey, $options = [])
 * @method \App\Model\Entity\Personne newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Personne[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Personne|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Personne patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Personne[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Personne findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PersonnesTable extends Table
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
        $this->setTable('personnes');
        //debug(); 
        $this->setDisplayField('nom_complet');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('SituationsFamiliales', [
            'foreignKey' => 'situations_familiale_id'
        ]);
        $this->belongsTo('Sexes', [
            'foreignKey' => 'sexe_id'
        ]);
        $this->hasMany('Cadeaux', [
            'foreignKey' => 'personne_id'
        ]);
        $this->hasMany('Membres', [
            'foreignKey' => 'personne_id'
        ]);
        $this->hasMany('Personnels', [
            'foreignKey' => 'personne_id'
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
            ->maxLength('nom', 100)
            ->allowEmpty('nom');

        $validator
            ->scalar('prenom')
            ->maxLength('prenom', 100)
            ->allowEmpty('prenom');

        $validator
            ->scalar('adresse')
            ->maxLength('adresse', 200)
            ->allowEmpty('adresse');

        $validator
            ->scalar('numero')
            ->maxLength('numero', 16)
            ->allowEmpty('numero');

        $validator
            ->date('datedenaissance')
            ->allowEmpty('datedenaissance');

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
        $rules->add($rules->existsIn(['situations_familiale_id'], 'SituationsFamiliales'));
        $rules->add($rules->existsIn(['sexe_id'], 'Sexes'));

        return $rules;
    }
}
