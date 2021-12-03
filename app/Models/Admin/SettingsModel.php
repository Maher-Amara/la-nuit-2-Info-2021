<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table              = 'settings';
    protected $primaryKey         = 'nameId';

    protected $useAutoIncrement   = true;

    // protected $returnType         = 'array';
    // protected $useSoftDeletes     = true;

    protected $allowedFields      = [];

    // protected $useTimestamps      = false;
    // protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    // protected $deletedField       = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    function getSettings(){
        /** get last months admin log */

        $builder = $this->table('settings');
        $builder->select('nameId');
        $builder->select('value');
        $result = $builder->findAll();

        $settings = array();
        foreach($result as $row){
            $settings[$row['nameId']] = $row['value'];
        }

        return $settings;
    }
}