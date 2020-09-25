<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EntretiensRessource Entity
 *
 * @property int $id
 * @property int $ressource_id
 * @property int $entretien_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 * @property \Cake\I18n\FrozenDate $datedebut
 *
 * @property \App\Model\Entity\Ressource $ressource
 * @property \App\Model\Entity\Entretien $entretien
 * @property \App\Model\Entity\EntretiensRessourcesPeriodique[] $entretiens_ressources_periodiques
 */
class EntretiensRessource extends Entity
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
        'ressource_id' => true,
        'entretien_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'datedebut' => true,
        'ressource' => true,
        'entretien' => true,
        'entretiens_ressources_periodiques' => true
    ];
}
