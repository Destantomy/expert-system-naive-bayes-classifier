<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Result;
use CodeIgniter\Model;

class LogsModel extends Model
{
    protected $table = 'tb_akun';
    protected $allowedFields = ['username', 'status', 'gender', 'ages', 'password'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    //login
    public function login($username, $password)
    {
        return $this->db->table('tb_akun')->where([
            'username' => $username,
            'password' => $password
        ])->get()->getRowArray();
    }

    //beranda, hitung pengguna
    public function get_count()
    {
        $sql = "SELECT count(username) as username FROM tb_akun";
        $result = $this->db->query($sql);
        return $result->getRow()->username;
    }

    //detail data pengguna
    public function getDataPengguna($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else
            return $this->where(['id' => $id])->first();
    }

    //searching
    public function search($keyword)
    {
        return $this->table('tb_akun')->like('username', $keyword);
    }
}
