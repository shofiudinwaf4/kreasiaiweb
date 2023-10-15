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
    public function AllSosmed()
    {
        return $this->db->table('sosmed')
            ->get()->getResultArray();
    }
    public function UpdateData($data)
    {
        $this->db->table('perusahaan')
            ->where(['id_perusahaan' => $data['id_perusahaan']])
            ->update($data);
    }
    public function InsertData($data)
    {
        return $this->db->table('sosmed')->insert($data);
    }
    public function EditSosmed($id)
    {
        return $this->db->table('sosmed')
            ->where(['id_sosmed' => $id])
            ->get()->getRowArray();
    }
    public function UpdateSosmed($data)
    {
        $this->db->table('sosmed')
            ->where(['id_sosmed' => $data['id_sosmed']])
            ->update($data);
    }
    public function DeleteSosmed($data)
    {
        $this->db->table('sosmed')
            ->where(['id_sosmed' => $data['id_sosmed']])
            ->delete($data);
    }
}
