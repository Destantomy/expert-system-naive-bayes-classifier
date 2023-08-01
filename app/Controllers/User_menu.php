<?php

namespace App\Controllers;

use App\Models\LogsModel;
use App\Models\SeputarGigiModel;
use App\Models\DataKepakaranModel;
use App\Models\DataPenyakitModel;
use App\Models\DataGejalaModel;

class User_menu extends BaseController
{
    protected $logsModel;
    protected $seputarGigiModel;
    protected $dataKepakaranModel;
    protected $dataPenyakitModel;
    protected $dataGejalaModel;

    public function __construct()
    {
        $this->logsModel = new LogsModel();
        $this->seputarGigiModel = new SeputarGigiModel();
        $this->dataKepakaranModel = new DataKepakaranModel();
        $this->dataPenyakitModel = new DataPenyakitModel();
        $this->dataGejalaModel = new DataGejalaModel();
    }

    public function beranda()
    {
        $data = [
            'title' => 'Beranda'
        ];
        return view('/home/user_home', $data);
    }

    public function seputarGigi()
    {
        //$data_artikel = $this->seputarGigiModel->findAll();
        //sort nomor artikel
        $currentPages = $this->request->getVar('page_data_artikel') ? $this->request->getVar('page_data_artikel') : 1;
        $data = [
            'title' => 'Seputar Gigi',
            //pagination
            'data_artikel' => $this->seputarGigiModel->paginate(6, 'data_artikel'),
            'pager' => $this->seputarGigiModel->pager,
            'currentPages' => $currentPages
            //end-pagination
        ];
        return view('/home/user_seputar-gigi', $data);
    }

    public function bacaSeputarGigi($id)
    {
        $data = [
            'title' => 'Baca Seputar Gigi',
            'data_artikel' => $this->seputarGigiModel->getDataArtikel($id)
        ];

        return view('/home/user_baca-seputar-gigi', $data);
    }

    public function akunSaya()
    {
        $data_akun = $this->logsModel->findAll();
        $data = [
            'title' => 'Akun Saya',
            'data_akun' => $data_akun
        ];

        return view('/home/user_akun-saya', $data);
    }

    public function konfigurasiAkunSaya($id)
    {
        $data = [
            'title' => 'Konfigurasi Akun Saya',
            'data_akun' => $this->logsModel->getDataPengguna($id),
            'validation' => \Config\Services::validation()
        ];
        return view('/home/user_konfigurasi-akun-saya', $data);
    }

    public function updateAkunSaya($id)
    {
        $userLama = $this->logsModel->getDataPengguna($this->request->getVar('id'));
        if ($userLama['username'] == $this->request->getVar('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[tb_akun.username]|max_length[15]';
        }
        if (!$this->validate([
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => 'please insert {field}',
                    'is_unique' => '{field} already exist',
                    'max_length' => '{field} maximum 15 characters in length'
                ]
            ],
            'ages' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'please insert your ages'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'please insert password',
                    'min_length' => 'minimum 5 characters in length'
                ]
            ]
        ])) { //menampilkan hasil rule
            $validation = \Config\Services::validation();
            return redirect()->to('/User_menu/konfigurasiAkunSaya/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }
        $this->logsModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'level' => $this->request->getVar('level'),
            'gender' => $this->request->getVar('gender'),
            'ages' => $this->request->getVar('ages'),
            'password' => $this->request->getVar('password')
        ]);
        session()->setFlashdata('updated_messages', 'Data akun berhasil diubah');
        return redirect()->to('/Logs/logon');
    }

    public function hapusAkunSaya($id)
    {
        $this->logsModel->delete($id);
        session()->setFlashdata('deleted_messages', 'Data akun berhasil dihapus');
        return redirect()->to('/Logs/logon');
    }

    public function pemeriksaan()
    {
        $data = [
            'title' => 'Pemeriksaan Gigi',
            'pakar_gejala' => $this->dataGejalaModel->findAll()
        ];

        return view('/home/user_pemeriksaan-gigi', $data);
    }

    //algoritma naive bayes classifier--start
    public function hasil()
    {
        //panggil method dari model u/ empty TmpGejala & TmpHitung
        $this->dataKepakaranModel->emptyTmpGejala();
        $this->dataKepakaranModel->emptyTmpHitung();

        //proses input ke TmpGejala
        $inputGejala = $this->request->getVar('periksa');
        $this->dataKepakaranModel->insertTmpGejala($inputGejala);

        //proses input ke TmpHitung
        $this->dataKepakaranModel->insertTmpHitung();

        //memanggil proses perhitungan
        $prob1 = $this->dataKepakaranModel->probabilitas1();
        $prob2 = $this->dataKepakaranModel->probabilitas2();
        $prob3 = $this->dataKepakaranModel->probabilitas3();
        $prob4 = $this->dataKepakaranModel->probabilitas4();
        $prob5 = $this->dataKepakaranModel->probabilitas5();
        $prob6 = $this->dataKepakaranModel->probabilitas6();

        //menyimpan data perhitungan ke tmpHitung kolom probabilitas
        $P01 = $prob1 . "<br>";
        $P02 = $prob2 . "<br>";
        $P03 = $prob3 . "<br>";
        $P04 = $prob4 . "<br>";
        $P05 = $prob5 . "<br>";
        $P06 = $prob6 . "<br>";

        $this->dataKepakaranModel->hasil_prob1($P01);
        $this->dataKepakaranModel->hasil_prob2($P02);
        $this->dataKepakaranModel->hasil_prob3($P03);
        $this->dataKepakaranModel->hasil_prob4($P04);
        $this->dataKepakaranModel->hasil_prob5($P05);
        $this->dataKepakaranModel->hasil_prob6($P06);

        /*mencari hasil prosentase tiap penyakit-
        kemudian menyimpannya ke tmpHitung kolom prosentase*/

        //sum probabilitas tiap penyakit
        $data1 = [
            'P01' => $prob1,
            'P02' => $prob2,
            'P03' => $prob3,
            'P04' => $prob4,
            'P05' => $prob5,
            'P06' => $prob6
        ];
        $nProb = array_sum($data1);

        $pros1 = $prob1 / $nProb . "<br>";
        $pros2 = $prob2 / $nProb . "<br>";
        $pros3 = $prob3 / $nProb . "<br>";
        $pros4 = $prob4 / $nProb . "<br>";
        $pros5 = $prob5 / $nProb . "<br>";
        $pros6 = $prob6 / $nProb . "<br>";

        $this->dataKepakaranModel->hasil_pros1($pros1);
        $this->dataKepakaranModel->hasil_pros2($pros2);
        $this->dataKepakaranModel->hasil_pros3($pros3);
        $this->dataKepakaranModel->hasil_pros4($pros4);
        $this->dataKepakaranModel->hasil_pros5($pros5);
        $this->dataKepakaranModel->hasil_pros6($pros6);

        $data = [
            'title' => 'Hasil Diagnosa',
            'tertinggi' => $this->dataKepakaranModel->tertinggi(),
            'gejala_terpilih' => $this->dataKepakaranModel->showTmpGejala()
        ];
        return view('/home/user_hasil-pemeriksaan', $data);
    }
    //algoritma naive bayes classifier--end
}
