<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class StoriesTable extends Table
{
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->hasMany('Comments');
        $this->belongsTo('Users');
    }
}

?>