<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Unites Model
 *
 * @property \App\Model\Table\ContraintesSoumissionTable|\Cake\ORM\Association\HasMany $ContraintesSoumission
 * @property \App\Model\Table\DetailsArticleTable|\Cake\ORM\Association\HasMany $DetailsArticle
 * @property \App\Model\Table\DetailsArticlesAvenantTable|\Cake\ORM\Association\HasMany $DetailsArticlesAvenant
 * @property \App\Model\Table\DetailsBonCommandeTable|\Cake\ORM\Association\HasMany $DetailsBonCommande
 * @property \App\Model\Table\ProduitsTable|\Cake\ORM\Association\HasMany $Produits
 *
 * @method \App\Model\Entity\Unite get($primaryKey, $options = [])
 * @method \App\Model\Entity\Unite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Unite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Unite|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Unite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Unite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Unite findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UnitesTable extends Table
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

        $this->setTable('unites');
        $this->setDisplayField('signe');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ContraintesSoumission', [
            'foreignKey' => 'unite_id'
        ]);
        $this->hasMany('DetailsArticle', [
            'foreignKey' => 'unite_id'
        ]);
        $this->hasMany('DetailsArticlesAvenant', [
            'foreignKey' => 'unite_id'
        ]);
        $this->hasMany('DetailsBonCommande', [
            'foreignKey' => 'unite_id'
        ]);
        $this->hasMany('Produits', [
            'foreignKey' => 'unite_id'
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
            ->scalar('signe')
            ->maxLength('signe', 5)
            ->allowEmpty('signe');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
