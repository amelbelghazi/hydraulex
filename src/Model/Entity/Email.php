<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Email Entity
 *
 * @property int $id
 * @property string $destinataire
 * @property string $expediteur
 * @property string $objet
 * @property string $message
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property string $etat
 * @property \Cake\I18n\FrozenDate $dateenvoi
 *
 * @property \App\Model\Entity\Attachement[] $attachements
 */
class Email extends Entity
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
        'destinataire' => true,
        'expediteur' => true,
        'objet' => true,
        'message' => true,
        'created' => true,
        'modified' => true,
        'etat' => true,
        'dateenvoi' => true,
        'attachements' => true
    ];
}
