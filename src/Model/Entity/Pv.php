<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pv Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $datePV
 * @property string $libelle
 * @property int $numero
 * @property int $marche_id
 * @property int $types_PV_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\March $march
 * @property \App\Model\Entity\TypesPv $types_p_v
 */
class Pv extends Entity
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
        'datePV' => true,
        'libelle' => true,
        'numero' => true,
        'marche_id' => true,
        'types_PV_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'march' => true,
        'types_p_v' => true
    ];
}
