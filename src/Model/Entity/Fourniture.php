<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fourniture Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $dateutilisation
 * @property int $qte
 * @property float $departement_id
 * @property int $stock_id
 * @property string $observation
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Departement $departement
 * @property \App\Model\Entity\Stock $stock
 */
class Fourniture extends Entity
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
        'dateutilisation' => true,
        'qte' => true,
        'departement_id' => true,
        'stock_id' => true,
        'observation' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'departement' => true,
        'stock' => true
    ];
}
