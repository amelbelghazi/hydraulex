<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contrat Entity
 *
 * @property int $id
 * @property int $numero
 * @property \Cake\I18n\FrozenDate $dateetablissement
 * @property int $durée
 * @property string $type
 * @property string $etats_contrat_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\EtatsContrat $etats_contrat
 * @property \App\Model\Entity\ContratsSoustraitant[] $contrats_soustraitant
 * @property \App\Model\Entity\Personnel[] $personnels
 * @property \App\Model\Entity\Etat[] $etats
 */
class Contrat extends Entity
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
        'numero' => true,
        'dateetablissement' => true,
        'duree' => true,
        'type' => true,
        'etats_contrat_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'etats_contrat' => true,
        'contrats_soustraitant' => true,
        'personnels' => true,
        'etats' => true
    ];
}
