<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Detailsmarche Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $datedetails
 * @property int $marche_id
 * @property int $avenant_id
 * @property string $intitule
 * @property float $montant
 * @property string $delai
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\marche $marche
 * @property \App\Model\Entity\Avenant $avenant
 */
class Detailsmarche extends Entity
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
        'datedetails' => true,
        'marche_id' => true,
        'avenant_id' => true,
        'intitule' => true,
        'montant' => true,
        'delai' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'marche' => true,
        'avenant' => true
    ];
}
