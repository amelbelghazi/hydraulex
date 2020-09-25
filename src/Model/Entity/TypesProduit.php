<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TypesProduit Entity
 *
 * @property int $id
 * @property string $libelle
 * @property int $types_produit_id
 * @property string $couleur
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\TypesProduit[] $types_produits
 * @property \App\Model\Entity\Produit[] $produits
 */
class TypesProduit extends Entity
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
        'libelle' => true,
        'types_produit_id' => true,
        'couleur' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'types_produits' => true,
        'produits' => true
    ];
}
