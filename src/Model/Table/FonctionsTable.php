<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fonctions Model
 *
 * @property \App\Model\Table\FonctionsAdministrativesTable|\Cake\ORM\Association\HasMany $FonctionsAdministratives
 * @property \App\Model\Table\FonctionsChantierTable|\Cake\ORM\Association\HasMany $FonctionsChantier
 * @property \App\Model\Table\PositionsChantierTable|\Cake\ORM\Association\HasMany $PositionsChantier
 *
 * @method \App\Model\Entity\Fonction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fonction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fonction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fonction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fonction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fonction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fonction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FonctionsTable extends Table
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

        $this->setTable('fonctions');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('FonctionsAdministratives', [
            'foreignKey' => 'fonction_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('FonctionsChantier', [
            'foreignKey' => 'fonction_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('PositionsChantiers', [
            'foreignKey' => 'fonction_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
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
            ->maxLength('nom', 250)
            ->allowEmpty('nom');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
