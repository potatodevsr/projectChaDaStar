<?php

namespace App\Controllers\Admin;

use App\Models\admin\Login_model;

class Login extends BaseAdminController
{
    public function __construct()
    {
        $this->Login_model = new Login_model();
        $this->session = \Config\Services::session();
    }

    public function dashboard(): string
    {
        $view = [];
        $script_path = '';
        $this->template->set_js(script_tag($script_path));
        return $this->template->load_view_admin('dashboard', $view);
    }
    // index
    public function index(): string
    {
        $view = [];
        $scripts = [
            'page' => ['public/content_js/login.js'],
        ];

        $this->template->set_js($scripts);
        return $this->template->load_view_nosidebar('login', $view);
    }


    public function getUserLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $this->Login_model->getUserLogin($email, $password);

        if ($user) {
            session();
            $this->session->set('user_data', $user);

            return $this->response->setJSON($user);
        } else {
            return $this->response->setJSON(['error' => 'Invalid email, password, or status is not open']);
        }
    }
}
