<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKepakaranModel extends Model
{
    protected $table      = 'tb_kepakaran';
    protected $allowedFields = ['kode_penyakit', 'penyakit', 'gejala', 'penanganan', 'probabilitas'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    //detail data artikel
    public function getDataPakar($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else
            return $this->where(['id' => $id])->first();
    }

    //searching
    public function search($keyword)
    {
        return $this->table('tb_kepakaran')->like('kode_penyakit', $keyword)->orLike('penyakit', $keyword);
    }

    //beranda, hitung kepakaran
    public function get_count()
    {
        $sql = "SELECT count(id) as id FROM tb_kepakaran";
        $result = $this->db->query($sql);
        return $result->getRow()->id;
    }

    //algoritma naive bayes classifier--start
    //kosongkan tmp_gejala
    public function emptyTmpGejala()
    {
        $builder = $this->db->table('tmp_gejala');
        $query = $builder->emptyTable('tmp_gejala');
        return $query;
    }

    //kosongkan tmp_hitung
    public function emptyTmpHitung()
    {
        $builder = $this->db->table('tmp_hitung');
        $query = $builder->emptyTable('tmp_hitung');
        return $query;
    }

    //input gejala terpilih ke tmp_gejala
    public function insertTmpGejala($periksa)
    {
        $builder = $this->db->table('tmp_gejala');
        foreach ($periksa as $p) {
            $data = [
                'gejala' => $p
            ];
            $builder->insert($data);
        }
    }

    //menampilkan gejala terpilih
    public function showTmpGejala()
    {
        $builder = $this->db->table('tmp_gejala');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    //input ke tmp_hitung
    public function insertTmpHitung()
    {
        $builder = "INSERT INTO tmp_hitung (kode_penyakit, penyakit, gejala, penanganan, probabilitas)
        SELECT tb_kepakaran.kode_penyakit AS kode_penyakit, tb_kepakaran.penyakit AS penyakit, tmp_gejala.gejala AS gejala, tb_kepakaran.penanganan AS penanganan, tb_kepakaran.probabilitas AS probabilitas
        FROM tb_kepakaran
        JOIN tmp_gejala ON tmp_gejala.gejala = tb_kepakaran.gejala";
        return $this->db->query($builder);

        // $query =  $this->db->table('tb_kepakaran')
        //     ->select('tb_kepakaran.kode_penyakit, tb_kepakaran.penyakit, tmp_gejala.gejala, tb_kepakaran.probabilitas')
        //     ->join('tmp_gejala', 'tb_kepakaran.gejala = tmp_gejala.gejala')
        //     ->get();
        // return $query;
    }

    //perhitungan probabilitas tiap penyakit
    //perhitungan penyakit P01
    public function probabilitas1()
    {
        $builder = $this->db->table('tmp_hitung');
        $builder->select('*');
        $builder->where('kode_penyakit', 'P01');
        $probability = $builder->get()->getResult();
        //inisialisasi total probabilitas
        $n = 1;
        foreach ($probability as $prob) {
            $n = $n * $prob->probabilitas;
        }
        //perhitungan hasil bayes P01
        $builder = $this->db->table('tb_penyakit');
        $builder->select('*');
        $builder->where('kode_penyakit', 'P01');
        $data = $builder->get()->getResult();
        foreach ($data as $row) {
            $bayes = $n * $row->probabilitas;
        }
        return $bayes;
    }
    //perhitungan penyakit P02
    public function probabilitas2()
    {
        $builder = $this->db->table('tmp_hitung');
        $builder->select('*');
        $builder->where('kode_penyakit', 'P02');
        $probability = $builder->get()->getResult();
        //inisialisasi total probabilitas
        $n = 1;
        foreach ($probability as $prob) {
            $n = $n * $prob->probabilitas;
        }
        //perhitungan hasil bayes P02
        $builder = $this->db->table('tb_penyakit');
        $builder->select('*');
        $builder->where('kode_penyakit', 'P02');
        $data = $builder->get()->getResult();
        foreach ($data as $row) {
            $bayes = $n * $row->probabilitas;
        }
        return $bayes;
    }
    //perhitungan penyakit P03
    public function probabilitas3()
    {
        $builder = $this->db->table('tmp_hitung');
        $builder->select('*');
        $builder->where('kode_penyakit', 'P03');
        $probability = $builder->get()->getResult();
        //inisialisasi total probabilitas
        $n = 1;
        foreach ($probability as $prob) {
            $n = $n * $prob->probabilitas;
        }
        //perhitungan hasil bayes P03
        $builder = $this->db->table('tb_penyakit');
        $builder->select('*');
        $builder->where('kode_penyakit', 'P03');
        $data = $builder->get()->getResult();
        foreach ($data as $row) {
            $bayes = $n * $row->probabilitas;
        }
        return $bayes;
    }
    //perhitungan penyakit P04
    public function probabilitas4()
    {
        $builder = $this->db->table('tmp_hitung');
        $builder->select('*');
        $builder->where('kode_penyakit', 'P04');
        $probability = $builder->get()->getResult();
        //inisialisasi total probabilitas
        $n = 1;
        foreach ($probability as $prob) {
            $n = $n * $prob->probabilitas;
        }
        //perhitungan hasil bayes P04
        $builder = $this->db->table('tb_penyakit');
        $builder->select('*');
        $builder->where('kode_penyakit', 'P04');
        $data = $builder->get()->getResult();
        foreach ($data as $row) {
            $bayes = $n * $row->probabilitas;
        }
        return $bayes;
    }
    //perhitungan penyakit P05
    public function probabilitas5()
    {
        $builder = $this->db->table('tmp_hitung');
        $builder->select('*');
        $builder->where('kode_penyakit', 'P05');
        $probability = $builder->get()->getResult();
        //inisialisasi total probabilitas
        $n = 1;
        foreach ($probability as $prob) {
            $n = $n * $prob->probabilitas;
        }
        //perhitungan hasil bayes P05
        $builder = $this->db->table('tb_penyakit');
        $builder->select('*');
        $builder->where('kode_penyakit', 'P05');
        $data = $builder->get()->getResult();
        foreach ($data as $row) {
            $bayes = $n * $row->probabilitas;
        }
        return $bayes;
    }
    //perhitungan penyakit P06
    public function probabilitas6()
    {
        $builder = $this->db->table('tmp_hitung');
        $builder->select('*');
        $builder->where('kode_penyakit', 'P06');
        $probability = $builder->get()->getResult();
        //inisialisasi total probabilitas
        $n = 1;
        foreach ($probability as $prob) {
            $n = $n * $prob->probabilitas;
        }
        //perhitungan hasil bayes P06
        $builder = $this->db->table('tb_penyakit');
        $builder->select('*');
        $builder->where('kode_penyakit', 'P06');
        $data = $builder->get()->getResult();
        foreach ($data as $row) {
            $bayes = $n * $row->probabilitas;
        }
        return $bayes;
    }
    //update hasil probabilitas pada tmp_hitung

    public function hasil_prob1($P1)
    {
        $hasilP1 = ['hasil_probabilitas' => $P1];
        $builder = $this->db->table('tmp_hitung');
        $builder->where('kode_penyakit', 'P01');
        $builder->update($hasilP1);
    }
    public function hasil_prob2($P2)
    {
        $hasilP2 = ['hasil_probabilitas' => $P2];
        $builder = $this->db->table('tmp_hitung');
        $builder->where('kode_penyakit', 'P02');
        $builder->update($hasilP2);
    }
    public function hasil_prob3($P3)
    {
        $hasilP3 = ['hasil_probabilitas' => $P3];
        $builder = $this->db->table('tmp_hitung');
        $builder->where('kode_penyakit', 'P03');
        $builder->update($hasilP3);
    }
    public function hasil_prob4($P4)
    {
        $hasilP4 = ['hasil_probabilitas' => $P4];
        $builder = $this->db->table('tmp_hitung');
        $builder->where('kode_penyakit', 'P04');
        $builder->update($hasilP4);
    }
    public function hasil_prob5($P5)
    {
        $hasilP5 = ['hasil_probabilitas' => $P5];
        $builder = $this->db->table('tmp_hitung');
        $builder->where('kode_penyakit', 'P05');
        $builder->update($hasilP5);
    }
    public function hasil_prob6($P6)
    {
        $hasilP6 = ['hasil_probabilitas' => $P6];
        $builder = $this->db->table('tmp_hitung');
        $builder->where('kode_penyakit', 'P06');
        $builder->update($hasilP6);
    }

    //update hasil prosentase pada tmp_hitung
    public function hasil_pros1($P1)
    {
        $hasilP1 = ['prosentase' => $P1];
        $builder = $this->db->table('tmp_hitung');
        $builder->where('kode_penyakit', 'P01');
        $builder->update($hasilP1);
    }
    public function hasil_pros2($P2)
    {
        $hasilP2 = ['prosentase' => $P2];
        $builder = $this->db->table('tmp_hitung');
        $builder->where('kode_penyakit', 'P02');
        $builder->update($hasilP2);
    }
    public function hasil_pros3($P3)
    {
        $hasilP3 = ['prosentase' => $P3];
        $builder = $this->db->table('tmp_hitung');
        $builder->where('kode_penyakit', 'P03');
        $builder->update($hasilP3);
    }
    public function hasil_pros4($P4)
    {
        $hasilP4 = ['prosentase' => $P4];
        $builder = $this->db->table('tmp_hitung');
        $builder->where('kode_penyakit', 'P04');
        $builder->update($hasilP4);
    }
    public function hasil_pros5($P5)
    {
        $hasilP5 = ['prosentase' => $P5];
        $builder = $this->db->table('tmp_hitung');
        $builder->where('kode_penyakit', 'P05');
        $builder->update($hasilP5);
    }
    public function hasil_pros6($P6)
    {
        $hasilP6 = ['prosentase' => $P6];
        $builder = $this->db->table('tmp_hitung');
        $builder->where('kode_penyakit', 'P06');
        $builder->update($hasilP6);
    }

    //mendapatkan penyakit dengan probabilitas terbesar
    public function tertinggi()
    {
        $builder = "SELECT `penyakit`,`penanganan`,`prosentase`, MAX(`hasil_probabilitas`) AS `hasil_probabilitas` FROM `tmp_hitung` GROUP BY `kode_penyakit` ORDER BY `hasil_probabilitas` DESC LIMIT 1";
        return $this->db->query($builder)->getResultArray();
    }
    //menampilkan detail akhir diagnosa
    // public function tampil_hasil()
    // {
    //     $builder = "SELECT tmp_hitung.kode_penyakit, MAX(hasil_probabilitas) AS hasil_probabilitas, tb_penyakit.penyakit, tb_penyakit.penanganan
    //     FROM tmp_hitung
    //     JOIN tb_penyakit ON tmp_hitung.kode_penyakit = tb_penyakit.kode_penyakit
    //     GROUP BY kode_penyakit ORDER BY hasil_probabilitas
    //     DESC LIMIT 1";
    //     return $this->db->query($builder)->getResultArray();
    // }
    //algoritma naive bayes classifier--end
}
