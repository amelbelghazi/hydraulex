<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MaitresOeuvre Entity
 *
 * @property int $id
 * @property string $nom
 * @property string $adresse
 * @property string $numeroFixe
 * @property string $numeroPortable
 * @property string $fax
 * @property string $nif
 * @property string $nis
 * @property string $nrcf
 * @property string $article
 * @property string $compte
 * @property string $email
 * @property string $agence
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $create_by
 * @property int $modified_by
 */
class MaitresOeuvre extends Entity
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
        'nom' => true,
        'adresse' => true,
        'numeroFixe' => true,
        'numeroPortable' => true,
        'fax' => true,
        'nif' => true,
        'nis' => true,
        'nrcf' => true,
        'article' => true,
        'compte' => true,
        'email' => true,
        'agence' => true,
        'created' => true,
        'modified' => true,
        'create_by' => true,
        'modified_by' => true
    ];
}
