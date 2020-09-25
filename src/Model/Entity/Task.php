<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property string $intitule
 * @property \Cake\I18n\FrozenDate $datedebut
 * @property \Cake\I18n\FrozenDate $datefin
 * @property string $details
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property \Cake\I18n\FrozenDate $modified_by
 * @property int $personne_id
 *
 * @property \App\Model\Entity\Status[] $status
 * @property \App\Model\Entity\Personne $personne
 */
class Task extends Entity
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
        'intitule' => true,
        'datedebut' => true,
        'datefin' => true,
        'details' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'personne_id' => true,
        'personne' => true
    ];
}
