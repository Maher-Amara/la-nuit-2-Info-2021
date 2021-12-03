<?php

namespace App\Models;

use CodeIgniter\Model;

class LanguageModel extends Model
{
    protected $table              = 'language';
    protected $primaryKey         = 'languageId';

    protected $useAutoIncrement   = false;

    // protected $returnType         = 'array';
    // protected $useSoftDeletes     = true;

    protected $allowedFields      = [];

    // protected $useTimestamps      = false;
    // protected $createdField       = 'created_at';
    // protected $updatedField       = 'updated_at';
    // protected $deletedField       = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}