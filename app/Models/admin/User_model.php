<?php

namespace App\Models\admin;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\Database\RawSql;
use PHPSQLParser\Test\Parser\issue11Test;


class User_model extends Model
{
    protected $table = 'ref_users';

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
    // getdataTable
    public function getdataTable()
    {
        $builder = $this->db->table($this->table);
        $builder->select("id, first_name, last_name, email, password, update_date, status");
        $builder->orderBy('id', 'desc');

        return DataTable::of($builder)
            ->addNumbering('no')
            ->add('status', function ($row) {
                if ($row->status == 0) {
                    $status = '<button type="button" class="btn tool btn-xs btn-round btn-success"><i class="icon wb-check-mini" aria-hidden="true"></i>Open</button>';
                } else {
                    $status = '<button type="button" class="btn tool btn-xs btn-round btn-danger"><i class="icon wb-close-mini" aria-hidden="true"></i>Close</button>';
                }
                return $status;
            })
            ->add('tool', function ($row) {
                $tool = '<a type="button" href="' . ADMIN_URL . 'user/edit/' . $row->id . '" class="btn tool btn-xs btn-icon btn-primary btn-outline on-default edit-row"><i class="fa fa-edit" aria-hidden="true"></i></a>';
                $tool .= '<button onclick="action(' . $row->id . ',\'delete\')" type="button" class="btn tool btn-xs btn-icon btn-danger btn-outline on-default remove-row"><i class="fas fa-trash-alt"></i></button>';
                return $tool;
            })
            ->toJson(true);
    }
    // insert_data
    public function insert_data($params)
    {
        $data = [
            "first_name" => $params['first_name'],
            "last_name" => $params['last_name'],
            "email" => $params['email'],
            "password" => $params['password'],
            "status" => $params['status'],
            "create_date" => date("Y-m-d H:i:s"),
            "update_date" => date("Y-m-d H:i:s"),
        ];
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
        return json_encode($insert);
    }
    // update_data
    public function update_data($id, $params)
    {
        if ($id > 0) {
            $checkData = $this->getById($id);
            if (!empty($checkData)) {
                $data = [
                    "first_name" => $params['first_name'],
                    "last_name" => $params['last_name'],
                    "email" => $params['email'],
                    "password" => $params['password'],
                    "status" => $params['status'],
                    "update_date" => date("Y-m-d H:i:s"),
                ];
                $builder = $this->db->table($this->table);
                $builder->where('id', $id);
                $update = $builder->update($data);
                return $update;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // delete data
    public function delete_data($id)
    {
        if ($id > 0) {
            $builder = $this->db->table($this->table);
            $builder->where('id', $id);
            return $builder->delete();
        } else {
            return false;
        }
    }
}
