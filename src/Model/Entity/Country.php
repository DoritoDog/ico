<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Country extends Entity
{
    protected $_accessible = [
        'code' => true,
        'name' => true
    ];
}