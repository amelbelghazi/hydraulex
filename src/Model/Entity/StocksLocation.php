<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StocksLocation Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $datestock
 * @property int $qte
 * @property float $prix
 * @property int $depot_id
 * @property int $locations_detail_id
 * @property int $produit_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Depot $depot
 * @property \App\Model\Entity\LocationsDetail[] $locations_details
 * @property \App\Model\Entity\Produit $produit
 */
class StocksLocation extends Entity
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
        'locations_detail_id' => true,
        'produit_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'depot' => true,
        'locations_details' => true,
        'produit' => true
    ];
}
