<?php

namespace App\Controllers\Admin;

use App\Models\admin\Customer_model;
use CodeIgniter\Files\File;

class Customer extends BaseAdminController
{
    public function __construct()
    {
        $this->Customer_model = new Customer_model();
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
        $view['title'] = 'ข้อมูล customer';

        $scripts = [
            'page' => ['public/content_js/customer/customer.js'],
            'action' => ['public/content_js/customer/customer_form.js'],
        ];

        $this->template->set_js($scripts);

        return $this->template->load_view_admin('Customer/index', $view);
    }

    public function do_upload()
    {
        $config['upload_path']   = './path/to/upload/directory/';
        $config['allowed_types'] = 'png|jpg|gif';
        $config['max_size']      = 100;
        $config['max_width']     = 1024;
        $config['max_height']    = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            // File uploaded successfully, you can retrieve information if needed
            $uploadData = $this->upload->data();
            print_r($uploadData);
        } else {
            // Upload failed, retrieve error information
            $error = $this->upload->display_errors();
            echo $error;
        }
    }

    // getDatatable
    public function getDatatable()
    {
        return $this->Customer_model->getDatatable();
    }

    // add_customer
    public function add_customer()
    {
        $view = [];
        $this->template->set_js('public/content_js/customer/customer_form.js');
        return $this->template->load_view_admin('Customer/form', $view);
    }

    // form_action
    public function form_action()
    {
        $params = $this->request->getPost();
        $image = $this->request->getFile('image');
        if ($params['mode'] == 'insert') {
            $insert = $this->Customer_model->insert_data($params, $image);
            return json_encode($insert);
        }
        if ($params['mode'] == 'update') {
            $update = $this->Customer_model->update_data($params['id'], $params, $image);
            return json_encode($update);
        }
        if ($params['mode'] == 'delete') {
            $delete = $this->Customer_model->delete_data($params['id']);
            return json_encode($delete);
        }
        if ($params['mode'] == 'edit') {
            $data = $this->Customer_model->getById($params);
            return json_encode($data);
        }

        return json_encode(['error' => 'Invalid or missing "mode" parameter']);
    }

    // edit_page
    public function edit_page($id)
    {
        $view = [];
        $view['data'] = $this->Customer_model->getById($id);
        $this->template->set_js('public/content_js/customer/customer_form.js');
        return $this->template->load_view_admin('Customer/form', $view);
    }
}
