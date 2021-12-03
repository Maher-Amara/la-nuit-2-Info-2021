<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminLogModel extends Model
{
    protected $table              = 'admin_log';
    protected $primaryKey         = 'id';

    protected $useAutoIncrement   = true;

    // protected $returnType         = 'array';
    // protected $useSoftDeletes     = true;

    protected $allowedFields      = [];

    // protected $useTimestamps      = false;
    protected $createdField       = 'created_at';
    // protected $updatedField       = 'updated_at';
    // protected $deletedField       = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    function getAdminLog(){
        /** get last months admin log */
        $builder = $this->table('admin_log');
        $builder->select('admin_log.title');
        $builder->select('admin_log.description');
        $builder->select('admin_log.created_at');
        $builder->select('admin_log.type');
        $builder->select('admin_log.adminId');
        $builder->select('admin.name');
        $builder->join('admin', 'adminId = admin.id');
        $builder->where('admin_log.created_at >= NOW() - 2592000');
        $result = $builder->findAll();
        return $result;
    }
}