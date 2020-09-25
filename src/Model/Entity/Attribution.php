<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attribution Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $dateattribution
 * @property int $soumission_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Soumission $soumission
 */
class Attribution extends Entity
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
        'dateattribution' => true,
        'soumission_id' => true,
        'observation' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'soumission' => true
    ];
}
