<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Status Entity
 *
 * @property int $id
 * @property int $task_id
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $modified_by
 * @property int $types_statu_id
 *
 * @property \App\Model\Entity\Task $task
 * @property \App\Model\Entity\TypesStatus $types_status
 */
class Status extends Entity
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
        'task_id' => true,
        'modified' => true,
        'modified_by' => true,
        'types_statu_id' => true,
        'task' => true,
        'types_status' => true
    ];
}
