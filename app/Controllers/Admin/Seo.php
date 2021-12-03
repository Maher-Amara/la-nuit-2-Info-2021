<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminController;
use App\Models\Admin\AdminModel;
use App\Models\PageModel;

class Seo extends AdminController
{
    public function index()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"SEO",
            "navActive"=>"seo",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        $PageModel = new PageModel();

        $data = array(
            "pages" => $PageModel->findAll()
        );

        echo view('admin/parts/header', $header);
        echo view('admin/seo', $data);
        echo view('admin/parts/footer');
    }

    public function page_meta($nameId)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"SEO",
            "navActive"=>"seo",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/seo-page-meta');
        echo view('admin/parts/footer');
    }

    public function update_page_meta($nameId)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"SEO",
            "navActive"=>"seo",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/seo-update');
        echo view('admin/parts/footer');
    }

    public function update_page_meta_validation($nameId)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"SEO",
            "navActive"=>"seo",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/seo');
        echo view('admin/parts/footer');
    }
}
