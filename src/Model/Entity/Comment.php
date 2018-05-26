<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class Comment extends Entity
{
    protected $_accessible = [
        'id' => true,
        'user_id' => true,
        'story_id' => true,
        'text' => true,
        'created' => true,
        'likes' => true
    ];
}