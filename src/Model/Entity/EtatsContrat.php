<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EtatsContrat Entity
 *
 * @property int $id
 * @property int $contrat_id
 * @property int $types_etats_contrat_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Contrat[] $contrats
 * @property \App\Model\Entity\TypesEtatsContrat $types_etats_contrat
 */
class EtatsContrat extends Entity
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
        'contrat_id' => true,
        'types_etats_contrat_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'contrats' => true,
        'types_etats_contrat' => true
    ];
}
