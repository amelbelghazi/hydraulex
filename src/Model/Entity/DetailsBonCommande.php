<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetailsBonCommande Entity
 *
 * @property int $id
 * @property int $bons_commande_id
 * @property int $qte
 * @property float $prixachat
 * @property int $unite_id
 * @property int $produit_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\BonsCommande $bons_commande
 * @property \App\Model\Entity\Unite $unite
 * @property \App\Model\Entity\Produit $produit
 */
class DetailsBonCommande extends Entity
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
        'bons_commande_id' => true,
        'qte' => true,
        'prixachat' => true,
        'unite_id' => true,
        'produit_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'bons_commande' => true,
        'unite' => true,
        'produit' => true
    ];
}
