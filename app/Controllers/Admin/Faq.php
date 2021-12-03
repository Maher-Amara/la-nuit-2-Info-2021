<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminController;
use App\Models\Admin\AdminModel;
use App\Models\FaqModel;

class Faq extends AdminController
{
    public function index()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"FAQ",
            "navActive"=>"faq",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        $FaqModel = new FaqModel();

        $data = array(
            "faqs" => $FaqModel->findAll()
        );
        echo view('admin/parts/header', $header);
        echo view('admin/faq',$data);
        echo view('admin/parts/footer');
    }

    public function add()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Add FAQ",
            "navActive"=>"faq",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"FAQ",
                    "url"=>base_url('admin/faq')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/faq-add');
        echo view('admin/parts/footer');
    }

    public function add_validation()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Add FAQ",
            "navActive"=>"faq",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"FAQ",
                    "url"=>base_url('admin/faq')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/faq-add');
        echo view('admin/parts/footer');
    }

    public function update($id)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"{$id} - Update",
            "navActive"=>"faq",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"FAQ",
                    "url"=>base_url('admin/faq')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/faq-update');
        echo view('admin/parts/footer');
    }

    public function update_validation($id)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"{$id} - Update",
            "navActive"=>"faq",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"FAQ",
                    "url"=>base_url('admin/faq')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/faq-update');
        echo view('admin/parts/footer');
    }

    public function delete($id)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"{$id} - Delete",
            "navActive"=>"faq",
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
        echo view('admin/faq-delete');
        echo view('admin/parts/footer');
    }
}

