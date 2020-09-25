<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TypesEtatsContrat Entity
 *
 * @property int $id
 * @property string $libelle
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\EtatsContrat[] $etats_contrats
 */
class TypesEtatsContrat extends Entity
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
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'etats_contrats' => true
    ];
}
