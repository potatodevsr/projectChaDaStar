<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

use App\Models\admin\LogData_model;


class Auth implements FilterInterface
{
    protected $response;

    public function __construct()
    {
        $this->LogData_model = new LogData_model();
        $this->response = Services::response();
    }
    public function before(RequestInterface $request, $arguments = null)
    {
        session();

            if (!isset($_SESSION['user_data'])) {
                return redirect()->to(BASE_URL . '/login');
            } elseif (empty($_SESSION['user_data'])) {
                return redirect()->to(BASE_URL . '/login');
            }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (isset($arguments[0]) && $arguments[0] == "action") {
            $dataLog_update = [];
            if ($_POST['mode'] == 'update') {
                $dataLog_update = [
                    'action' => $_POST['mode'],
                    "message" => $_POST['data'],
                    "module_id" => $arguments[1],
                ];
            }
            if ($_POST['mode'] == 'insert') {
                $dataLog_update = [
                    'action' => $_POST['mode'],
                    "message" => $_POST['data'],
                    "module_id" => $arguments[1],
                ];
            }
            if ($_POST['mode'] == 'delete') {
                $dataLog_update = [
                    'action' => $_POST['mode'],
                    "message" => ["id" => $_POST['id']],
                    "module_id" => $arguments[1],
                ];
            }
            $this->LogData_model->insert_data($dataLog_update);
        }
    }
}
