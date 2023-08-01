<?php

namespace App\Models;

use CodeIgniter\Model;

class SeputarGigiModel extends Model
{
    protected $table = 'tb_seputargigi';
    protected $allowedFields = ['headline', 'konten'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    //detail data artikel
    public function getDataArtikel($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else
            return $this->where(['id' => $id])->first();
    }

    //searching
    public function search($keyword)
    {
        return $this->table('tb_seputargigi')->like('headline', $keyword);
    }
}
