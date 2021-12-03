<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table              = 'faq';
    protected $primaryKey         = 'id';

    protected $useAutoIncrement   = true;

    // protected $returnType         = 'array';
    // protected $useSoftDeletes     = true;

    protected $allowedFields      = ['question', 'answer'];

    // protected $useTimestamps      = false;
    protected $createdField       = 'dateAdded';
    protected $updatedField       = 'lastUpdated';
    protected $deletedField       = 'dateDeleted';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}