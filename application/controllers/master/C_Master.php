<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Master extends MY_Controller {
    public function __construct()
    {   
        parent::__construct();
        $this->load->model('master/M_Master', 'master');
        $this->load->model('auth/M_Auth', 'auth');
    }

    public function kelas(){
        $data['kelas'] = $this->master->getMasterKelas();
        $this->render('master/MasterKelas', $data, [
            'title' => 'Master Kelas'
        ]);
    }
    public function mk(){
        $data['mk'] = $this->master->getMK();
        $this->render('master/MasterMK', $data, [
            'title' => 'Master Mata Kuliah'
        ]);
    }
    public function semester(){
        $data['semester'] = $this->master->getMasterSemester();
        $this->render('master/MasterSemester', $data, [
            'title' => 'Master Semester'
        ]);
    }

    public function settingJadwal(){
        $data['kelas'] = $this->master->getMasterKelas();
        $data['semester'] = $this->master->getMasterSemester();
        $data['dosen'] = $this->auth->getUserDosen();
        $data['mk'] = $this->master->getMK();
        $data['jadwal'] = $this->master->getJadwal();
        
        $this->render('moduls/jadwal/JadwalKuliah', $data);
    }

    public function createJadwalKuliah(){
        $jadwal = $this->master->createJadwalKuliah();
        $this->session->set_flashdata('msg', 'Data Berhasil Di Simpan');
        redirect(base_url('jadwal/setting'));
    }
    public function updateJadwalKuliah(){
        $jadwal = $this->master->updateJadwalKuliah();
        $this->session->set_flashdata('msg', 'Data Berhasil Di Perbarui');
        redirect(base_url('jadwal/setting'));
    }

    public function deleteJadwalKuliah(){
        $delete = $this->master->deleteJadwalKuliah();
        echo json_encode([
            'success' => true
        ]);
    }

    public function createMasterKelas(){
        $kelas = $this->master->createMasterKelas();
        redirect(base_url('master/kelas'));
    }

    public function updateMasterKelas(){
        $update = $this->master->updateMasterKelas();
        redirect(base_url('master/kelas'));
    }
    
    public function deleteMasterKelas(){
        $delete = $this->master->deleteMasterKelas();
        echo json_encode([
            'success' => true
        ]);
    }

    

    public function createMK(){
        $kelas = $this->master->createMK();
        redirect(base_url('master/mata-kuliah'));
    }

    public function updateMK(){
        $update = $this->master->updateMK();
        redirect(base_url('master/mata-kuliah'));
    }
    
    public function deleteMK(){
        $delete = $this->master->deleteMK();
        echo json_encode([
            'success' => true
        ]);
    }

    public function createMasterSemester(){
        $Semester = $this->master->createMasterSemester();
        redirect(base_url('master/semester'));
    }

    public function updateMasterSemester(){
        $update = $this->master->updateMasterSemester();
        redirect(base_url('master/semester'));
    }
    
    public function deleteMasterSemester(){
        $delete = $this->master->deleteMasterSemester();
        echo json_encode([
            'success' => true
        ]);
    }

    

    public function getJsonListMahasiswa(){
        echo json_encode($this->auth->getUserMahasiswa());
    }
}