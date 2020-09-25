<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Location Entity
 *
 * @property int $id
 * @property int $departement_id
 * @property float $total
 * @property int $tva
 * @property string $numero
 * @property int $proprietaire_id
 * @property \Cake\I18n\FrozenDate $datelocation
 * @property string $regle
 * @property int $modes_reglement_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Departement $departement
 * @property \App\Model\Entity\Proprietaire $proprietaire
 * @property \App\Model\Entity\ModesReglement $modes_reglement
 * @property \App\Model\Entity\LocationsDetail[] $locations_details
 * @property \App\Model\Entity\Ressource[] $ressources
 * @property \App\Model\Entity\Dette[] $dettes
 * @property \App\Model\Entity\Stock[] $stocks
 * @property \App\Model\Entity\Versement[] $versements
 */
class Location extends Entity
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
        'departement_id' => true,
        'total' => true,
        'tva' => true,
        'numero' => true,
        'proprietaire_id' => true,
        'datelocation' => true,
        'regle' => true,
        'modes_reglement_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'departement' => true,
        'proprietaire' => true,
        'modes_reglement' => true,
        'locations_details' => true,
        'ressources' => true,
        'dettes' => true,
        'stocks' => true,
        'versements' => true
    ];
}
