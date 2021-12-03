<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminController;
use App\Models\Admin\AdminModel;

class Admins extends AdminController
{
    public function index()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Admins",
            "navActive"=>"admins",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        $data = array(
            "admins"=>$AdminModel->adminsDataTable()
        );

        echo view('admin/parts/header', $header);
        echo view('admin/admins', $data);
        echo view('admin/parts/footer');
    }
}
