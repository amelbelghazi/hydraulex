<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Punition Entity
 *
 * @property int $id
 * @property int $avertissement_id
 * @property int $type_punition_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Avertissement $avertissement
 * @property \App\Model\Entity\TypePunition $type_punition
 */
class Punition extends Entity
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
        'avertissement_id' => true,
        'type_punition_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'avertissement' => true,
        'type_punition' => true
    ];
}
