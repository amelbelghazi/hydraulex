<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Personne Entity
 *
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $adresse
 * @property string $numero
 * @property \Cake\I18n\FrozenDate $datedenaissance
 * @property int $situations_familiale_id
 * @property int $sexe_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\SituationsFamiliale $situations_familiale
 * @property \App\Model\Entity\Sex $sex
 * @property \App\Model\Entity\Cadeaux[] $cadeaux
 * @property \App\Model\Entity\Membre[] $membres
 * @property \App\Model\Entity\Personnel[] $personnels
 */
class Personne extends Entity
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
    //public $virtualFields = array('nom_complet' => 'concat(Personne.nom, " ", Personne.prenom)');
    protected $_virtual = ['nom_complet'];

    protected function _getNomComplet() {
        return $this->_properties['nom'] . ' ' . $this->_properties['prenom'];
    }
    
    protected $_accessible = [
        'nom' => true,
        'prenom' => true,
        'adresse' => true,
        'numero' => true,
        'datedenaissance' => true,
        'situations_familiale_id' => true,
        'sexe_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'situations_familiale' => true,
        'sex' => true,
        'cadeaux' => true,
        'membres' => true,
        'personnels' => true,
        'nom_complet' => true
    ];
}
