<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Machine Entity
 *
 * @property int $id
 * @property int $proprietaire_id
 * @property int $ressource_id
 * @property int $marque_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Proprietaire $proprietaire
 * @property \App\Model\Entity\Ressource $ressource
 * @property \App\Model\Entity\Marque $marque
 * @property \App\Model\Entity\EntretiensMachine[] $entretiens_machine
 * @property \App\Model\Entity\LocationsMachine[] $locations_machine
 * @property \App\Model\Entity\Panne[] $pannes
 * @property \App\Model\Entity\PiecesMachine[] $pieces_machine
 */
class Machine extends Entity
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
        'proprietaire_id' => true,
        'ressource_id' => true,
        'marque_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'proprietaire' => true,
        'ressource' => true,
        'marque' => true,
        'entretiens_machine' => true,
        'locations_machine' => true,
        'pannes' => true,
        'pieces_machine' => true
    ];
}
