<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reparation Entity
 *
 * @property int $id
 * @property int $panne_id
 * @property int $garage_id
 * @property \Cake\I18n\FrozenDate $datereparation
 * @property float $cout
 * @property int $duree
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Panne $panne
 * @property \App\Model\Entity\Garage $garage
 */
class Reparation extends Entity
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
        'panne_id' => true,
        'garage_id' => true,
        'datereparation' => true,
        'cout' => true,
        'duree' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'panne' => true,
        'garage' => true
    ];
}
