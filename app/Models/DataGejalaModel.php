<?php

namespace App\Models;

use CodeIgniter\Model;

class DataGejalaModel extends Model
{
    protected $table      = 'tb_gejala';
    protected $allowedFields = ['kode_gejala', 'gejala'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    //detail data gejala
    public function getDataGejala($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else
            return $this->where(['id' => $id])->first();
    }

    //beranda, hitung gejala
    public function get_count()
    {
        $sql = "SELECT count(gejala) as gejala FROM tb_gejala";
        $result = $this->db->query($sql);
        return $result->getRow()->gejala;
    }

    //searching
    public function search($keyword)
    {
        return $this->table('tb_gejala')->like('kode_gejala', $keyword)->orLike('gejala', $keyword);
    }
}
