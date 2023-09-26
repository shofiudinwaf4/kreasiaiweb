<?php

namespace App\Models;

use CodeIgniter\Model;

class PerusahaanModel extends Model
{
    public function DetailData()
    {
        return $this->db->table('perusahaan')
            ->where('id_perusahaan', 1)
            ->get()->getRowArray();
    }
    public function UpdateData($data)
    {
        $this->db->table('perusahaan')
            ->where(['id_perusahaan' => $data['id_perusahaan']])
            ->update($data);
    }
}
