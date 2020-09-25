<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stock Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $datestock
 * @property int $qte
 * @property float $prix
 * @property int $depot_id
 * @property int $achats_detail_id
 * @property int $produit_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Depot $depot
 * @property \App\Model\Entity\AchatsDetail $achats_detail
 * @property \App\Model\Entity\Produit $produit
 * @property \App\Model\Entity\Fourniture[] $fournitures
 * @property \App\Model\Entity\Ressource[] $ressources
 */
class Stock extends Entity
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
        'datestock' => true,
        'qte' => true,
        'prix' => true,
        'depot_id' => true,
        'achats_detail_id' => true,
        'produit_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'depot' => true,
        'achats_detail' => true,
        'produit' => true,
        'fournitures' => true,
        'ressources' => true
    ];
}
