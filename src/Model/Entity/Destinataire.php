<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Destinataire Entity
 *
 * @property int $id
 * @property string $nom
 * @property string $adresse
 * @property string $numeroFixe
 * @property string $numeroPortable
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\CorrespondancesSortante[] $correspondances_sortantes
 */
class Destinataire extends Entity
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
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'correspondances_sortantes' => true
    ];
}
