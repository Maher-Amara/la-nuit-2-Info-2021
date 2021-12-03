<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    protected $table              = 'testimonial';
    protected $primaryKey         = 'id';

    protected $useAutoIncrement   = true;

    // protected $returnType         = 'array';
    // protected $useSoftDeletes     = true;

    protected $allowedFields      = ['nom', 'status', 'image', 'saying'];

    // protected $useTimestamps      = false;
    protected $createdField       = 'dateAdded';
    protected $updatedField       = 'lastUpdated';
    protected $deletedField       = 'dateDeleted';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}