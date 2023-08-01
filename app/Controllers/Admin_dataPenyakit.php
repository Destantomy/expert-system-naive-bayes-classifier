<?php

namespace App\Controllers;

use App\Models\DataPenyakitModel;

class Admin_dataPenyakit extends BaseController
{
    protected $dataPenyakitModel;
    public function __construct()
    {
        $this->dataPenyakitModel = new DataPenyakitModel();
    }

    public function dataPenyakit()
    {
        //searching
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kode_penyakit = $this->dataPenyakitModel->search($keyword);
        } else {
            $kode_penyakit = $this->dataPenyakitModel;
        }
        //sort nomor di pagination,
        $currentPages = $this->request->getVar('page_data_penyakit') ? $this->request->getVar('page_data_penyakit') : 1;
        $data = [
            'title' => 'Admin|Data Penyakit',
            'validation' => \Config\Services::validation(),
            //pagination
            'data_penyakit' => $this->dataPenyakitModel->paginate(5, 'data_penyakit'),
            'pager' => $this->dataPenyakitModel->pager,
            'currentPages' => $currentPages
            //end-pagination
        ];
        return view('/home/admin_data-penyakit', $data);
    }

    public function tambahDataPenyakit()
    {
        $data = [
            'title' => 'Admin|Tambah Data Penyakit',
            'validation' => \Config\Services::validation()
        ];
        return view('/home/admin_tambah-data-penyakit', $data);
    }

    public function detailDataPenyakit($id)
    {
        $data = [
            'title' => 'Admin|Detail Data Penyakit',
            'data_penyakit' => $this->dataPenyakitModel->getDataPenyakit($id),
            'validation' => \Config\Services::validation()
        ];
        return view('/home/admin_detail-data-penyakit', $data);
    }

    public function simpanDataPenyakit()
    {
        if (!$this->validate([
            'kode_penyakit' => [
                'rules' => 'required|is_unique[tb_penyakit.kode_penyakit]|max_length[10]|min_length[3]',
                'errors' => [
                    'required' => 'please insert kode-penyakit',
                    'is_unique' => 'seems to be another kode-penyakit, please write different one',
                    'max_length' => 'maximum 10 characters in long',
                    'min_length' => 'minimum 3 characters in long'
                ]
            ],
            'penyakit' => [
                'rules' => 'required|is_unique[tb_penyakit.penyakit]|max_length[50]|min_length[5]',
                'errors' => [
                    'required' => 'please insert disease`s name',
                    'is_unique' => 'seems to be another disease`s name, please write different one',
                    'max_length' => 'maximum 50 characters in long',
                    'min_length' => 'minimum 5 characters in long'
                ]
            ],
            'probabilitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'please insert disease`s probability value'
                ]
            ],
            'penanganan' => [
                'rules' => 'required|is_unique[tb_penyakit.penanganan]|min_length[10]',
                'errors' => [
                    'required' => 'please insert disease`s handling',
                    'is_unique' => 'seems to be another disease`s name, please write different one',
                    'min_length' => 'minimum 10 characters in long'
                ]
            ]
        ])) {
            //validation
            $validation = \Config\Services::validation();
            return redirect()->to('/Admin_dataPenyakit/tambahDataPenyakit')->withInput()->with('validation', $validation);
        }
        //insert to db
        $this->dataPenyakitModel->save([
            'kode_penyakit' => $this->request->getVar('kode_penyakit'),
            'penyakit' => $this->request->getVar('penyakit'),
            'probabilitas' => $this->request->getVar('probabilitas'),
            'penanganan' => $this->request->getVar('penanganan')
        ]);
        //end-insert to db
        //flash messages
        session()->setFlashdata('register_messages', 'Data successfully added');
        return redirect()->to('/Admin_dataPenyakit/dataPenyakit');
    }

    public function updateDataPenyakit($id)
    {
        $penyakitLama = $this->dataPenyakitModel->getDataPenyakit($this->request->getVar('id'));
        if ($penyakitLama['kode_penyakit'] == $this->request->getVar('kode_penyakit')) {
            $rule_penyakit = 'required';
        } else {
            $rule_penyakit = 'required|is_unique[tb_penyakit.kode_penyakit]|max_length[10]|min_length[3]';
        }
        if (!$this->validate([
            'kode_penyakit' => [
                'rules' => $rule_penyakit,
                'errors' => [
                    'required' => 'please insert {field}',
                    'is_unique' => '{field} already exist',
                    'max_length' => '{field} maximum 10 characters in length',
                    'min_length' => '{field} minimum 3 characters in length'
                ]
            ],
            'penyakit' => [
                'rules' => 'required|max_length[50]|min_length[5]',
                'errors' => [
                    'required' => 'please insert disease`s name',
                    'max_length' => 'maximum 50 characters in long',
                    'min_length' => 'minimum 5 characters in long'
                ]
            ],
            'probabilitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'please insert disease`s probability value'
                ]
            ],
            'penanganan' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'please insert disease`s handling',
                    'min_length' => 'minimum 10 characters in long'
                ]
            ]
        ])) { //menampilkan hasil rule
            $validation = \Config\Services::validation();
            return redirect()->to('/Admin_dataPenyakit/detailDataPenyakit/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }
        $this->dataPenyakitModel->save([
            'id' => $id,
            'kode_penyakit' => $this->request->getVar('kode_penyakit'),
            'penyakit' => $this->request->getVar('penyakit'),
            'probabilitas' => $this->request->getVar('probabilitas'),
            'penanganan' => $this->request->getVar('penanganan')
        ]);
        session()->setFlashdata('updated_messages', 'Data berhasil diubah');
        return redirect()->to('/Admin_dataPenyakit/dataPenyakit/');
    }

    public function hapusDataPenyakit($id)
    {
        $this->dataPenyakitModel->delete($id);
        session()->setFlashdata('deleted_messages', 'Data berhasil dihapus');
        return redirect()->to('/Admin_dataPenyakit/dataPenyakit');
    }
}
