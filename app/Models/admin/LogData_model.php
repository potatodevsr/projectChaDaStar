<?php

namespace App\Models\admin;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\Database\RawSql;
use PHPSQLParser\Test\Parser\issue11Test;


class LogData_model extends Model
{
    protected $table = 'user_logs';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    function getById($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select("*");
        $builder->where('id', $id);
        $data = $builder->get()->getFirstRow();
        return $data;
    }
    // insert_data
    public function insert_data($params)
    {
        $data = [
            "action" => $params['action'],
            "message" => json_encode($params['message']),
            "module_id" => $params['module_id'],
            "create_by" => $_SESSION['user_data']->first_name . '' . $_SESSION['user_data']->last_name,
            "create_date" => date("Y-m-d H:i:s"),
        ];
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
        return json_encode($insert);
    }
}
