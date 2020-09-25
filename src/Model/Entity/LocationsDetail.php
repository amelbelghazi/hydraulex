<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LocationsDetail Entity
 *
 * @property int $id
 * @property float $prix
 * @property int $qte
 * @property int $location_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Location $location
 */
class LocationsDetail extends Entity
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
        'prix' => true,
        'qte' => true,
        'location_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'location' => true
    ];
}
