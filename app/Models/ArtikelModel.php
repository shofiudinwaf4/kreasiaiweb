<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = "artikel";
    protected $useTimestamp = true;
    protected $allowedFields = ['id_artikel', 'judul_artikel'];

    public function getArtikel($id = false)
    {
        if ($id == false) {
            return $this->find();
        }
        return $this->where(['id_artikel' => $id])->join('admin', 'admin.id_user=artikel.id_user', 'LEFT')
            ->orderBy('id_artikel', 'ASC')->first();
    }
    public function allData()
    {
        return $this->db->table('artikel')
            ->join('admin', 'admin.id_user=artikel.id_user', 'LEFT')
            ->orderBy('id_artikel', 'ASC')->get()->getResultArray();
    }
    public function DataLimit()
    {
        return $this->db->table('artikel')->join('admin', 'admin.id_user=artikel.id_user', 'LEFT')
            ->limit(8)->orderBy('id_artikel', 'DESC')
            ->get()->getResultArray();
    }
    public function DetailData($id_artikel)
    {
        return $this->db->table('artikel')
            ->join('admin', 'admin.id_user=artikel.id_user', 'LEFT')
            ->where(['id_artikel' => $id_artikel])
            ->get()->getRowArray();
    }
    public function DataByKategori($kategori)
    {
        return $this->table('tbl_berita')
            ->orderBy('id_berita', 'DESC')
            ->where('id_kategoriBerita', $kategori);
    }
    public function InsertData($data)
    {
        $this->db->table('artikel')->insert($data);
    }
    public function update_artikel($data, $id)
    {
        return $this->db->table($this->table)->update($data, array('id_artikel' => $id));
    }
    public function Delete_artikel($id_artikel)
    {
        $builder = $this->table($this->table);
        $builder->where('id_artikel', $id_artikel);
        if ($builder->delete()) {
            return true;
        } else {
            return false;
        }
    }
    public function search($keyword)
    {
        return $this->table($this->table)->like('judul_artikel', $keyword);
    }
}
