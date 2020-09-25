<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Paie Entity
 *
 * @property int $id
 * @property string $nom
 * @property int $salaire_id
 * @property \Cake\I18n\FrozenDate $datepaie
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Salaire $salaire
 */
class Paie extends Entity
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
        'salaire_id' => true,
        'datepaie' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'salaire' => true
    ];
}
