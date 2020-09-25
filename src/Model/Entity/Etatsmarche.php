<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Etatsmarche Entity
 *
 * @property int $id
 * @property int $marche_id
 * @property \Cake\I18n\FrozenDate $dateetat
 * @property int $ODS_id
 * @property int $etat_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\marche $marche
 * @property \App\Model\Entity\Ods $o_d_s
 * @property \App\Model\Entity\Etat $etat
 */
class Etatsmarche extends Entity
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
        'marche_id' => true,
        'dateetat' => true,
        'ODS_id' => true,
        'etat_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'marche' => true,
        'o_d_s' => true,
        'etat' => true
    ];
}
