<?php

namespace App\Controllers;

use App\Models\DataGejalaModel;

class Admin_dataGejala extends BaseController
{
    protected $dataGejalaModel;
    public function __construct()
    {
        $this->dataGejalaModel = new DataGejalaModel();
    }

    public function dataGejala()
    {
        //searching
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kode_penyakit = $this->dataGejalaModel->search($keyword);
        } else {
            $kode_penyakit = $this->dataGejalaModel;
        }
        //sort nomor di pagination,
        $currentPages = $this->request->getVar('page_data_gejala') ? $this->request->getVar('page_data_gejala') : 1;
        $data = [
            'title' => 'Admin|Data Gejala',
            'validation' => \Config\Services::validation(),
            //pagination
            'data_gejala' => $this->dataGejalaModel->paginate(5, 'data_gejala'),
            'pager' => $this->dataGejalaModel->pager,
            'currentPages' => $currentPages
            //end-pagination
        ];
        return view('/home/admin_data-gejala', $data);
    }

    public function tambahDataGejala()
    {
        $data = [
            'title' => 'Admin|Tambah Data Gejala',
            'validation' => \Config\Services::validation()
        ];
        return view('/home/admin_tambah-data-gejala', $data);
    }

    public function detailDataGejala($id)
    {
        $data = [
            'title' => 'Admin|Detail Data Gejala',
            'data_gejala' => $this->dataGejalaModel->getDataGejala($id),
            'validation' => \Config\Services::validation()
        ];
        return view('/home/admin_detail-data-gejala', $data);
    }

    public function simpanDataGejala()
    {
        if (!$this->validate([
            'kode_gejala' => [
                'rules' => 'required|is_unique[tb_gejala.kode_gejala]|max_length[10]|min_length[3]',
                'errors' => [
                    'required' => 'please insert kode-gejala',
                    'is_unique' => 'seems to be another kode-gejala, please write different one',
                    'max_length' => 'maximum 10 characters in long',
                    'min_length' => 'minimum 3 characters in long'
                ]
            ],
            'gejala' => [
                'rules' => 'required|is_unique[tb_gejala.gejala]|max_length[200]|min_length[5]',
                'errors' => [
                    'required' => 'please insert symtomps',
                    'is_unique' => 'seems to be another symtomps, please write different one',
                    'max_length' => 'maximum 200 characters in long',
                    'min_length' => 'minimum 5 characters in long'
                ]
            ]
        ])) {
            //validation
            $validation = \Config\Services::validation();
            return redirect()->to('/Admin_dataGejala/tambahDataGejala')->withInput()->with('validation', $validation);
        }
        //insert to db
        $this->dataGejalaModel->save([
            'kode_gejala' => $this->request->getVar('kode_gejala'),
            'gejala' => $this->request->getVar('gejala')
        ]);
        //end-insert to db
        //flash messages
        session()->setFlashdata('register_messages', 'Data successfully added');
        return redirect()->to('/Admin_dataGejala/dataGejala');
    }

    public function updateDataGejala($id)
    {
        $gejalaLama = $this->dataGejalaModel->getDataGejala($this->request->getVar('id'));
        if ($gejalaLama['kode_gejala'] == $this->request->getVar('kode_gejala')) {
            $rule_gejala = 'required';
        } else {
            $rule_gejala = 'required|is_unique[tb_gejala.kode_gejala]|max_length[10]|min_length[3]';
        }
        if (!$this->validate([
            'kode_gejala' => [
                'rules' => $rule_gejala,
                'errors' => [
                    'required' => 'please insert {field}',
                    'is_unique' => '{field} already exist',
                    'max_length' => '{field} maximum 10 characters in length',
                    'min_length' => '{field} minimum 3 characters in length'
                ]
            ],
            'gejala' => [
                'rules' => 'required|is_unique[tb_gejala.gejala]|max_length[200]|min_length[5]',
                'errors' => [
                    'required' => 'please insert symtomp',
                    'is_unique' => 'seems to be another symtomp, please write different one or you aren`t yet change it',
                    'max_length' => 'maximum 200 characters in long',
                    'min_length' => 'minimum 5 characters in long'
                ]
            ]
        ])) { //menampilkan hasil rule
            $validation = \Config\Services::validation();
            return redirect()->to('/Admin_dataGejala/detailDataGejala/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }
        $this->dataGejalaModel->save([
            'id' => $id,
            'kode_gejala' => $this->request->getVar('kode_gejala'),
            'gejala' => $this->request->getVar('gejala')
        ]);
        session()->setFlashdata('updated_messages', 'Data berhasil diubah');
        return redirect()->to('/Admin_datagejala/datagejala/');
    }

    public function hapusDataGejala($id)
    {
        $this->dataGejalaModel->delete($id);
        session()->setFlashdata('deleted_messages', 'Data berhasil dihapus');
        return redirect()->to('/Admin_dataGejala/dataGejala');
    }
}
