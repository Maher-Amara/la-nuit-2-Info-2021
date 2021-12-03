<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index($lg='fr')
    {
        $header = array(
            "title"=>"Contact | Bathijs"
        );
        $data = array(
            "type" => NULL
        );
        echo view('frontOffice/parts/header', $header);
        echo view('frontOffice/contact', $data);
        echo view('frontOffice/parts/footer');
    }

    public function quote($lg='fr')
    {
        $header = array(
            "title"=>"Contact | Bathijs"
        );
        $data = array(
            "type" => 'request quote'
        );
        echo view('frontOffice/parts/header', $header);
        echo view('frontOffice/contact', $data);
        echo view('frontOffice/parts/footer');
    }
}
