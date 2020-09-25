<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OdssChantier Entity
 *
 * @property int $id
 * @property int $ODS_id
 * @property int $chantier_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Ods $o_d_s
 * @property \App\Model\Entity\Chantier $chantier
 */
class OdssChantier extends Entity
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
        'ODS_id' => true,
        'chantier_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'o_d_s' => true,
        'chantier' => true
    ];
}
