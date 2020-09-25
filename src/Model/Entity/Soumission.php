<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Soumission Entity
 *
 * @property int $id
 * @property int $soumissionnaire_id
 * @property int $affaire_id
 * @property float $montant
 * @property string $delais
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Soumissionnaire $soumissionnaire
 * @property \App\Model\Entity\Affaire $affaire
 * @property \App\Model\Entity\Attribution[] $attributions
 */
class Soumission extends Entity
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
        'soumissionnaire_id' => true,
        'affaire_id' => true,
        'montant' => true,
        'delais' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'soumissionnaire' => true,
        'affaire' => true,
        'attributions' => true
    ];
}
