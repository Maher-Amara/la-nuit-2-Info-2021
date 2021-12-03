<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminController;
use App\Models\Admin\AdminModel;
use App\Models\Admin\AdminLogModel;

class Activity extends AdminController
{
    public function index()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Activity",
            "navActive"=>"activity",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        $AdminLogModel = new AdminLogModel();

        $data = array(
            "activitys" => $AdminLogModel->getAdminLog(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/activity', $data);
        echo view('admin/parts/footer');
    }
}
