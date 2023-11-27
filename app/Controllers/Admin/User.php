<?php

namespace App\Controllers\Admin;

use App\Models\admin\User_model;

class User extends BaseAdminController
{
    public function __construct()
    {
        $this->User_model = new User_model();
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
        $view['title'] = 'ข้อมูล user';

        $scripts = [
            'page' => ['public/content_js/user/user.js'],
            'action' => ['public/content_js/user/user_form.js'],
        ];

        $this->template->set_js($scripts); // this is how you import 2 and more

        return $this->template->load_view_admin('User/index', $view);
    }
    // getDatatable
    public function getDatatable()
    {
        return $this->User_model->getDatatable();
    }
    // form_action
    public function form_action()
    {
        $params = $this->request->getPost();
        if ($params['mode'] == 'insert') {
            $insert = $this->User_model->insert_data($params['data']);
            return json_encode($insert);
        }
        if ($params['mode'] == 'update') {
            $update = $this->User_model->update_data($params['id'], $params['data']);
            return json_encode($update);
        }
        if ($params['mode'] == 'delete') {
            $delete = $this->User_model->delete_data($params['id']);
            return json_encode($delete);
        }
        if ($params['mode'] == 'edit') {
            $data = $this->User_model->getById($params['id']);
            return json_encode($data);
        }
    }
    // add_user
    public function add_user()
    {
        $view = [];
        $this->template->set_js('public/content_js/user/user_form.js');
        return $this->template->load_view_admin('User/form', $view);
    }
    // edit_page
    public function edit_page($id)
    {
        $view = [];
        $view['data'] = $this->User_model->getById($id);
        $this->template->set_js('public/content_js/user/user_form.js');
        return $this->template->load_view_admin('User/form', $view);
    }
}
