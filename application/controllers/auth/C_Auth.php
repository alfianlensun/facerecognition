<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Auth extends MY_Controller {
    public function __construct()
    {   
        parent::__construct();
        $this->load->model('auth/M_Auth', 'auth');
        $this->load->model('master/M_Master', 'master');
        
    }

    public function index(){
        
    }

    public function login(){
        if ($this->session->userdata('user_id') !== null){
            redirect(base_url('mainmenu'));
        } 
        $this->load->view('layout/Header');
        $this->load->view('auth/Login');
        $this->load->view('layout/Footer');
    }

    public function signUpMhs(){
        if ($this->session->userdata('user_id') !== null){
            redirect(base_url('mainmenu'));
        } 
        $data['kelas'] = $this->master->getMasterKelas();
        $this->load->view('layout/Header');
        $this->load->view('auth/SignUpMahasiswaSA', $data);
        $this->load->view('layout/Footer');
    }

    public function validateLogin(){
        $user = $this->auth->getUserAuthByUsername($this->input->post('username'));
        if ($user !== null){
            if (password_verify($this->input->post('password'), $user['password'])){
                if ($user['user_type'] == 1){
                    $this->session->set_userdata([
                        'user_type' => $user['user_type'],
                        'user_id' => $user['id_mst_auth'],
                        'user' => 'admin',
                        'data' => null
                    ]);
                } else
                if ($user['user_type'] == 3) {
                    $mhs = $this->auth->getUserMahasiswaByIdAuth($user['id_mst_auth']);
                    $this->session->set_userdata([
                        'user_type' => $user['user_type'],
                        'user_id' => $user['id_mst_auth'],
                        'user' => $mhs['nama_mahasiswa'],
                        'data' => $mhs
                    ]);
                }

                redirect(base_url('mainmenu'));
            } else {
                redirect(base_url('login'));
                $this->session->set_flashdata('msg', 'Password Salah');
            }
        } else {
            redirect(base_url('login'));
            $this->session->set_flashdata('msg', 'Username tidak di temukan');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    public function userManagementMahasiswa(){
        $this->validate();
        $data['mahasiswa'] = $this->auth->getUserMahasiswa();
        $data['kelas'] = $this->master->getMasterKelas();
        $data['semester'] = $this->master->getMasterSemester();
        $this->render('auth/SignUpMahasiswa', $data);
    }

    public function userManagementDosen(){
        $this->validate();
        $data['dosen'] = $this->auth->getUserDosen();
        $this->render('auth/SignUpDosen', $data);
    }

    public function createUserDosen(){
        $Dosen = $this->auth->createUserDosen();
        redirect(base_url('user-management/dosen'));
    }

    public function updateUserDosen(){
        $update = $this->auth->updateUserDosen();
        redirect(base_url('user-management/dosen'));
    }
    
    public function deleteUserDosen(){
        $delete = $this->auth->deleteUserDosen();
        echo json_encode([
            'success' => true
        ]);
    }

    public function createUserMahasiswa(){
        $mahasiswa = $this->auth->createUserMahasiswa();
        redirect(base_url('user-management/mahasiswa'));
    }

    public function createUserMahasiswaSA(){
        $valid =true;
        foreach ($this->input->post() as $key => $postdata){
            if (strlen($postdata) === 0){
                $valid = false;
                $this->session->set_flashdata('msg', json_encode([
                    'status' => false,
                    'message' => 'Lengkapi form terlebih dahulu'
                ]));
                break;
            }
        }
        
        if ($this->input->post('password') !== $this->input->post('confirmpassword')){
            $this->session->set_flashdata('msg', json_encode([
                'status' => false,
                'message' => 'Password tidak cocok'
            ]));
            $valid =false;
        }

    
        if ($valid){
            $mahasiswa = $this->auth->createUserMahasiswa();

            if ($mahasiswa['status']){
                $this->session->set_flashdata('signup', 'Berhasil mendaftar silahkan login untuk melanjutkan');
                redirect(base_url('login'));
            }  else {
                $this->session->set_flashdata('msg', json_encode($mahasiswa));
                redirect(base_url('sign-up'));
            }
        } else {
            redirect(base_url('sign-up'));   
        }
    }

    public function updateUserMahasiswa(){
        $update = $this->auth->updateUserMahasiswa();
        redirect(base_url('user-management/mahasiswa'));
    }
    
    public function deleteUserMahasiswa(){
        $delete = $this->auth->deleteUserMahasiswa();
        echo json_encode([
            'success' => true
        ]);
    }
    
    

}