<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SituationsDetail Entity
 *
 * @property int $id
 * @property int $situation_id
 * @property float $qte
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Situation $situation
 */
class SituationsDetail extends Entity
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
        'situation_id' => true,
        'qte' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'situation' => true
    ];
}
