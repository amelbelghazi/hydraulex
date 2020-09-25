<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MembresEquipe Entity
 *
 * @property int $id
 * @property int $membre_id
 * @property int $equipe_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Membre $membre
 * @property \App\Model\Entity\Equipe $equipe
 */
class MembresEquipe extends Entity
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
        'membre_id' => true,
        'equipe_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'membre' => true,
        'equipe' => true
    ];
}
