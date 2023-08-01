<?php

namespace App\Controllers;

use App\Models\LogsModel;
use App\Models\DataPenyakitModel;
use App\Models\DataGejalaModel;
use App\Models\DataKepakaranModel;

class Admin_dataPengguna extends BaseController
{
    protected $logsModel;
    protected $dataPenyakitModel;
    protected $dataGejalaModel;
    protected $dataKepakaranModel;

    public function __construct()
    {
        $this->logsModel = new LogsModel();
        $this->dataPenyakitModel = new DataPenyakitModel();
        $this->dataGejalaModel = new DataGejalaModel();
        $this->dataKepakaranModel = new DataKepakaranModel();
    }

    public function beranda()
    {
        $data = [
            'title' => 'Admin|Beranda'
        ];
        //data pada dashboard
        $jml_pengguna = $this->logsModel->get_count();
        $jml_penyakit = $this->dataPenyakitModel->get_count();
        $jml_gejala = $this->dataGejalaModel->get_count();
        $jml_kepakaran = $this->dataKepakaranModel->get_count();

        session()->set('jml_pengguna', $jml_pengguna);
        session()->set('jml_penyakit', $jml_penyakit);
        session()->set('jml_gejala', $jml_gejala);
        session()->set('jml_kepakaran', $jml_kepakaran);
        return view('home/admin_home', $data);
    }

    public function dataPengguna()
    {
        // $data_pengguna = $this->logsModel->findAll();
        //searching
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kode_penyakit = $this->logsModel->search($keyword);
        } else {
            $kode_penyakit = $this->logsModel;
        }
        //sort nomor di pagination,
        $currentPages = $this->request->getVar('page_data_pengguna') ? $this->request->getVar('page_data_pengguna') : 1;
        $data = [
            'title' => 'Admin|Data Pengguna',
            //pagination
            'data_pengguna' => $this->logsModel->paginate(7, 'data_pengguna'),
            'pager' => $this->logsModel->pager,
            'currentPages' => $currentPages
            //end-pagination
        ];
        return view('home/admin_data-pengguna', $data);
    }

    public function detailDataPengguna($id)
    {
        $data = [
            'title' => 'Admin|Detail Data Pengguna',
            'data_pengguna' => $this->logsModel->getDataPengguna($id),
            'validation' => \Config\Services::validation()
        ];
        return view('home/admin_detail-data-pengguna', $data);
    }

    public function updateDataPengguna($id)
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
            return redirect()->to('/Admin_dataPengguna/detailDataPengguna/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }
        $this->logsModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'level' => $this->request->getVar('level'),
            'gender' => $this->request->getVar('gender'),
            'ages' => $this->request->getVar('ages'),
            'password' => $this->request->getVar('password')
        ]);
        session()->setFlashdata('updated_messages', 'Data berhasil diubah');
        return redirect()->to('/Admin_dataPengguna/dataPengguna');
    }

    public function deleteDataPengguna($id)
    {
        $this->logsModel->delete($id);
        session()->setFlashdata('deleted_messages', 'Data berhasil dihapus');
        return redirect()->to('/Admin_dataPengguna/dataPengguna');
    }
}
