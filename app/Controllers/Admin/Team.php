<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminController;
use App\Models\Admin\AdminModel;
use App\Models\TeamModel;

class Team extends AdminController
{
    public function index()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Team",
            "navActive"=>"team",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        $TeamModel = new TeamModel();

        $data = array(
            "team"=> $TeamModel->findAll()
        );

        echo view('admin/parts/header', $header);
        echo view('admin/team', $data);
        echo view('admin/parts/footer');
    }

    public function add()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Add member",
            "navActive"=>"team",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Team",
                    "url"=>base_url('admin/team')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/team-add');
        echo view('admin/parts/footer');
    }

    public function add_validation()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Add member",
            "navActive"=>"team",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Team",
                    "url"=>base_url('admin/team')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/team-add');
        echo view('admin/parts/footer');
    }

    public function update($id)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Member {$id} - Update",
            "navActive"=>"team",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Team",
                    "url"=>base_url('admin/team')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/team-update');
        echo view('admin/parts/footer');
    }

    public function update_validation($id)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Member {$id} - Update",
            "navActive"=>"team",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Team",
                    "url"=>base_url('admin/team')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/team-update');
        echo view('admin/parts/footer');
    }

    public function delete($id)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Member {$id} - Delete",
            "navActive"=>"testimonials",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Team",
                    "url"=>base_url('admin/team')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );
        echo view('admin/parts/header', $header);
        echo view('admin/team-delete');
        echo view('admin/parts/footer');
    }
}
