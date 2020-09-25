<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gift Entity
 *
 * @property int $id
 * @property int $personne_id
 * @property int $types_gift_id
 * @property int $qte
 * @property float $montant
 * @property \Cake\I18n\FrozenDate $datecadeau
 * @property string $observation
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Personne $personne
 * @property \App\Model\Entity\TypesGift $types_gift
 */
class Gift extends Entity
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
        'personne_id' => true,
        'types_gift_id' => true,
        'qte' => true,
        'montant' => true,
        'datecadeau' => true,
        'observation' => true,
        'created' => true,
        'modified' => true,
        'personne' => true,
        'types_gift' => true
    ];
}
