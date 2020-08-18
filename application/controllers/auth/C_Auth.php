<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Auth extends MY_Controller {
    public function __construct()
    {   
        parent::__construct();
        $this->load->model('auth/M_Auth', 'auth');
        $this->load->model('master/M_Master', 'master');
        // dd($this->session->userdata('user_id'));
        
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

    public function validateLogin(){
        $user = $this->auth->getUserAuthByUsername($this->input->post('username'));
        if ($user !== null){
            if (password_verify($this->input->post('password'), $user['password'])){
                if ($user['user_type'] == 1){
                    $this->session->set_userdata([
                        'user_id' => $user['id_mst_auth'],
                        'user' => 'admin'
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
        $data['mahasiswa'] = $this->auth->getUserMahasiswa();
        $data['kelas'] = $this->master->getMasterKelas();
        $this->render('auth/SignUpMahasiswa', $data);
    }

    public function userManagementDosen(){
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