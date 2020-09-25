<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entreprise Entity
 *
 * @property int $id
 * @property string $nom
 * @property string $adresse
 * @property string $numeroFixe
 * @property string $numeroPortable
 * @property string $fax
 * @property string $nif
 * @property string $nis
 * @property string $nrcf
 * @property string $article
 * @property string $compte
 * @property string $email
 * @property string $agence
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Destinataire $destinataire
 * @property \App\Model\Entity\Expediteur $expediteur
 * @property \App\Model\Entity\Fournisseur $fournisseur
 * @property \App\Model\Entity\Gerant $gerant
 * @property \App\Model\Entity\Locataire $locataire
 * @property \App\Model\Entity\MaitresOeuvre $maitres_oeuvre
 * @property \App\Model\Entity\MaitresOuvrage $maitres_ouvrage
 * @property \App\Model\Entity\Marque $marque
 * @property \App\Model\Entity\Proprietaire $proprietaire
 * @property \App\Model\Entity\Reparateur $reparateur
 * @property \App\Model\Entity\Societe $societe
 * @property \App\Model\Entity\Soumissionnaire $soumissionnaire
 * @property \App\Model\Entity\Soustraitant $soustraitant
 */
class Entreprise extends Entity
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
        'adresse' => true,
        'numeroFixe' => true,
        'numeroPortable' => true,
        'fax' => true,
        'nif' => true,
        'nis' => true,
        'nrcf' => true,
        'article' => true,
        'compte' => true,
        'email' => true,
        'agence' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'destinataire' => true,
        'expediteur' => true,
        'fournisseur' => true,
        'gerant' => true,
        'locataire' => true,
        'maitres_oeuvre' => true,
        'maitres_ouvrage' => true,
        'marque' => true,
        'proprietaire' => true,
        'reparateur' => true,
        'societe' => true,
        'soumissionnaire' => true,
        'soustraitant' => true
    ];
}
