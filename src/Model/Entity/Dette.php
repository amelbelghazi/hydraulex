<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dette Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $datedette
 * @property int $achat_id
 * @property string $etat
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Achat $achat
 * @property \App\Model\Entity\Versement[] $versements
 */
class Dette extends Entity
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
        'datedette' => true,
        'achat_id' => true,
        'etat' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'achat' => true,
        'versements' => true
    ];
}
