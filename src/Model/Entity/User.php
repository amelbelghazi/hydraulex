<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $role_id
 * @property int $societe_id
 * @property int $personnel_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Societe $societe
 * @property \App\Model\Entity\Personnel $personnel
 */
class User extends Entity
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
        'username' => true,
        'email' => true,
        'password' => true,
        'role_id' => true,
        'societe_id' => true,
        'personnel_id' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'societe' => true,
        'personnel' => true, 
        'photo' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
