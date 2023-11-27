<?php

namespace App\Models\admin;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\Database\RawSql;
use PHPSQLParser\Test\Parser\issue11Test;


class Customer_model extends Model
{
    protected $table = 'ref_customer';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    // getById
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
        $builder->select("id, first_name, last_name, phone, image, image_type, update_date");
        $builder->orderBy('id', 'desc');

        return DataTable::of($builder)
            ->addNumbering('no')
            ->edit('image', function ($row) {
                // Assuming 'image' is a column in the database containing base64-encoded image data
                $imageSrc = 'data:' . $row->image_type . ';base64,' . $row->image;

                return '<img src="' . $imageSrc . '" alt="Image" width="50" height="50">';
            })
            ->add('tool', function ($row) {
                $tool = '<a type="button" href="' . ADMIN_URL . 'customer/edit/' . $row->id . '" class="btn tool btn-xs btn-icon btn-primary btn-outline on-default edit-row"><i class="fa fa-edit" aria-hidden="true"></i></a>';
                $tool .= '<button onclick="action(' . $row->id . ',\'delete\')" type="button" class="btn  tool btn-xs btn-icon btn-danger btn-outline on-default remove-row" data-toggle="tooltip" data-original-title="Remove"><i class="fas fa-trash-alt"></i></button>';
                return $tool;
            })
            ->toJson(true);
    }

    // insert_data
    public function insert_data($params, $image)
    {
        $data = [
            "first_name" => $params['first_name'],
            "last_name" => $params['last_name'],
            "phone" => $params['phone'],
            "image" => base64_encode(file_get_contents($image->getTempName())),
            "image_type" => $image->getMimeType(),
            "image_filename" => $image->getClientName(),
            "create_date" => date("Y-m-d H:i:s"),
            "update_date" => date("Y-m-d H:i:s"),
        ];
        $builder = $this->db->table($this->table);
        $insert = $builder->insert($data);
        return json_encode($insert);
    }

    // update_data
    public function update_data($id, $params, $image)
    {
        if ($id > 0) {
            $checkData = $this->getById($id);

            if (!empty($checkData)) {
                $data = [
                    "first_name" => $params['first_name'],
                    "last_name" => $params['last_name'],
                    "phone" => $params['phone'],
                    "update_date" => date("Y-m-d H:i:s"),
                ];

                if ($image->isValid()) {
                    $data['image'] = base64_encode(file_get_contents($image->getTempName()));
                    $data['image_type'] = $image->getMimeType();
                    $data['image_filename'] = $image->getClientName();
                }
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

    // delete_data
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
