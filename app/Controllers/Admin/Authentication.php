<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminController;
use App\Models\Admin\AdminModel;

class Authentication extends AdminController
{
    /**
     * invitation based :
     * User admin gets an invitation email containing his credentials (automatically generated)
     * 2 types of admin : admin and super admin
     */
    
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function index()
    {
        $header = array(
            "title"=>"Admin - Login"
        );
        echo view('admin/auth/parts/header', $header);
        echo view('admin/auth/login');
        echo view('admin/auth/parts/footer');
    }

    public function login_validation()
    {
        $validation = $this->validate(
            [
                'email'=>'required|valid_email',
                'password'=>'required|min_length[5]|max_length[255]'
            ]
        );

        if ($validation){
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            $AdminModel = new AdminModel();
            $user_admin_info = $AdminModel->where('email', $email)->first();

            if ($user_admin_info){
                if (password_verify($password, $user_admin_info['password'])){
                    $this->setSession($user_admin_info);
                    return redirect()->to('/admin');
                }else{
                    session()->setFlashData('loginFail', "Your credentials doesn't mach our records.");
                }
            }else{
                session()->setFlashData('loginFail', "Your credentials doesn't mach our records.");
            }
        }

        $header = array(
            "title"=>"Admin - Login"
        );

        $data = array(
            'validation'=>$this->validator
        );

        echo view('admin/auth/parts/header', $header);
        echo view('admin/auth/login', $data);
        echo view('admin/auth/parts/footer');
    }

    public function forgot_password()
    {
        $header = array(
            "title"=>"Admin - Forgot password"
        );
        echo view('admin/auth/parts/header', $header);
        echo view('admin/auth/forgot-pass');
        echo view('admin/auth/parts/footer');
    }

    public function forgot_password_validation()
    {
        $header = array(
            "title"=>"Admin - Forgot password"
        );
        echo view('admin/auth/parts/header', $header);
        echo view('admin/auth/forgot-pass');
        echo view('admin/auth/parts/footer');
    }

    public function reset_password($token=NULL)
    {
        /**
         * reset password using emailed token
         * if token older then 15mn then send new one
         */
        if ($token){
            echo $token;
            exit();
        }
        
        $header = array(
            "title"=>"Admin - Register"
        );
        echo view('admin/auth/parts/header', $header);
        echo view('admin/auth/register');
        echo view('admin/auth/parts/footer');
        
    }

    public function reset_password_validation($token=NULL)
    {
        /**
         * reset password using emailed token
         * if token older then 15mn then send new one
         */
        if ($token){
            echo $token;
            exit();
        }
        
        $header = array(
            "title"=>"Admin - Register"
        );
        echo view('admin/auth/parts/header', $header);
        echo view('admin/auth/register');
        echo view('admin/auth/parts/footer');
        
    }

    protected function setSession($user)
    {
        session()->set('id', $user['id']);
        if ($user['superAdmin'] == 1){
            session()->set('superAdmin', True);
        }
    }

    public function logout()
    {
        if(session()->has('id')){
            session()->remove('id');
        }
        if(session()->has('superAdmin')){
            session()->remove('superAdmin');
        }
        session()->stop();
        session()->destroy();
        return redirect()->to('/admin/authentication');
    }
}
