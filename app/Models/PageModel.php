<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table              = 'page';
    protected $primaryKey         = 'name_id';

    protected $useAutoIncrement   = false;

    // protected $returnType         = 'array';
    // protected $useSoftDeletes     = true;

    protected $allowedFields      = ['id_parent', 'url', 'title', 'description', 'keywords', 'type', 'image', 'locate', 'img_width', 'img_height'];

    // protected $useTimestamps      = false;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}