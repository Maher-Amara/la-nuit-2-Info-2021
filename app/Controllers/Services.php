<?php

namespace App\Controllers;

class Services extends BaseController
{
    public function index($lg='fr')
    {
        $header = array(
            "title"=>"Services | Bathijs"
        );
        echo view('frontOffice/parts/header', $header);
        echo view('frontOffice/services');
        echo view('frontOffice/parts/footer');
    }
}
