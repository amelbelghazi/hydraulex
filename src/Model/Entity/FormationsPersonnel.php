<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FormationsPersonnel Entity
 *
 * @property int $id
 * @property int $formation_id
 * @property int $personnel_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Formation $formation
 * @property \App\Model\Entity\Personnel $personnel
 */
class FormationsPersonnel extends Entity
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
        'formation_id' => true,
        'personnel_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'formation' => true,
        'personnel' => true
    ];
}
