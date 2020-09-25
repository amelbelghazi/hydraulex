<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EquipesSoustraitant Entity
 *
 * @property int $id
 * @property int $equipe_id
 * @property int $projet_soustraitant_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Equipe $equipe
 * @property \App\Model\Entity\ProjetSoustraitant $projet_soustraitant
 */
class EquipesSoustraitant extends Entity
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
        'equipe_id' => true,
        'projet_soustraitant_id' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'equipe' => true,
        'projet_soustraitant' => true
    ];
}
