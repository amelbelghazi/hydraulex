<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Equipe Entity
 *
 * @property int $id
 * @property string $nom
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 *
 * @property \App\Model\Entity\EquipesPersonnel[] $equipes_personnel
 * @property \App\Model\Entity\EquipesSoustraitant[] $equipes_soustraitant
 * @property \App\Model\Entity\MembresEquipe[] $membres_equipe
 */
class Equipe extends Entity
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
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'equipes_personnel' => true,
        'equipes_soustraitant' => true,
        'membres_equipe' => true
    ];
}
