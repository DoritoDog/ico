<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class Story extends Entity
{
    protected $_accessible = [
        'author_id' => true,
        'background.jpg' => true,
        'title' => true,
        'slug' => true,
        'text' => true,
        'upvotes' => true,
        'downvotes' => true
    ];

    public function beforeSave($event, $entity, $options) {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }

    public function getAuthor() {
        $author = TableRegistry::get('Users')
            ->find()
            ->where(['id' => $this->author_id])
            ->firstOrFail();

        return $author;
    }
}