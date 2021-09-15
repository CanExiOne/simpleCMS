<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    protected $allowedFields = ['title', 'slug', 'content', 'delta', 'authorID'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getNews($slug = false) 
    {
        if($slug === false) {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['slug', $slug])
                    ->first();

    }
}
