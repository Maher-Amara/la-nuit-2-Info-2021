<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table              = 'admin';
    protected $primaryKey         = 'username';

    protected $useAutoIncrement   = false;

    // protected $returnType         = 'array';
    // protected $useSoftDeletes     = true;

    protected $allowedFields      = ['name', 'email', 'phoneNumber', 'permition', 'avatar', 'superAdmin'];

    // protected $useTimestamps      = false;
    protected $createdField       = 'dateAdded';
    protected $updatedField       = 'lastUpdated';
    protected $deletedField       = 'dateDeleted';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    function count_pending_authorisations(){
        return 1;
    }

    function adminsDataTable(){
        $builder = $this->table('admin');
        $builder->select('id');
        $builder->select('name');
        $builder->select('email');
        $builder->select('phoneNumber');
        $builder->select('superAdmin');
        $result = $builder->findAll();
        return $result;
    }
}