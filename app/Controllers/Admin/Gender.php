<?php

namespace App\Controllers\Admin;

use App\Models\admin\Gender_model;

class Gender extends BaseAdminController
{
    public function __construct()
    {
        $this->Gender_model = new Gender_model();
    }

    public function index(): string
    {
        $view = [];
        $script_path = 'public/content_js/gender.js';
        $this->template->set_js($script_path);
        return $this->template->load_view_admin('Gender/index', $view);
    }
    public function getDatatable()
    {
        return $this->Gender_model->getDatatable();
    }
    public function form_action()
    {
        $params = $this->request->getPost();
        // $params = $this->request->getGet();

        if ($params['mode'] == 'insert') {
            $insert = $this->Gender_model->insert_data($params['data']);
            return json_encode($insert);
        }
        if ($params['mode'] == 'update') {
            $update = $this->Gender_model->update_data($params['id'], $params['data']);
            return json_encode($update);
        }
        if ($params['mode'] == 'delete') {
            $delete = $this->Gender_model->delete_data($params['id']);
            return json_encode($delete);
        }
        if ($params['mode'] == 'edit') {
            $data = $this->Gender_model->getById($params['id']);
            return json_encode($data);
            // return $this->response->setJSON($data);
        }
    }
}
