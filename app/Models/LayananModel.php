<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table = "layanan";
    protected $tableGaleri = "galeri_layanan";
    protected $tablePaket = "paket_layanan";
    protected $useTimestamp = true;
    protected $allowedFields = ['id_layanan', 'nama_layanan', 'detail_layanan', 'deskripsi_layanan', 'gambar_layanan'];
    protected $allowedFieldspaket = ['id_paket', 'id_layanan', 'nama_paket', 'detail_paket', 'harga_paket', 'diskon'];

    public function getLayanan($id = false)
    {
        if ($id == false) {
            return $this->find();
        }
        return $this->where(['id_layanan' => $id])->first();
    }
    public function Update_layanan($data, $id)
    {
        return $this->db->table($this->table)->update($data, array('id_layanan' => $id));
    }
    public function Delete_layanan($id_layanan)
    {
        $builder = $this->table($this->table);
        $builder->where('id_layanan', $id_layanan);
        if ($builder->delete()) {
            return true;
        } else {
            return false;
        }
    }
    public function search($keyword)
    {
        return $this->table($this->table)->like('nama_layanan', $keyword);
    }
    public function GaleriInsert($data)
    {
        return $this->db->table($this->tableGaleri)->insert($data);
    }
    public function getGaleri($id = false)
    {

        $builder = $this->db->table($this->tableGaleri);
        $builder->select('*');
        $builder->join('layanan', 'layanan.id_layanan=galeri_layanan.id_layanan');
        $query = $builder->where('galeri_layanan.id_layanan', $id)->get();
        return $query->getResultArray();
    }
    // public function getAllPaket()
    // {
    //     $builder = $this->db->table($this->tablePaket);
    //     $builder->select('*');
    //     $builder->join('layanan', 'layanan.id_layanan=paket_layanan.id_layanan');
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }

    public function getPaket($id = false)
    {

        $builder = $this->db->table($this->tablePaket);
        $builder->select('*');
        $builder->join('layanan', 'layanan.id_layanan=paket_layanan.id_layanan');
        $query = $builder->where('paket_layanan.id_layanan', $id)->get();
        return $query->getResultArray();
    }
    public function getEditPaket($id)
    {
        $builder = $this->db->table($this->tablePaket);
        $builder->select('*');
        $builder->join('layanan', 'layanan.id_layanan=paket_layanan.id_layanan');
        $query = $builder->where('paket_layanan.id_paket', $id)->get();
        return $query->getRowArray();
    }
    public function UpdatePaket($data, $id)
    {
        return $this->db->table($this->tablePaket)->update($data, array('id_paket' => $id));
    }
    public function PaketInsert($data)
    {
        return $this->db->table($this->tablePaket)->insert($data);
    }
    public function Delete_paket($id_paket)
    {
        $builder = $this->table($this->tablePaket);
        $builder->where('id_paket', $id_paket);
        if ($builder->delete()) {
            return true;
        } else {
            return false;
        }
    }
}
