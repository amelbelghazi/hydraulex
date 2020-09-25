<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produit Entity
 *
 * @property int $id
 * @property string $nom
 * @property string $code
 * @property \Cake\I18n\FrozenDate $qte
 * @property int $unite_id
 * @property int $qtealert
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 * @property int $types_produit_id
 *
 * @property \App\Model\Entity\Unite $unite
 * @property \App\Model\Entity\TypesProduit $types_produit
 * @property \App\Model\Entity\DetailsBonCommande[] $details_bon_commande
 * @property \App\Model\Entity\DetailsBonReception[] $details_bon_reception
 * @property \App\Model\Entity\Stock[] $stocks
 */
class Produit extends Entity
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
        'nom' => true,
        'code' => true,
        'qte' => true,
        'unite_id' => true,
        'qtealert' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'types_produit_id' => true,
        'unite' => true,
        'types_produit' => true,
        'details_bon_commande' => true,
        'details_bon_reception' => true,
        'stocks' => true
    ];
}
