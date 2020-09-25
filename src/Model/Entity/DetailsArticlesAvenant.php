<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetailsArticlesAvenant Entity
 *
 * @property int $id
 * @property int $articles_avenant_id
 * @property int $qte
 * @property int $unite_id
 * @property float $prix
 * @property \Cake\I18n\FrozenDate $datedetailsavenant
 * @property int $soustraitant_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\ArticlesAvenant $articles_avenant
 * @property \App\Model\Entity\Unite $unite
 * @property \App\Model\Entity\Soustraitant $soustraitant
 * @property \App\Model\Entity\AttachementsTravauxAvenant[] $attachements_travaux_avenants
 */
class DetailsArticlesAvenant extends Entity
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
        'articles_avenant_id' => true,
        'qte' => true,
        'unite_id' => true,
        'prix' => true,
        'datedetailsavenant' => true,
        'soustraitant_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'articles_avenant' => true,
        'unite' => true,
        'soustraitant' => true,
        'attachements_travaux_avenants' => true
    ];
}
