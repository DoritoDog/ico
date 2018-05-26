<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Transfer extends Entity
{
    protected $_accessible = [
        'hash' => true,
        'from_address' => true,
        'to_address' => true,
        'amount' => true
    ];
}