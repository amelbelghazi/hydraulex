<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BonsCommande Entity
 *
 * @property int $id
 * @property int $departement_id
 * @property float $total
 * @property int $tva
 * @property int $fournisseur_id
 * @property \Cake\I18n\FrozenDate $datebon
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Departement $departement
 * @property \App\Model\Entity\Fournisseur $fournisseur
 * @property \App\Model\Entity\DetailsBonCommande[] $details_bon_commande
 */
class BonsCommande extends Entity
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
        'fournisseur_id' => true,
        'datebon' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'departement' => true,
        'fournisseur' => true,
        'details_bon_commande' => true
    ];
}
