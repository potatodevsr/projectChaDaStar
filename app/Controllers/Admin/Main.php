<?php

namespace App\Controllers\Admin;

use App\Models\admin\Form_model;

class Main extends BaseAdminController
{
    public function __construct()
    {
        $this->Form_model = new Form_model();
    }
    public function dashboard(): string
    {
        // return view('Admin/dashboard');
        $view = [];
        $script_path = '';
        $this->template->set_js(script_tag($script_path));
        return $this->template->load_view_admin('dashboard', $view);
    }
    public function form_index(): string
    {
        $view = [];
        $view['title'] = 'ข้อมูลสมาชิก';
        $script_path = 'public/content_js/form.js';
        $this->template->set_js($script_path);
        return $this->template->load_view_admin('Form/index', $view);
    }
    public function getDatatable()
    {
        return $this->Form_model->getDatatable();
    }
    public function form_action()
    {
        $params = $this->request->getPost();
        // $params = $this->request->getGet();

        if ($params['mode'] == 'insert') {
            $insert = $this->Form_model->insert_data($params['data']);
            return json_encode($insert);
        }
        if ($params['mode'] == 'update') {
            $update = $this->Form_model->update_data($params['id'], $params['data']);
            return json_encode($update);
        }
        if ($params['mode'] == 'delete') {
            $delete = $this->Form_model->delete_data($params['id']);
            return json_encode($delete);
        }
        if ($params['mode'] == 'edit') {
            $data = $this->Form_model->getById($params['id']);
            return json_encode($data);
            // return $this->response->setJSON($data);
        }
    }
}
