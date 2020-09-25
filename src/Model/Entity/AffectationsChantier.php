<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AffectationsChantier Entity
 *
 * @property int $id
 * @property int $personnel_id
 * @property int $affectation_id
 * @property int $chantier_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Personnel $personnel
 * @property \App\Model\Entity\Affectation $affectation
 * @property \App\Model\Entity\Chantier $chantier
 * @property \App\Model\Entity\Departement $departement
 */
class AffectationsChantier extends Entity
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
        'personnel_id' => true,
        'affectation_id' => true,
        'chantier_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'personnel' => true,
        'affectation' => true,
        'chantier' => true,
        'departement' => true
    ];
}
