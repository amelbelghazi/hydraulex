<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RemboursementsAvance Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $dateremboursement
 * @property int $avance_id
 * @property float $montant
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Avance $avance
 */
class RemboursementsAvance extends Entity
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
        'dateremboursement' => true,
        'avance_id' => true,
        'situation_id' => true,
        'montant' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'avance' => true
    ];
}
