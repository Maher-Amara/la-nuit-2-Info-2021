<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminController;
use App\Models\Admin\AdminModel;
use App\Models\TestimonialModel;

class Testimonials extends AdminController
{
    public function index()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Testimonials",
            "navActive"=>"testimonials",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        $TestimonialModel = new TestimonialModel();

        $data = array(
            "testimonials" => $TestimonialModel->findAll(),
        );


        echo view('admin/parts/header', $header);
        echo view('admin/testimonials', $data);
        echo view('admin/parts/footer');
    }

    public function add()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Add testimonial",
            "navActive"=>"testimonials",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Testimonials",
                    "url"=>base_url('admin/testimonials')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/testimonial-add');
        echo view('admin/parts/footer');
    }

    public function add_validation()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Add testimonial",
            "navActive"=>"testimonials",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Testimonials",
                    "url"=>base_url('admin/testimonials')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/testimonial-add');
        echo view('admin/parts/footer');
    }

    public function update($id)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Testimonial {$id} - Update",
            "navActive"=>"testimonials",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Testimonials",
                    "url"=>base_url('admin/testimonials')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/testimonial-update');
        echo view('admin/parts/footer');
    }

    public function update_validation($id)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Testimonial {$id} - Update",
            "navActive"=>"testimonials",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Testimonials",
                    "url"=>base_url('admin/testimonials')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/testimonial-update');
        echo view('admin/parts/footer');
    }

    public function delete($id)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Testimonial {$id} - Delete",
            "navActive"=>"testimonials",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Testimonials",
                    "url"=>base_url('admin/testimonials')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );
        echo view('admin/parts/header', $header);
        echo view('admin/testimonial-delete');
        echo view('admin/parts/footer');
    }
}
