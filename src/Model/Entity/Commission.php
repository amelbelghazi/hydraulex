<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Commission Entity
 *
 * @property int $id
 * @property int $affaire_id
 * @property \Cake\I18n\FrozenDate $datecommision
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Affaire $affaire
 * @property \App\Model\Entity\EtatsCommision[] $etats_commision
 */
class Commission extends Entity
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
        'affaire_id' => true,
        'datecommission' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'affaire' => true,
        'etats_commission' => true
    ];
}
