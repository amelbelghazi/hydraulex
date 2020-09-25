<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Avertissement Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $dateavertissement
 * @property int $personnel_id
 * @property string $cause
 * @property int $type__avertissement_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Personnel $personnel
 * @property \App\Model\Entity\TypeAvertissement $type_avertissement
 * @property \App\Model\Entity\Punition[] $punitions
 */
class Avertissement extends Entity
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
        'dateavertissement' => true,
        'personnel_id' => true,
        'cause' => true,
        'type__avertissement_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'personnel' => true,
        'type_avertissement' => true,
        'punitions' => true
    ];
}
