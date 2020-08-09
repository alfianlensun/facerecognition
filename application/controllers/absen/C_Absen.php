<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Absen extends MY_Controller {
    public function __construct()
    {   
        parent::__construct();
        $this->load->model('master/M_Master', 'master');
        $this->load->model('absen/M_Absen', 'absen');
        $this->load->model('auth/M_Auth', 'auth');
    }

    public function pilihRuanganAbsen(){
        $data['kelas'] = $this->master->getMasterKelas();
        $this->load->view('layout/Header', []);
        $this->load->view('moduls/absen/PilihRuangan', $data);
        $this->load->view('layout/Footer', []);
    }

    public function ambilAbsen(){
        $this->load->view('layout/Header', []);
        $this->load->view('moduls/absen/AmbilAbsen', ['data' => []]);
        $this->load->view('layout/Footer', []);
    }

    public function getAbsenRegister(){
        $datamahasiswa = $this->absen->getAbsenRegister();
        echo json_encode($datamahasiswa);
    }

    public function registrasiAbsen(){
        $data['mahasiswa'] = $this->auth->getUserMahasiswa();
        $this->render('moduls/absen/DaftarAbsen', $data, [
            'title' => 'Registrasi Absensi'
        ]);
    }

    public function registrasiAbsenDetail($idauth){
        $data['datamahasiswa'] = $this->auth->getUserMahasiswaByIdAuth($idauth);
        $this->render('moduls/absen/DaftarAbsenDetail' ,$data, [
            'title' => 'Detail Registrasi Absen'
        ]);
    }

    public function createRegisterAbsen(){
        $image = base64_decode(str_replace('data:image/jpeg;base64,', '',$this->input->post("photo")));
        $image_name = 'register'.$this->input->post('idx');
        $filename = $image_name . '.' . 'jpg';
        if (file_exists("uploaddata/registerabsensi/") == false){
            mkdir("uploaddata");
        }

        if (file_exists("uploaddata/registerabsensi/") == false){
            mkdir("uploaddata/registerabsensi/");
        }

        if (file_exists("uploaddata/registerabsensi/".$this->input->post('id_mst_auth')) == false){
            mkdir("uploaddata/registerabsensi/".$this->input->post('id_mst_auth'));
        }

        //rename file name with random number
        $path = "uploaddata/registerabsensi/".$this->input->post('id_mst_auth')."/".$filename;
        //image uploading folder path
        file_put_contents($path, $image);
        $this->absen->createRegisterAbsen($filename);
        echo json_encode([
            'success' => true,
            'path' => $path
        ]);
        
    }


    public function createAbsensi(){
        $timestamp = time();
        $image = base64_decode(str_replace('data:image/jpeg;base64,', '',$this->input->post("photo")));
        $image_name = 'absensi-'.$timestamp;
        $filename = $image_name . '.' . 'jpg';
        if (file_exists("uploaddata/absensi/") == false){
            mkdir("absensi");
        }

        if (file_exists("uploaddata/absensi/") == false){
            mkdir("uploaddata/absensi/");
        }

        if (file_exists("uploaddata/absensi/".$this->input->post('id_mst_mahasiswa')) == false){
            mkdir("uploaddata/absensi/".$this->input->post('id_mst_mahasiswa'));
        }

        //rename file name with random number
        $path = "uploaddata/absensi/".$this->input->post('id_mst_mahasiswa')."/".$filename;
        //image uploading folder path
        file_put_contents($path, $image);
        $this->absen->createAbsensi($filename);
        echo json_encode([
            'success' => true,
            'path' => $path
        ]);
        
    }
}