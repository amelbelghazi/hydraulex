<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RemboursementsCaution Entity
 *
 * @property int $id
 * @property int $caution_id
 * @property float $montant
 * @property \Cake\I18n\FrozenDate $dateremboursement
 * @property string $observation
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Caution $caution
 */
class RemboursementsCaution extends Entity
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
        'caution_id' => true,
        'montant' => true,
        'dateremboursement' => true,
        'observation' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'caution' => true
    ];
}
