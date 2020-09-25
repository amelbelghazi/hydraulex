<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Personnel Entity
 *
 * @property int $id
 * @property int $personne_id
 * @property int $types_personnel_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Personne $personne
 * @property \App\Model\Entity\TypesPersonnel $types_personnel
 * @property \App\Model\Entity\AffectationsRessource[] $affectations_ressource
 * @property \App\Model\Entity\AssurancesPersonnel[] $assurances_personnel
 * @property \App\Model\Entity\Avertissement[] $avertissements
 * @property \App\Model\Entity\EquipesPersonnel[] $equipes_personnel
 * @property \App\Model\Entity\EtatsPersonnel[] $etats_personnel
 * @property \App\Model\Entity\FormationsPersonnel[] $formations_personnel
 * @property \App\Model\Entity\Gerant[] $gerants
 * @property \App\Model\Entity\Paie[] $paies
 * @property \App\Model\Entity\PositionsAdministrative[] $positions_administratives
 * @property \App\Model\Entity\PositionsChantier[] $positions_chantier
 * @property \App\Model\Entity\Responsable[] $responsables
 * @property \App\Model\Entity\User[] $users
 */
class Personnel extends Entity
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
        'personne_id' => true,
        'types_personnel_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'personne' => true,
        'types_personnel' => true,
        'affectations_ressource' => true,
        'assurances_personnel' => true,
        'avertissements' => true,
        'equipes_personnel' => true,
        'etats_personnel' => true,
        'formations_personnel' => true,
        'gerants' => true,
        'paies' => true,
        'positions_administratives' => true,
        'positions_chantier' => true,
        'responsables' => true,
        'users' => true
    ];
}
