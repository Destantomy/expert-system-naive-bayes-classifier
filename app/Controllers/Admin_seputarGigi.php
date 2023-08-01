<?php

namespace App\Controllers;

use App\Models\SeputarGigiModel;

class Admin_seputarGigi extends BaseController
{
    protected $seputarGigiModel;
    public function __construct()
    {
        $this->seputarGigiModel = new SeputarGigiModel();
    }

    public function seputarGigi()
    {
        //searching
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kode_penyakit = $this->seputarGigiModel->search($keyword);
        } else {
            $kode_penyakit = $this->seputarGigiModel;
        }
        //$data_artikel = $this->seputarGigiModel->findAll();
        //sort nomor di pagination,
        $currentPages = $this->request->getVar('page_data_artikel') ? $this->request->getVar('page_data_artikel') : 1;
        $data = [
            'title' => 'Admin|Seputar Kesehatan Gigi',
            'validation' => \Config\Services::validation(),
            //pagination
            'data_artikel' => $this->seputarGigiModel->paginate(5, 'data_artikel'),
            'pager' => $this->seputarGigiModel->pager,
            'currentPages' => $currentPages
            //end-pagination
        ];
        return view('home/admin_seputar-gigi', $data);
    }

    public function tambahSeputarGigi()
    {
        //$data_artikel = $this->seputarGigiModel->findAll();
        $data = [
            'title' => 'Admin|Tambah Seputar Kesehatan Gigi',
            'validation' => \Config\Services::validation(),
            //'data_artikel' => $data_artikel
        ];
        return view('home/admin_tambah-seputar-gigi', $data);
    }

    public function detailSeputarGigi($id)
    {
        $data = [
            'title' => 'Admin|Detail Data Artikel',
            'data_artikel' => $this->seputarGigiModel->getDataArtikel($id),
            'validation' => \Config\Services::validation()
        ];
        return view('home/admin_detail-seputar-gigi', $data);
    }

    public function tambahArtikel()
    {
        if (!$this->validate([
            'headline' => [
                'rules' => 'required|is_unique[tb_seputargigi.headline]|max_length[50]|min_length[10]',
                'errors' => [
                    'required' => 'please insert headline',
                    'is_unique' => 'seems to be another headline, please write different one',
                    'max_length' => 'maximum 50 characters in long',
                    'min_length' => 'minimum 10 characters in long'
                ]
            ],
            'konten' => [
                'rules' => 'required|min_length[15]',
                'errors' => [
                    'required' => 'please write content',
                    'min_length' => 'minimum 15 characters in long'
                ]
            ]
        ])) {
            //validation
            $validation = \Config\Services::validation();
            return redirect()->to('/Admin_seputarGigi/tambahSeputarGigi')->withInput()->with('validation', $validation);
        }
        //insert to database
        $this->seputarGigiModel->save([
            'headline' => $this->request->getVar('headline'),
            'konten' => $this->request->getVar('konten')
        ]);
        //end-insert to db
        //flash messages
        session()->setFlashdata('register_messages', 'Data successfully added');
        return redirect()->to('/Admin_seputarGigi/seputarGigi');
    }

    public function updateDataArtikel($id)
    {
        $headlineLama = $this->seputarGigiModel->getDataArtikel($this->request->getVar('id'));
        if ($headlineLama['headline'] == $this->request->getVar('headline')) {
            $rule_headline = 'required';
        } else {
            $rule_headline = 'required|is_unique[tb_seputargigi.headline]|max_length[50]|min_length[10]';
        }
        if (!$this->validate([
            'headline' => [
                'rules' => $rule_headline,
                'errors' => [
                    'required' => 'please insert {field}',
                    'is_unique' => '{field} already exist',
                    'max_length' => '{field} maximum 50 characters in length',
                    'min_length' => '{field} minimum 10 characters in length'
                ]
            ],
            'konten' => [
                'rules' => 'required|min_length[15]',
                'errors' => [
                    'required' => 'please write content',
                    'min_length' => 'minimum 15 characters in long'
                ]
            ]
        ])) { //menampilkan hasil rule
            $validation = \Config\Services::validation();
            return redirect()->to('/Admin_seputarGigi/detailSeputarGigi/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }
        $this->seputarGigiModel->save([
            'id' => $id,
            'headline' => $this->request->getVar('headline'),
            'konten' => $this->request->getVar('konten')
        ]);
        session()->setFlashdata('updated_messages', 'Data berhasil diubah');
        return redirect()->to('/Admin_seputarGigi/seputarGigi');
    }

    public function deleteDataArtikel($id)
    {
        $this->seputarGigiModel->delete($id);
        session()->setFlashdata('deleted_messages', 'Data berhasil dihapus');
        return redirect()->to('/Admin_seputarGigi/seputarGigi');
    }
}
