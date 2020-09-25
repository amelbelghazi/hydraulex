<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EtatsRessource Entity
 *
 * @property int $id
 * @property string $cause
 * @property int $ressource_id
 * @property int $types_etats_ressource_id
 * @property \Cake\I18n\FrozenDate $dateetat
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Ressource $ressource
 * @property \App\Model\Entity\TypesEtatsRessource $types_etats_ressource
 */
class EtatsRessource extends Entity
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
        'cause' => true,
        'ressource_id' => true,
        'types_etats_ressource_id' => true,
        'dateetat' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'ressource' => true,
        'types_etats_ressource' => true
    ];
}
