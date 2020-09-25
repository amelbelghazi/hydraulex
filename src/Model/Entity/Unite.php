<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Unite Entity
 *
 * @property int $id
 * @property string $libelle
 * @property string $signe
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\ContraintesSoumission[] $contraintes_soumission
 * @property \App\Model\Entity\DetailsArticle[] $details_article
 * @property \App\Model\Entity\DetailsArticlesAvenant[] $details_articles_avenant
 * @property \App\Model\Entity\DetailsBonCommande[] $details_bon_commande
 * @property \App\Model\Entity\Produit[] $produits
 */
class Unite extends Entity
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
        'signe' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'contraintes_soumission' => true,
        'details_article' => true,
        'details_articles_avenant' => true,
        'details_bon_commande' => true,
        'produits' => true
    ];
}
