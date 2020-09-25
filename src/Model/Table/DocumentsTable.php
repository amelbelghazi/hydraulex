<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use \Cake\Event\Event;
use Cake\ORM\Entity;
use \ArrayObject;
use Cake\Validation\Validator;

/** 
 * Documents Model 
 *
 * @property \App\Model\Table\PiecesIdentitesTable|\Cake\ORM\Association\HasMany $PiecesIdentites
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Document get($primaryKey, $options = [])
 * @method \App\Model\Entity\Document newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Document[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Document|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Document patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Document[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Document findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DocumentsTable extends Table 
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

        //$this->addBehavior('Taggable');

        $this->setTable('documents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PiecesIdentites', [
            'foreignKey' => 'document_id'
        ]); 
        $this->hasMany('Marches',[
            'foreignKey' => 'document_id'
        ]);
         $this->hasMany('Odss', [
            'foreignKey' => 'document_id'
        ]);
         $this->hasMany('Commissions', [
            'foreignKey' => 'document_id'
        ]);
          $this->hasMany('Devis', [
            'foreignKey' => 'document_id'
        ]);
          $this->hasMany('FraisProjets', [
            'foreignKey' => 'document_id'
        ]);
          $this->hasMany('Avenants', [
            'foreignKey' => 'document_id'
        ]);
          $this->hasMany('Pvs', [
            'foreignKey' => 'document_id'
        ]);
        
        $this->belongsToMany('Tags', [
            'foreignKey' => 'document_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'documents_tags'
        ]);
        $this->hasMany('DocumentsTags', [
            'foreignKey' => 'document_id'
        ]);
        $this->hasMany('Contrats', [
            'foreignKey' => 'document_id'
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
            ->maxLength('libelle', 150)
            ->allowEmpty('libelle');

        $validator
            ->scalar('document')
            ->maxLength('document', 250)
            ->allowEmpty('document');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
    
    
}

