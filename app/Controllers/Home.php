<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index($lg='fr')
    {
        $header = array(
            "title"=>"Home | Bathijs"
        );
        echo view('frontOffice/parts/header', $header);
        echo view('frontOffice/home');
        echo view('frontOffice/parts/footer');
    }
}
