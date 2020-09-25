<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Qualification Entity
 *
 * @property int $id
 * @property int $libelle
 * @property int $soumissionnaire_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Soumissionnaire $soumissionnaire
 */
class Qualification extends Entity
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
        'libelle' => true,
        'soumissionnaire_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'soumissionnaire' => true
    ];
}
