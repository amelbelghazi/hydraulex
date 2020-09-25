<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cheque Entity
 *
 * @property int $id
 * @property int $numero
 * @property int $etat
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 * @property int $achat_id
 * @property int $document_id
 *
 * @property \App\Model\Entity\Achat $achat
 */
class Cheque extends Entity
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
        'numero' => true,
        'etat' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'achat_id' => true,
        'document_id' => true,
        'achat' => true
    ];
}
