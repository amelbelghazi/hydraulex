<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Caution Entity
 *
 * @property int $id
 * @property int $marche_id
 * @property int $types_caution_id
 * @property int $numero
 * @property float $montant
 * @property string $etat
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\March $march
 * @property \App\Model\Entity\TypesCaution $types_caution
 * @property \App\Model\Entity\RemboursementsCaution[] $remboursements_caution
 */
class Caution extends Entity
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
        'marche_id' => true,
        'types_caution_id' => true,
        'numero' => true,
        'montant' => true,
        'etat' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'march' => true,
        'types_caution' => true,
        'remboursements_caution' => true
    ];
}
