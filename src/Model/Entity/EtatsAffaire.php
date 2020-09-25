<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EtatsAffaire Entity
 *
 * @property int $id
 * @property int $affaire_id
 * @property int $etat_id
 * @property string $cause
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Affaire $affaire
 * @property \App\Model\Entity\Etat $etat
 */
class EtatsAffaire extends Entity
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
        'etat_id' => true,
        'cause' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'affaire' => true,
        'etat' => true
    ];
}
