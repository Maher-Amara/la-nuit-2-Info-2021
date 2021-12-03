<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminController;
use App\Models\Admin\AdminModel;
use App\Models\Admin\SettingsModel;

class Settings extends AdminController
{
    public function index()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Settings",
            "navActive"=>"settings",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        $SettingsModel = new SettingsModel();
        $settings = $SettingsModel->getSettings();

        $contact = array(
            'phone' => $settings['phone'],
            'fax' => $settings['fax'],
            'gsm' => $settings['gsm'],
            'email' => $settings['email'],
            'address' => $settings['address'],
        );

        $social = array(
            'facebook' => $settings['facebook'],
            'instagram' => $settings['instagram'],
            'linked_in' => $settings['linked_in'],
            'youtube' => $settings['youtube'],
        );

        $data = array(
            'contact' => $contact,
            'social' => $social,
        );

        echo view('admin/parts/header', $header);
        echo view('admin/settings', $data);
        echo view('admin/parts/footer');
    }
}
