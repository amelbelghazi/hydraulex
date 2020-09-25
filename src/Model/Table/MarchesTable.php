<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/** 
 * Marches Model
 * 
 * @property \App\Model\Table\AffairesTable|\Cake\ORM\Association\BelongsTo $Affaires
 * @property \App\Model\Table\MaitresOeuvresTable|\Cake\ORM\Association\BelongsTo $MaitresOeuvres
 * @property \App\Model\Table\AvancesTable|\Cake\ORM\Association\HasMany $Avances
 * @property \App\Model\Table\AvenantsTable|\Cake\ORM\Association\HasMany $Avenants
 * @property \App\Model\Table\CautionsTable|\Cake\ORM\Association\HasMany $Cautions
 * @property \App\Model\Table\ChantiersTable|\Cake\ORM\Association\HasMany $Chantiers
 * @property \App\Model\Table\CorrespondancesTable|\Cake\ORM\Association\HasMany $Correspondances
 * @property \App\Model\Table\DetailsMarchesTable|\Cake\ORM\Association\HasMany $DetailsMarches
 * @property \App\Model\Table\DevisTable|\Cake\ORM\Association\HasMany $Devis
 * @property \App\Model\Table\ProjetsSoustraitantTable|\Cake\ORM\Association\HasMany $ProjetsSoustraitant
 * @property \App\Model\Table\PvsTable|\Cake\ORM\Association\HasMany $Pvs
 * @property \App\Model\Table\VisasCfTable|\Cake\ORM\Association\HasMany $VisasCf
 * @property \App\Model\Table\EtatsTable|\Cake\ORM\Association\BelongsToMany $Etats
 *
 * @method \App\Model\Entity\marche get($primaryKey, $options = [])
 * @method \App\Model\Entity\marche newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\marche[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\marche|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\marche patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\marche[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\marche findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MarchesTable extends Table
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

        $this->setTable('marches');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Affaires', [
            'foreignKey' => 'affaire_id'
        ]);
        $this->belongsTo('MaitresOeuvres', [
            'foreignKey' => 'maitres_oeuvre_id'
        ]);
        $this->belongsTo('Documents', [
            'foreignKey' => 'document_id'
        ]);
        $this->hasMany('Avances', [
            'foreignKey' => 'marche_id'
        ]);
        $this->hasMany('Avenants', [
            'foreignKey' => 'marche_id'
        ]);
        $this->hasMany('Cautions', [
            'foreignKey' => 'marche_id'
        ]);
        $this->hasMany('Chantiers', [
            'foreignKey' => 'marche_id'
        ]);
        $this->hasMany('Correspondances', [
            'foreignKey' => 'marche_id'
        ]);
        $this->hasMany('DetailsMarches', [
            'foreignKey' => 'marche_id'
        ]);
        $this->hasMany('EtatsMarches', [
            'foreignKey' => 'marche_id'
        ]);
        $this->hasMany('Devis', [
            'foreignKey' => 'marche_id'
        ]);
        $this->hasMany('ProjetsSoustraitant', [
            'foreignKey' => 'marche_id'
        ]);
        $this->hasMany('Pvs', [
            'foreignKey' => 'marche_id'
        ]);
        $this->hasMany('VisasCf', [
            'foreignKey' => 'marche_id'
        ]);
        $this->hasMany('ODSs', [
            'foreignKey' => 'marche_id'
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
            ->integer('numero')
            ->allowEmpty('numero');

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
        $rules->add($rules->existsIn(['affaire_id'], 'Affaires'));
        $rules->add($rules->existsIn(['maitres_oeuvre_id'], 'MaitresOeuvres'));
        $rules->add($rules->existsIn(['document_id'], 'Documents'));

        return $rules;
    }
}
