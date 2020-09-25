<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Entreprises Model
 *
 * @property \App\Model\Table\DestinatairesTable|\Cake\ORM\Association\HasMany $Destinataires
 * @property \App\Model\Table\ExpediteursTable|\Cake\ORM\Association\HasMany $Expediteurs
 * @property \App\Model\Table\FournisseursTable|\Cake\ORM\Association\HasMany $Fournisseurs
 * @property \App\Model\Table\GerantsTable|\Cake\ORM\Association\HasMany $Gerants
 * @property \App\Model\Table\LocatairesTable|\Cake\ORM\Association\HasMany $Locataires
 * @property \App\Model\Table\MaitresOeuvresTable|\Cake\ORM\Association\HasMany $MaitresOeuvres
 * @property \App\Model\Table\MaitresOuvragesTable|\Cake\ORM\Association\HasMany $MaitresOuvrages
 * @property \App\Model\Table\MarquesTable|\Cake\ORM\Association\HasMany $Marques
 * @property \App\Model\Table\ProprietairesTable|\Cake\ORM\Association\HasMany $Proprietaires
 * @property \App\Model\Table\ReparateursTable|\Cake\ORM\Association\HasMany $Reparateurs
 * @property \App\Model\Table\SocietesTable|\Cake\ORM\Association\HasMany $Societes
 * @property \App\Model\Table\SoumissionnairesTable|\Cake\ORM\Association\HasMany $Soumissionnaires
 * @property \App\Model\Table\SoustraitantsTable|\Cake\ORM\Association\HasMany $Soustraitants
 *
 * @method \App\Model\Entity\Entreprise get($primaryKey, $options = [])
 * @method \App\Model\Entity\Entreprise newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Entreprise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Entreprise|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Entreprise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Entreprise[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Entreprise findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EntreprisesTable extends Table
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

        $this->setTable('entreprises');
        $this->setDisplayField('libelle');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Destinataires', [
            'foreignKey' => 'entreprise_id'
        ]);
        $this->hasOne('Expediteurs', [
            'foreignKey' => 'entreprise_id'
        ]);
        $this->hasOne('Fournisseurs', [
            'foreignKey' => 'entreprise_id'
        ]);
        $this->hasOne('Gerants', [
            'foreignKey' => 'entreprise_id'
        ]);
        $this->hasOne('Locataires', [
            'foreignKey' => 'entreprise_id'
        ]);
        $this->hasOne('MaitresOeuvres', [
            'foreignKey' => 'entreprise_id'
        ]);
        $this->hasOne('MaitresOuvrages', [
            'foreignKey' => 'entreprise_id'
        ]);
        $this->hasOne('Marques', [
            'foreignKey' => 'entreprise_id'
        ]);
        $this->hasOne('Proprietaires', [
            'foreignKey' => 'entreprise_id'
        ]);
        $this->hasOne('Reparateurs', [
            'foreignKey' => 'entreprise_id'
        ]);
        $this->hasOne('Societes', [
            'foreignKey' => 'entreprise_id'
        ]);
        $this->hasOne('Soumissionnaires', [
            'foreignKey' => 'entreprise_id'
        ]);
        $this->hasOne('Soustraitants', [
            'foreignKey' => 'entreprise_id'
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
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->scalar('adresse')
            ->maxLength('adresse', 300)
            ->requirePresence('adresse', 'create')
            ->allowEmpty('adresse');

        $validator
            ->scalar('numeroFixe')
            ->maxLength('numeroFixe', 9)
            ->allowEmpty('numeroFixe');

        $validator
            ->scalar('numeroPortable')
            ->maxLength('numeroPortable', 10)
            ->allowEmpty('numeroPortable');

        $validator
            ->scalar('fax')
            ->maxLength('fax', 9)
            ->allowEmpty('fax');

        $validator
            ->scalar('nif')
            ->maxLength('nif', 20)
            ->allowEmpty('nif');

        $validator
            ->scalar('nis')
            ->maxLength('nis', 20)
            ->allowEmpty('nis');

        $validator
            ->scalar('nrcf')
            ->maxLength('nrcf', 20)
            ->allowEmpty('nrcf');

        $validator
            ->scalar('article')
            ->maxLength('article', 50)
            ->allowEmpty('article');

        $validator
            ->scalar('compte')
            ->maxLength('compte', 20)
            ->allowEmpty('compte');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('agence')
            ->maxLength('agence', 100)
            ->allowEmpty('agence');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
