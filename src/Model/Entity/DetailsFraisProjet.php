<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetailsFraisProjet Entity
 *
 * @property int $id
 * @property int $types_frais_id
 * @property float $montant
 * @property \Cake\I18n\FrozenDate $datefrais
 * @property int $frais_projet_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\TypesFrai $types_frai
 * @property \App\Model\Entity\FraisProjet $frais_projet
 */
class DetailsFraisProjet extends Entity
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
        'types_frais_id' => true,
        'montant' => true,
        'observation' => true,
        'datefrais' => true,
        'frais_projet_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'types_frai' => true,
        'frais_projet' => true
    ];
}
