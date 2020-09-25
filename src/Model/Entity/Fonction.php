<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fonction Entity
 *
 * @property int $id
 * @property string $nom
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\FonctionsAdministrative[] $fonctions_administratives
 * @property \App\Model\Entity\FonctionsChantier[] $fonctions_chantier
 * @property \App\Model\Entity\PositionsChantier[] $positions_chantier
 */
class Fonction extends Entity
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
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'fonctions_administratives' => true,
        'fonctions_chantier' => true,
        'positions_chantier' => true
    ];
}
