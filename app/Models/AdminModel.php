<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = "admin";
    protected $primaryKey = "email";
    protected $allowedFields = ['username', 'password', 'nama_lengkap', 'token'];

    // fungsi untuk mengambil data sesuai parameter
    public function getData($parameter)
    {
        $builder = $this->table($this->table);
        $builder->where('username', $parameter);
        $builder->orwhere('email', $parameter);
        $query = $builder->get();
        return $query->getRowArray();
    }
    // fungsi untuk save/update data 
    public function updateData($data)
    {
        $builder = $this->table($this->table);
        if ($builder->save($data)) {
            return true;
        } else {
            return false;
        }
    }
}
