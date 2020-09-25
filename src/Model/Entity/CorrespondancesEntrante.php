<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CorrespondancesEntrante Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $dateenvoi
 * @property int $expediteur_id
 * @property \Cake\I18n\FrozenDate $created 
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Expediteur $expediteur
 */
class CorrespondancesEntrante extends Entity
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
        'dateenvoi' => true,
        'expediteur_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'expediteur' => true,
        'fichier' => true,
        'objet' => true,
        'observation' => true
    ];
}
