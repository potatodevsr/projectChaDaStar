<?php

namespace App\Models\admin;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\Database\RawSql;
use PHPSQLParser\Test\Parser\issue11Test;


class Address_model extends Model
{
    protected $table = 'ref_address';

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
        $builder->select("id, street, city, state, zipcode, county,");

        return DataTable::of($builder)
            ->addNumbering('no')
            ->add('tool', function ($row) {
                $tool = '<a type="button" href="' . ADMIN_URL . 'address/edit/' . $row->id . '" class="btn tool btn-xs btn-icon btn-primary btn-outline on-default edit-row"><i class="fa fa-edit" aria-hidden="true"></i></a>';
                $tool .= '<button onclick="action(' . $row->id . ',\'delete\')" type="button" class="btn tool btn-xs btn-icon btn-danger btn-outline on-default remove-row"><i class="fas fa-trash-alt"></i></button>';
                return $tool;
            })
            ->toJson(true);
    }

    public function insert_data($params)
    {
        $data = [
            "street" => $params['street'],
            "city" => $params['city'],
            "state" => $params['state'],
            "zipcode" => $params['zipcode'],
            "county" => $params['county'],
            "create_date" => date("Y-m-d H:i:s"),
            "update_date" => date("Y-m-d H:i:s"),
        ];
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
        return json_encode($insert);
    }

    public function update_data($id, $params)
    {
        if ($id > 0) {
            $checkData = $this->getById($id);
            if (!empty($checkData)) {
                $data = [
                    "street" => $params['street'],
                    "city" => $params['city'],
                    "state" => $params['state'],
                    "zipcode" => $params['zipcode'],
                    "county" => $params['county'],
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
