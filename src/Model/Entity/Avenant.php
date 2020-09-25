<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Avenant Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $dateavenant
 * @property int $marche_id
 * @property int $numero
 * @property string $objet
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\March $march
 * @property \App\Model\Entity\DetailsMarche[] $details_marche
 * @property \App\Model\Entity\LotsAvenant[] $lots_avenant
 */
class Avenant extends Entity
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
        'dateavenant' => true,
        'marche_id' => true,
        'numero' => true,
        'objet' => true,
        'montant' => true,
        'visa' => true,
        'delai' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'march' => true,
        'details_marche' => true,
        'lots_avenant' => true
    ];
}
