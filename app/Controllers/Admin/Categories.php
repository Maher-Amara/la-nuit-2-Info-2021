<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminController;
use App\Models\Admin\AdminModel;
use App\Models\CategorieModel;

class Categories extends AdminController
{
    public function index()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Categories",
            "navActive"=>"categories",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        $CategorieModel = new CategorieModel();

        $data = array(
            "categories" => $CategorieModel->getCategoriesData()
        );

        echo view('admin/parts/header', $header);
        echo view('admin/categories', $data);
        echo view('admin/parts/footer');
    }

    public function add()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Add categorie",
            "navActive"=>"categories",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Categories",
                    "url"=>base_url('admin/categories')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/categorie-add');
        echo view('admin/parts/footer');
    }

    public function add_validation()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Add categorie",
            "navActive"=>"categories",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Categories",
                    "url"=>base_url('admin/categories')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/categorie-add');
        echo view('admin/parts/footer');
    }

    public function update($categorieNameID)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"{$categorieNameID} - Update",
            "navActive"=>"categories",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Categories",
                    "url"=>base_url('admin/categories')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/categorie-update');
        echo view('admin/parts/footer');
    }

    public function update_validation($categorieNameID)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"{$categorieNameID} - Update",
            "navActive"=>"categories",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Categories",
                    "url"=>base_url('admin/categories')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/categorie-update');
        echo view('admin/parts/footer');
    }

    public function delete($categorieNameID)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"{$categorieNameID} - Delete",
            "navActive"=>"categories",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Categories",
                    "url"=>base_url('admin/categories')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/categorie-delete');
        echo view('admin/parts/footer');
    }
}
