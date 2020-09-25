<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DettesLocation Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $datedette
 * @property int $location_id
 * @property string $etat
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\VersementsLocation[] $versements_locations
 */
class DettesLocation extends Entity
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
        'datedette' => true,
        'location_id' => true,
        'etat' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'location' => true,
        'versements_locations' => true
    ];
}
