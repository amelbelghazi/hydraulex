<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Parc Entity
 *
 * @property int $id
 * @property string $libelle
 * @property string $adresse
 * @property int $wilaya_id
 * @property int $responsable_id
 * @property int $gardien_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Wilaya $wilaya
 * @property \App\Model\Entity\Responsable $responsable
 * @property \App\Model\Entity\Gardien $gardien
 * @property \App\Model\Entity\Ressource[] $ressources
 */
class Parc extends Entity
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
        'libelle' => true,
        'adresse' => true,
        'wilaya_id' => true,
        'delai' => true, 
        'dateexploitation' =>true, 
        'responsable_id' => true,
        'gardien_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'wilaya' => true,
        'responsable' => true,
        'gardien' => true,
        'ressources' => true
    ];
}
