<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * marche Entity
 *
 * @property int $id
 * @property string $affaire_id
 * @property int $numero
 * @property int $maitres_oeuvre_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Affaire $affaire
 * @property \App\Model\Entity\MaitresOeuvre $maitres_oeuvre
 * @property \App\Model\Entity\Avance[] $avances
 * @property \App\Model\Entity\Avenant[] $avenants
 * @property \App\Model\Entity\Caution[] $cautions
 * @property \App\Model\Entity\Chantier[] $chantiers
 * @property \App\Model\Entity\Correspondance[] $correspondances
 * @property \App\Model\Entity\Detailsmarche[] $details_marches
 * @property \App\Model\Entity\Devi[] $devis
 * @property \App\Model\Entity\ProjetsSoustraitant[] $projets_soustraitant
 * @property \App\Model\Entity\Pv[] $pvs
 * @property \App\Model\Entity\VisasCf[] $visas_cf
 * @property \App\Model\Entity\Etat[] $etats
 */
class marche extends Entity
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
        'affaire_id' => true,
        'numero' => true,
        'maitres_oeuvre_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'affaire' => true,
        'maitres_oeuvre' => true,
        'avances' => true,
        'avenants' => true,
        'cautions' => true,
        'chantiers' => true,
        'correspondances' => true,
        'details_marches' => true,
        'devis' => true,
        'projets_soustraitant' => true,
        'pvs' => true,
        'visas_cf' => true,
        'etats' => true
    ];
}
