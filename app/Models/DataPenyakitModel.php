<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPenyakitModel extends Model
{
    protected $table      = 'tb_penyakit';
    protected $allowedFields = ['kode_penyakit', 'penyakit', 'penanganan', 'probabilitas'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    //detail data artikel
    public function getDataPenyakit($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else
            return $this->where(['id' => $id])->first();
    }

    //beranda, hitung penyakit
    public function get_count()
    {
        $sql = "SELECT count(penyakit) as penyakit FROM tb_penyakit";
        $result = $this->db->query($sql);
        return $result->getRow()->penyakit;
    }

    //searching
    public function search($keyword)
    {
        return $this->table('tb_penyakit')->like('kode_penyakit', $keyword)->orLike('penyakit', $keyword);
    }
}
