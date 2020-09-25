<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chantier Entity
 *
 * @property int $id
 * @property string $nom
 * @property int $marche_id
 * @property string $adresse
 * @property int $wilaya_id
 * @property int $etats_chantier_id
 * @property int $responsable_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\marche $marche
 * @property \App\Model\Entity\Wilaya $wilaya
 * @property \App\Model\Entity\EtatsChantier $etats_chantier
 * @property \App\Model\Entity\Responsable $responsable
 * @property \App\Model\Entity\FraisChantier[] $frais_chantiers
 * @property \App\Model\Entity\PositionsChantier[] $positions_chantier
 * @property \App\Model\Entity\Etat[] $etats
 */
class Chantier extends Entity
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
        'marche_id' => true,
        'adresse' => true,
        'wilaya_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'marche' => true,
        'wilaya' => true,
        'etats_chantier' => true,
        'responsable' => true,
        'frais_chantiers' => true,
        'positions_chantier' => true,
        'etats' => true
    ];
}
