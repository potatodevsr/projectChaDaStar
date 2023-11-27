<?php

namespace App\Controllers\Admin;

use App\Models\admin\Address_model;

class Address extends BaseAdminController
{
    public function __construct()
    {
        $this->Address_model = new Address_model();
    }

    public function dashboard(): string
    {
        $view = [];
        $script_path = '';
        $this->template->set_js(script_tag($script_path));
        return $this->template->load_view_admin('dashboard', $view);
    }
    public function index(): string
    {
        $view = [];
        $view['title'] = 'ข้อมูลที่อยู่';

        $scripts = [
            'page' => ['public/content_js/address/address.js'],
            'action' => ['public/content_js/address/address_form.js'],
        ];

        $this->template->set_js($scripts);
        return $this->template->load_view_admin('Address/index', $view);
    }

    public function add_address()
    {
        $view = [];
        $this->template->set_js('public/content_js/address/address_form.js');
        return $this->template->load_view_admin('Address/form', $view);
    }

    public function edit_page($id)
    {
        $view = [];
        $view['data'] = $this->Address_model->getById($id);

        $this->template->set_js('public/content_js/address/address_form.js');
        return $this->template->load_view_admin('Address/form', $view);
    }

    public function getDatatable()
    {
        return $this->Address_model->getDatatable();
    }

    public function form_action()
    {
        $params = $this->request->getPost();
        if ($params['mode'] == 'insert') {
            $insert = $this->Address_model->insert_data($params['data']);
            return json_encode($insert);
        }
        if ($params['mode'] == 'update') {
            $update = $this->Address_model->update_data($params['id'], $params['data']);
            return json_encode($update);
        }
        if ($params['mode'] == 'delete') {
            $delete = $this->Address_model->delete_data($params['id']);
            return json_encode($delete);
        }
        if ($params['mode'] == 'edit') {
            $data = $this->Address_model->getById($params['id']);
            return json_encode($data);
        }
    }
}
