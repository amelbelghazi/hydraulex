<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EntretiensRessourcesPeriodique Entity
 *
 * @property int $id
 * @property int $entretiens_ressource_id
 * @property int $garage_id
 * @property \Cake\I18n\FrozenDate $dateentretien
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\EntretiensRessource $entretiens_ressource
 * @property \App\Model\Entity\Garage $garage
 */
class EntretiensRessourcesPeriodique extends Entity
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
        'entretiens_ressource_id' => true,
        'garage_id' => true,
        'duree' => true,
        'dateentretien' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'entretiens_ressource' => true,
        'garage' => true
    ];
}
