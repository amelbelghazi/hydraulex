<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CorrespondancesSortante Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $datecorrespondance
 * @property int $nombredocuments
 * @property int $destinataire_id
 * @property string $objet
 * @property string $observation 
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Destinataire $destinataire
 */
class CorrespondancesSortante extends Entity
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
        'datecorrespondance' => true,
        'nombredocuments' => true,
        'destinataire_id' => true,
        'objet' => true,
        'observation' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'destinataire' => true,
        'fichier' => true
    ];
}
