<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LocationsMachine Entity
 *
 * @property int $id
 * @property int $machine_id
 * @property float $cout
 * @property int $locataire_id
 * @property \Cake\I18n\FrozenDate $datelocation
 * @property int $duree
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Machine $machine
 * @property \App\Model\Entity\Locataire $locataire
 */
class LocationsMachine extends Entity
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
        'machine_id' => true,
        'cout' => true,
        'locataire_id' => true,
        'datelocation' => true,
        'duree' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'machine' => true,
        'locataire' => true
    ];
}
