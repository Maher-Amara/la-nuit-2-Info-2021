<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminController;
use App\Models\Admin\AdminModel;

class Home extends AdminController
{
    public function index()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Dashboard",
            "navActive"=>"admin",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );
        echo view('admin/parts/header', $header);
        echo view('admin/home');
        echo view('admin/parts/footer');
    }
}

