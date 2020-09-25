<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EtatsChantier Entity
 *
 * @property int $id
 * @property string $cause
 * @property int $types_etats_chantier_id
 * @property \Cake\I18n\FrozenDate $dateetat
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\TypesEtatsChantier $types_etats_chantier
 */
class EtatsChantier extends Entity
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
        'cause' => true,
        'chantier_id' => true,
        'types_etats_chantier_id' => true,
        'dateetat' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'types_etats_chantier' => true
    ];
}
