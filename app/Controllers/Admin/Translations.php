<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminController;
use App\Models\Admin\AdminModel;
use App\Models\TranslationModel;

class Translations extends AdminController
{
    public function index($lg='fr')
    {
        $default = 'fr';
        $languages = array('fr', 'en', 'nl');

        if(!in_array($lg, $languages)){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Translations",
            "navActive"=>"translations",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        $TranslationModel = new TranslationModel();

        $data = array(
            'languages' => $languages,
            'default' => $default,
            'lg' => $lg,
            'translations' => $TranslationModel->getLanguageTranslation($lg),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/translations', $data);
        echo view('admin/parts/footer');
    }

    public function language_validation($lg)
    {
        $default = 'fr';
        $languages = array('fr', 'en', 'nl');

        if(!in_array($lg, $languages)){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Translations",
            "navActive"=>"translations",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        $TranslationModel = new TranslationModel();

        $data = array(
            'languages' => $languages,
            'default' => $default,
            'lg' => $lg,
            'translations' => $TranslationModel->getLanguageTranslation($lg),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/translations', $data);
        echo view('admin/parts/footer');
    }
}
