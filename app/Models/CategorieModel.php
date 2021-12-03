<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorieModel extends Model
{
    protected $table              = 'categorie';
    protected $primaryKey         = 'nameId';

    protected $useAutoIncrement   = false;

    // protected $returnType         = 'array';
    // protected $useSoftDeletes     = true;

    protected $allowedFields      = ['nameId', 'title'];

    // protected $useTimestamps      = false;
    protected $createdField       = 'dateAdded';
    protected $updatedField       = 'lastUpdated';
    protected $deletedField       = 'dateDeleted';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    function getCategoriesData(){
        $builder = $this->table('categorie');
        $builder->select('categorie.nameId as id');
        $builder->select('categorie.title');
        $builder->select('categorie.dateAdded');
        $builder->select('categorie.lastUpdated');
        $builder->select('(select count(*) from project where categorieId = categorie.nameId) as nbrProjects');
        $result = $builder->findAll();
        return $result;
    }
}