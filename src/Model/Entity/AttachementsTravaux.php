<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AttachementsTravaux Entity
 *
 * @property int $id
 * @property int $devi_id
 * @property string $intitule
 * @property \Cake\I18n\FrozenDate $dateattachement
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Devi $devi
 * @property \App\Model\Entity\Avenant[] $avenants
 */
class AttachementsTravaux extends Entity
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
        'devi_id' => true,
        'intitule' => true,
        'dateattachement' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'devi' => true,
        'avenants' => true
    ];
}
