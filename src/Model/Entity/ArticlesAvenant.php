<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ArticlesAvenant Entity
 *
 * @property int $id
 * @property int $parties_avenant_id
 * @property string $intitule
 * @property int $numero
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\PartiesAvenant $parties_avenant
 * @property \App\Model\Entity\DetailsArticlesAvenant[] $details_articles_avenants
 */
class ArticlesAvenant extends Entity
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
        'parties_avenant_id' => true,
        'libelle' => true,
        'numero' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'parties_avenant' => true,
        'details_articles_avenants' => true
    ];
}
