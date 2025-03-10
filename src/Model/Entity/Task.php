<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property string $name
 * @property string $status
 * @property \Cake\I18n\FrozenTime|null $date_created
 * @property \Cake\I18n\FrozenTime|null $updated_at
 */
class Task extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'description' => true, // ✅ Ensure this is set to `true`
        'status' => true,
        'due_date' => true,
        'created' => true,
        'modified' => true
    ];
}
