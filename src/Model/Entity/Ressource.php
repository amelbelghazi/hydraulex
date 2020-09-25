<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ressource Entity
 *
 * @property int $id
 * @property string $nom
 * @property string $code
 * @property \Cake\I18n\FrozenDate $datedebutservice
 * @property \Cake\I18n\FrozenDate $datedebutcirculation
 * @property int $stock_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 * @property int $types_ressource_id
 *
 * @property \App\Model\Entity\Stock $stock
 * @property \App\Model\Entity\TypesRessource $types_ressource
 * @property \App\Model\Entity\AffectationsRessource[] $affectations_ressource
 * @property \App\Model\Entity\Machine[] $machines
 * @property \App\Model\Entity\Materiel[] $materiels
 */
class Ressource extends Entity
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
        'code' => true,
        'datedebutservice' => true,
        'datedebutcirculation' => true,
        'stock_id' => true,
        'created' => true,
        'qte' => true,
        'modified' => true,
        'modified_by' => true,
        'types_ressource_id' => true,
        'stock' => true,
        'types_ressource' => true,
        'affectations_ressource' => true,
        'machines' => true,
        'details_location_id' => true,
        'materiels' => true
    ];
}
