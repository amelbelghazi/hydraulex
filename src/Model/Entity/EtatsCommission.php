<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EtatsCommission Entity
 *
 * @property int $id
 * @property int $commission_id
 * @property \Cake\I18n\FrozenDate $dateetat
 * @property int $etat_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 * @property string $cause
 * @property \Cake\I18n\FrozenDate $datecommission
 *
 * @property \App\Model\Entity\Commission $commission
 * @property \App\Model\Entity\Etat $etat
 */
class EtatsCommission extends Entity
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
        'commission_id' => true,
        'dateetat' => true,
        'etat_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'cause' => true,
        'datecommission' => true,
        'commission' => true,
        'etat' => true
    ];
}
