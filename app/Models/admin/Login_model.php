<?php

namespace App\Models\admin;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\Database\RawSql;
use PHPSQLParser\Test\Parser\issue11Test;


class Login_model extends Model
{
    protected $table = 'ref_users';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getUserLogin($email, $password)
    {
        $builder = $this->db->table($this->table);
        $builder->select("first_name, last_name, email, password, status");
        $builder->where('email', $email);
        $builder->where('password', $password);
        $builder->where('status', 0);
        return $builder->get()->getFirstRow();
    }
}
