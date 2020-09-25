<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ods Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $dateODS
 * @property int $types_ODS_id
 * @property int $marche_id
 * @property int $numero
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\TypesOds $types_o_d_s
 * @property \App\Model\Entity\marche $marche
 */
class Ods extends Entity
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
        'dateODS' => true,
        'types_ODS_id' => true,
        'marche_id' => true,
        'numero' => true,
        'fichier' => true,
        'observation' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'types_o_d_s' => true,
        'marche' => true
    ];
}
