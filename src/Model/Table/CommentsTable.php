<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentsTable extends Table
{
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users');
        $this->hasMany('Replies');
    }
}

?>