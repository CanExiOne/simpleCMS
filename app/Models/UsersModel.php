<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['firstName', 'lastName', 'email', 'password', 'group', 'isActive', 'lastLogin'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
