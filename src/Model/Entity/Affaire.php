<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Affaire Entity
 *
 * @property int $id
 * @property string $intitule
 * @property int $categories_affaire_id
 * @property int $maitres_ouvrage_id
 * @property string $wilaya_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\CategoriesAffaire $categories_affaire
 * @property \App\Model\Entity\MaitresOuvrage $maitres_ouvrage
 * @property \App\Model\Entity\Wilaya $wilaya
 * @property \App\Model\Entity\Commission[] $commissions
 * @property \App\Model\Entity\FraisProjet[] $frais_projet
 * @property \App\Model\Entity\March[] $marches
 * @property \App\Model\Entity\Soumission[] $soumissions
 */
class Affaire extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'intitule' => true,
        'categories_affaire_id' => true,
        'maitres_ouvrage_id' => true,
        'wilaya_id' => true,
        'dateaffaire'=>true, 
        'etats_affaire_id'=>true, 
        'types_affaire_id'=>true, 
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'categories_affaire' => true,
        'maitres_ouvrage' => true,
        'wilaya' => true,
        'commissions' => true,
        'frais_projet' => true,
        'marches' => true,
        'soumissions' => true
    ];
}
