<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $id
 * @property int $partie_id
 * @property string $libelle
 * @property int $numero
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Party $party
 * @property \App\Model\Entity\DetailsArticle[] $details_article
 */
class Article extends Entity
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
        'partie_id' => true,
        'libelle' => true,
        'numero' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'party' => true,
        'details_article' => true
    ];
}
