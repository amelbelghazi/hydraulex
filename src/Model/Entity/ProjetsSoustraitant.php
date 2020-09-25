<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjetsSoustraitant Entity
 *
 * @property int $id
 * @property int $marche_id
 * @property int $soustraitant_id
 * @property int $duree
 * @property float $montant
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\March $march
 * @property \App\Model\Entity\Soustraitant $soustraitant
 */
class ProjetsSoustraitant extends Entity
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
        'marche_id' => true,
        'soustraitant_id' => true,
        'duree' => true,
        'montant' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'march' => true,
        'soustraitant' => true
    ];
}
