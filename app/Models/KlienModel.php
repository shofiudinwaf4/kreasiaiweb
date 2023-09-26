<?php

namespace App\Models;

use CodeIgniter\Model;

class KlienModel extends Model
{
    protected $table = "klien";
    protected $useTimestamp = true;
    protected $allowedFields = ['id_klien', 'nama_klien', 'logo_klien'];

    public function getKlien($id = false)
    {
        if ($id == false) {
            return $this->find();
        }
        return $this->where(['id_klien' => $id])->first();
    }
    public function Update_klien($data, $id)
    {
        return $this->db->table($this->table)->update($data, array('id_klien' => $id));
    }
    public function Delete_klien($id_klien)
    {
        $builder = $this->table($this->table);
        $builder->where('id_klien', $id_klien);
        if ($builder->delete()) {
            return true;
        } else {
            return false;
        }
    }
    public function search($keyword)
    {
        return $this->table($this->table)->like('nama_klien', $keyword);
    }
}
