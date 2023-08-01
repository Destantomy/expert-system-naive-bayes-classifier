<?php

namespace App\Controllers;

use App\Models\DataKepakaranModel;
use App\Models\DataPenyakitModel;
use App\Models\DataGejalaModel;

class Admin_dataKepakaran extends BaseController
{
    protected $dataKepakaranModel;
    protected $dataPenyakitModel;
    protected $dataGejalaModel;

    public function __construct()
    {
        $this->dataKepakaranModel = new DataKepakaranModel();
        $this->dataPenyakitModel = new DataPenyakitModel();
        $this->dataGejalaModel = new DataGejalaModel();
    }

    public function dataKepakaran()
    {
        //hitung jumlah gejala,
        //$jml_gejala = $this->dataKepakaranModel->get_count();
        //sort nomor di pagination,
        $currentPages = $this->request->getVar('page_data_kepakaran') ? $this->request->getVar('page_data_kepakaran') : 1;
        $data = [
            'title' => 'Admin|Data Kepakaran',
            'validation' => \Config\Services::validation(),
            //pagination
            'data_kepakaran' => $this->dataPenyakitModel->paginate(5, 'data_kepakaran'),
            'pager' => $this->dataPenyakitModel->pager,
            'currentPages' => $currentPages
            //end-pagination
        ];
        // session()->set('jml_gejala', $jml_gejala);
        return view('/home/admin_data-kepakaran', $data);
    }

    public function tambahDataPakar($id)
    {   //searching data
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kode_penyakit = $this->dataKepakaranModel->search($keyword);
        } else {
            $kode_penyakit = $this->dataKepakaranModel;
        }
        //sort nomor di pagination,
        $currentPages = $this->request->getVar('page_data_kepakaran') ? $this->request->getVar('page_data_kepakaran') : 1;
        $pakar_gejala = $this->dataGejalaModel->findAll();
        $data = [
            'title' => 'Admin|Tambah Data Pakar',
            'validation' => \Config\Services::validation(),
            'data_penyakit' => $this->dataPenyakitModel->getDataPenyakit($id),
            'pakar_gejala' => $pakar_gejala,
            //pagination
            'data_kepakaran' => $this->dataKepakaranModel->paginate(5, 'data_kepakaran'),
            'pager' => $this->dataKepakaranModel->pager,
            'currentPages' => $currentPages,
            //end-pagination
            'data_pakar' => $this->dataKepakaranModel->getDataPakar($id)
        ];
        return view('/home/admin_tambah-data-pakar', $data);
    }

    public function simpanDataPakar()
    {
        if (!$this->validate([
            'pakar_penyakit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'please insert penyakit'
                ]
            ],
            'pakar_gejala' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'please insert gejala'
                ]
            ],
            'pakar_probabilitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'please insert relation`s probability value'
                ]
            ]
        ])) { //validation
            $validation = \Config\Services::validation();
            return redirect()->to('/Admin_dataKepakaran/tambahDataPakar/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }
        //insert to db
        $this->dataKepakaranModel->save([
            'kode_penyakit' => $this->request->getVar('kode_penyakit'),
            'penyakit' => $this->request->getVar('pakar_penyakit'),
            'gejala' => $this->request->getVar('pakar_gejala'),
            'penanganan' => $this->request->getVar('pakar_penanganan'),
            'probabilitas' => $this->request->getVar('pakar_probabilitas')
        ]);
        //end-insert to db
        //flash messages
        session()->setFlashdata('register_messages', 'Data successfully added');
        return redirect()->to('/Admin_dataKepakaran/tambahDataPakar/' . $this->request->getVar('id'))->withInput();
    }

    public function hapusDataPakar($id)
    {
        $this->dataKepakaranModel->delete($id);
        session()->setFlashdata('deleted_messages', 'Data berhasil dihapus');
        return redirect()->to('/Admin_dataKepakaran/dataKepakaran');
    }
}
