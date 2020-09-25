<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Departement Entity
 *
 * @property int $id
 * @property string $nom
 * @property int $societe_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Societe $societe
 * @property \App\Model\Entity\Achat[] $achats
 * @property \App\Model\Entity\BonsCommande[] $bons_commandes
 * @property \App\Model\Entity\Depense[] $depenses
 * @property \App\Model\Entity\Fourniture[] $fournitures
 * @property \App\Model\Entity\PositionsAdministrative[] $positions_administratives
 */
class Departement extends Entity
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
        'societe_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'societe' => true,
        'achats' => true,
        'bons_commandes' => true,
        'depenses' => true,
        'fournitures' => true,
        'positions_administratives' => true
    ];
}
