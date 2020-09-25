<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Achat Entity
 *
 * @property int $id
 * @property int $departement_id
 * @property float $total
 * @property int $tva
 * @property int $fournisseur_id
 * @property \Cake\I18n\FrozenDate $datebon
 * @property string $regle
 * @property int $modes_reglement_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Departement $departement
 * @property \App\Model\Entity\Fournisseur $fournisseur
 * @property \App\Model\Entity\ModesReglement $modes_reglement
 * @property \App\Model\Entity\AchatsDetail[] $achats_details
 * @property \App\Model\Entity\BonsReception[] $bons_reception
 * @property \App\Model\Entity\Dette[] $dettes
 */
class Achat extends Entity
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
        'fournisseur_id' => true,
        'datebon' => true,
        'regle' => true,
        'numero' => true,
        'modes_reglement_id' => true,
        'bons_reception_id' =>true, 
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'departement' => true,
        'fournisseur' => true,
        'modes_reglement' => true,
        'achats_details' => true,
        'bons_reception' => true,
        'dettes' => true
    ];
}
