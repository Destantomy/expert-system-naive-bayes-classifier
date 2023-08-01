<?php

namespace App\Controllers;

use App\Models\LogsModel;
use App\Models\DataPenyakitModel;
use App\Models\DataGejalaModel;
use App\Models\DataKepakaranModel;

class Logs extends BaseController
{
    protected $LogsModel;
    protected $dataPenyakitModel;
    protected $dataGejalaModel;
    protected $dataKepakaranModel;

    public function __construct()
    {
        $this->LogsModel = new LogsModel();
        $this->dataPenyakitModel = new DataPenyakitModel();
        $this->dataGejalaModel = new DataGejalaModel();
        $this->dataKepakaranModel = new DataKepakaranModel();
    }

    public function logon()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];
        return view('logs/login', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Main menu',
            'validation' => \Config\Services::validation()
        ];
        //validation
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please insert username.'
                ]
            ],
            'password' => [
                'rules' => 'required'
            ]
        ])) { //show the validation's rules
            $validation = \Config\Services::validation();
            return redirect()->to('/toLogin')->withInput()->with('validation', $validation);
        }
        //end-validation
        //else
        //data pada dashboard
        $jml_pengguna = $this->LogsModel->get_count();
        $jml_penyakit = $this->dataPenyakitModel->get_count();
        $jml_gejala = $this->dataGejalaModel->get_count();
        $jml_kepakaran = $this->dataKepakaranModel->get_count();
        //login proses
        //if valid
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $valid = $this->LogsModel->login($username, $password);
        //jika cocok
        if ($valid) {
            // jika data cocok cek status
            if ($valid['status'] == 'Admin') {
                session()->set('username', $valid['username']);
                session()->set('status', $valid['status']);
                session()->set('jml_pengguna', $jml_pengguna);
                session()->set('jml_penyakit', $jml_penyakit);
                session()->set('jml_gejala', $jml_gejala);
                session()->set('jml_kepakaran', $jml_kepakaran);
                return view('/home/admin_home', $data);
            } else if ($valid['status'] == 'User') {
                session()->set('id', $valid['id']);
                session()->set('username', $valid['username']);
                session()->set('status', $valid['status']);
                session()->set('gender', $valid['gender']);
                session()->set('ages', $valid['ages']);
                return view('/home/user_home', $data);
            }
        }
        //else, jika tidak cocok
        return redirect()->back()->with('login_error', 'Unfortunately you had an error username or password.');
        //end-login proses
    }

    public function signup()
    {
        $data = [
            'title' => 'Signup',
            'validation' => \Config\Services::validation()
        ];
        return view('logs/signup', $data);
    }

    public function register()
    {
        //validation
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[tb_akun.username]|max_length[15]',
                'errors' => [
                    'required' => 'Please insert username.',
                    'is_unique' => 'Username already exist.'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please choose your gender.'
                ]
            ],
            'ages' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please insert your ages.',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Please insert password.'
                ]
            ]
        ])) { //show the validation's rules
            $validation = \Config\Services::validation();
            return redirect()->to('/toSignup')->withInput()->with('validation', $validation);
        }
        //insert to database
        $this->LogsModel->save([
            'username' => $this->request->getVar('username'),
            'status' => $this->request->getVar('level'),
            'gender' => $this->request->getVar('gender'),
            'ages' => $this->request->getVar('ages'),
            'password' => $this->request->getVar('password')
        ]);
        //end-insert to db
        //flash messages
        session()->setFlashdata('register_messages', 'Data successfully added');
        return redirect()->to('toLogin');
    }

    public function signupAdmin()
    {
        $data = [
            'title' => 'Signup',
            'validation' => \Config\Services::validation()
        ];
        return view('logs/signup_admin', $data);
    }

    public function register_admin()
    {
        //validation
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[tb_akun.username]|max_length[15]',
                'errors' => [
                    'required' => 'Please insert username.',
                    'is_unique' => 'Username already exist.'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please choose your gender.'
                ]
            ],
            'ages' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please insert your ages.',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Please insert password.'
                ]
            ]
        ])) { //show the validation's rules
            $validation = \Config\Services::validation();
            return redirect()->to('/toSignup-admin')->withInput()->with('validation', $validation);
        }
        //insert to database
        $this->LogsModel->save([
            'username' => $this->request->getVar('username'),
            'status' => $this->request->getVar('level'),
            'gender' => $this->request->getVar('gender'),
            'ages' => $this->request->getVar('ages'),
            'password' => $this->request->getVar('password')
        ]);
        //end-insert to db
        //flash messages
        session()->setFlashdata('register_messages', 'Data successfully added');
        return redirect()->to('toLogin');
    }
}
