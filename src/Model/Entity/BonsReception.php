<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BonsReception Entity
 *
 * @property int $id
 * @property int $achat_id
 * @property int $bons_commande_id
 * @property \Cake\I18n\FrozenDate $datereception
 * @property string $observation
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Achat $achat
 * @property \App\Model\Entity\BonsCommande $bons_commande
 * @property \App\Model\Entity\DetailsBonReception[] $details_bon_reception
 */
class BonsReception extends Entity
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
        'datereception' => true,
        'observation' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'achat' => true,
        'bons_commande' => true,
        'details_bon_reception' => true
    ];
}
