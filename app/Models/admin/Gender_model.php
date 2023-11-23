<?php

namespace App\Models\admin;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\Database\RawSql;
use PHPSQLParser\Test\Parser\issue11Test;


class Gender_model extends Model
{
    protected $table = 'ref_gender';

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
    public function  getdataTable()
    {
        $builder = $this->db->table($this->table);
        $builder->select("id, sex, status");
        return DataTable::of($builder)
            ->addNumbering('no')
            ->add('tool', function ($row) {
                $tool = '<button type="button" onclick="action(' . $row->id . ',\'edit\')" class="btn tool btn-xs btn-icon btn-primary btn-outline on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></button>';
                $tool .= '<button onclick="action(' . $row->id . ',\'delete\')" type="button" class="btn  tool btn-xs btn-icon btn-danger btn-outline on-default remove-row" data-toggle="tooltip" data-original-title="Remove"><i class="fas fa-trash-alt"></i></button>';
                return $tool;
            })
            ->toJson(true);
    }
    public function insert_data($params)
    {
        $data = [
            "sex" => $params['sex'],
            "status" => $params['status'],
            "create_date" => date("Y-m-d H:i:s"),
            "update_date" => date("Y-m-d H:i:s"),
        ];
        $builder = $this->db->table($this->table);
        try {
            $insert = $builder->insert($data);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
        return $insert;
    }
    public function update_data($id, $params)
    {
        if ($id > 0) {
            $checkData = $this->getById($id);
            if (!empty($checkData)) {
                $data = [
                    "sex" => $params['sex'],
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
