<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetailsBonReception Entity
 *
 * @property int $id
 * @property int $bons_reception_id
 * @property int $produit_id
 * @property int $qte
 * @property float $prix
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\BonsReception $bons_reception
 * @property \App\Model\Entity\Produit $produit
 */
class DetailsBonReception extends Entity
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
        'bons_reception_id' => true,
        'produit_id' => true,
        'qte' => true,
        'prix' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'bons_reception' => true,
        'produit' => true
    ];
}
