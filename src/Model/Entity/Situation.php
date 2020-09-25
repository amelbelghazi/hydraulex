<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Situation Entity
 *
 * @property int $id
 * @property int $Attachements_Travail_id
 * @property \Cake\I18n\FrozenDate $datesituation
 * @property float $total
 * @property string $observation
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\AttachementsTravail $attachements_travail
 * @property \App\Model\Entity\RemboursementsAvance[] $remboursements_avance
 * @property \App\Model\Entity\SituationsDetail[] $situations_details
 */
class Situation extends Entity
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
        'Attachements_Travail_id' => true,
        'datesituation' => true,
        'total' => true,
        'observation' => true,
        'created' => true,
        'modified' => true,
        'document_id' => true, 
        'modified_by' => true,
        'attachements_travail' => true,
        'remboursements_avance' => true,
        'situations_details' => true
    ];
}
