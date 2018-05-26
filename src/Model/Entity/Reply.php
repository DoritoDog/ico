<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reply Entity
 *
 * @property int $id
 * @property int $comment_id
 * @property int $user_id
 * @property string $text
 * @property int $likes
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Comment $comment
 * @property \App\Model\Entity\User $user
 */
class Reply extends Entity
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
        'comment_id' => true,
        'user_id' => true,
        'text' => true,
        'likes' => true,
        'created' => true,
        'comment' => true,
        'user' => true
    ];
}
