<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetailsAttachement Entity
 *
 * @property int $id
 * @property int $Attachements_Travail_id
 * @property int $details_article_id
 * @property int $qte
 * @property \Cake\I18n\FrozenDate $dateattachement
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\AttachementsTravail $attachements_travail
 * @property \App\Model\Entity\DetailsArticle $details_article
 */
class DetailsAttachement extends Entity
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
        'Attachements_Travail_id' => true,
        'details_article_id' => true,
        'qte' => true,
        'dateattachement' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'attachements_travail' => true,
        'details_article' => true
    ];
}
