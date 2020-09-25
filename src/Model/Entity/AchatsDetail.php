<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AchatsDetail Entity
 *
 * @property int $id
 * @property string $nom
 * @property string $code
 * @property int $achat_id
 * @property \Cake\I18n\FrozenDate $datedebutservice
 * @property \Cake\I18n\FrozenDate $datedebutcirculation
 * @property int $stock_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Achat $achat
 * @property \App\Model\Entity\Stock $stock
 */
class AchatsDetail extends Entity
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
        'nom' => true,
        'code' => true,
        'achat_id' => true,
        'datedebutservice' => true,
        'datedebutcirculation' => true,
        'stock_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'achat' => true,
        'stock' => true
    ];
}
