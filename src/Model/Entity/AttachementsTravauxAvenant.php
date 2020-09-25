<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AttachementsTravauxAvenant Entity
 *
 * @property int $id
 * @property int $details_articles_avenant_id
 * @property int $qte
 * @property \Cake\I18n\FrozenDate $dateattachementavenant
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\DetailsArticlesAvenant $details_articles_avenant
 */
class AttachementsTravauxAvenant extends Entity
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
        'details_articles_avenant_id' => true,
        'qte' => true,
        'dateattachementavenant' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'details_articles_avenant' => true
    ];
}
