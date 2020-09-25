<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Avance Entity
 *
 * @property int $id
 * @property int $marche_id
 * @property float $montant
 * @property int $numero
 * @property \Cake\I18n\FrozenDate $dateremboursement
 * @property \Cake\I18n\FrozenDate $dateavance
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\March $march
 * @property \App\Model\Entity\RemboursementsAvance[] $remboursements_avance
 */
class Avance extends Entity
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
        'montant' => true,
        'numero' => true,
        'types_avance_id' => true, 
        'dateremboursement' => true,
        'dateavance' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'march' => true,
        'remboursements_avance' => true
    ];
}
