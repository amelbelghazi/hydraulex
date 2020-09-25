<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gerant Entity
 *
 * @property int $id
 * @property int $personnel_id
 * @property int $societe_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $create_by
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Personnel $personnel
 * @property \App\Model\Entity\Societe $societe
 */
class Gerant extends Entity
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
        'personnel_id' => true,
        'societe_id' => true,
        'created' => true,
        'modified' => true,
        'create_by' => true,
        'modified_by' => true,
        'personnel' => true,
        'societe' => true
    ];
}
