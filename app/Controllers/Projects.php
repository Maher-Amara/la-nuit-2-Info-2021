<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\CategorieModel; 

class Projects extends BaseController
{
    public function index($lg='fr')
    {
        $ProjectModel = new ProjectModel();

        $projects = $ProjectModel->findAll();

        $header = array(
            "title"=>"Projects | Bathijs"
        );
        $data = array(
            'projects' => $projects
        );

        echo view('frontOffice/parts/header', $header);
        echo view('frontOffice/projects', $data);
        echo view('frontOffice/parts/footer');
    }

    public function categorie($categorieNameId=NULL, $lg='fr')
    {
        $CategorieModel = new CategorieModel();
        
        $categorie = $CategorieModel->where('nameId', $categorieNameId)->first();
        if (!$categorie){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        $ProjectModel = new ProjectModel();

        $projects = $ProjectModel->where('categorieId', $categorieNameId)->findAll();
        if (!$projects){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $header = array(
            "title"=>"{$categorie['title']} | Bathijs"
        );
        $data = array(
            "categorie"=> $categorie,
            "projects"=> $projects
        );
        echo view('frontOffice/parts/header', $header);
        echo view('frontOffice/project_categorie', $data);
        echo view('frontOffice/parts/footer');
    }

    public function view_project($projectNameId=Null ,$lg='fr')
    {
        $ProjectModel = new ProjectModel();

        $project = $ProjectModel->where('nameId', $projectNameId)->first();
        
        if (!$project){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $header = array(
            "title"=>"{$projectNameId} | Bathijs"
        );
        $data = array(
            "project"=> $project
        );
        echo view('frontOffice/parts/header', $header);
        echo view('frontOffice/project_view', $data);
        echo view('frontOffice/parts/footer');
    }
}
