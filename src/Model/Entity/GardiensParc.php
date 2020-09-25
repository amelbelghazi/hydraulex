<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GardiensParc Entity
 *
 * @property int $id
 * @property int $parc_id
 * @property int $gardien_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Parc $parc
 * @property \App\Model\Entity\Gardien $gardien
 */
class GardiensParc extends Entity
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
        'parc_id' => true,
        'gardien_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'parc' => true,
        'gardien' => true
    ];
}
