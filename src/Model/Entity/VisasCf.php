<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VisasCf Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $datevisa
 * @property int $numero
 * @property int $marche_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\March $march
 */
class VisasCf extends Entity
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
        'datevisa' => true,
        'numero' => true,
        'marche_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'march' => true
    ];
}
