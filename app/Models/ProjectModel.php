<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table              = 'project';
    protected $primaryKey         = 'nameId';

    protected $useAutoIncrement   = true;

    // protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
        'nameId',
        'adminId',
        'thumbnail',
        'categorieId',
        'type',
        'titleEn',
        'titleFr',
        'titleNl',
        'descriptionEn',
        'descriptionFr',
        'descriptionNl',
        'contentEn',
        'contentFr',
        'contentNl',
    ];

    // protected $useTimestamps      = false;
    protected $createdField       = 'dateAdded';
    protected $updatedField       = 'lastUpdated';
    protected $deletedField       = 'dateDeleted';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    function getProjectsData(){
        $builder = $this->table('project');
        $builder->select('project.nameId as id');
        $builder->select('project.titleFr as title');
        $builder->select('project.dateAdded');
        $builder->select('project.lastUpdated');
        $builder->select('project.type');
        $builder->select('categorie.title as categorie');
        $builder->select('admin.name as author');
        $builder->join('categorie', 'categorieId = categorie.nameId');
        $builder->join('admin', 'adminId = admin.id');
        $result = $builder->findAll();
        return $result;
    }

    // function getProjectsTempData($adminId){
    //     $builder = $this->table('project');
    //     $builder->select('project.nameId');
    //     $builder->select('project.titleEn as title');
    //     $builder->select('categorie.title as categorie');
    //     $builder->join('categorie', 'categorieId = categorie.nameId');
    //     $builder->where("adminId = {$adminId}");
    //     $builder->where('type', 'draft');
    //     $result = $builder->findAll();
    //     return $result;
    // }
}