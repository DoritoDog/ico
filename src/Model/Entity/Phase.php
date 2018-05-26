<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Phase Entity
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $goal
 * @property int $funds_raised
 * @property \Cake\I18n\FrozenTime $deadline
 * @property \Cake\I18n\FrozenTime $created
 */
class Phase extends Entity
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
        'title' => true,
        'text' => true,
        'goal' => true,
        'funds_raised' => true,
        'deadline' => true,
        'created' => true
    ];
}
