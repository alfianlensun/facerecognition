<?php


class M_Master extends CI_Model {
    public function __construct()
    {   
        parent::__construct();
    }

    public function getMasterKelas(){
        return $this->db->where('active', 1)
                        ->get('mst_kelas')->result_array();
    }

    public function createMasterKelas(){
        $this->db->insert('mst_kelas', $this->input->post());
        return $this->db->insert_id();
    }


    public function updateMasterKelas(){
        $this->db->where('id_mst_kelas', $this->input->post('id_mst_kelas'))  
                    ->update('mst_kelas', [
                        'nama_kelas' => $this->input->post('nama_kelas')
                    ]);
        return $this->db->affected_rows();
    }

    public function deleteMasterKelas(){
        $this->db->where('id_mst_kelas', $this->input->post('ids'))  
                    ->update('mst_kelas', [
                        'active' => 0
                    ]);
        return $this->db->affected_rows();
    }

    public function getMK(){
        return $this->db->where('active', 1)
                        ->get('mst_mata_kuliah')->result_array();
    }

    public function createMK(){
        $this->db->insert('mst_mata_kuliah', $this->input->post());
        return $this->db->insert_id();
    }


    public function updateMK(){
        $this->db->where('id_mst_mata_kuliah', $this->input->post('id_mst_mata_kuliah'))  
                    ->update('mst_mata_kuliah', [
                        'nama_mata_kuliah' => $this->input->post('nama_mata_kuliah'),
                        'sks' => $this->input->post('sks')
                    ]);
        return $this->db->affected_rows();
    }

    public function deleteMK(){
        $this->db->where('id_mst_mata_kuliah', $this->input->post('ids'))  
                    ->update('mst_mata_kuliah', [
                        'active' => 0
                    ]);
        return $this->db->affected_rows();
    }

    public function getMasterSemester(){
        return $this->db->where('active', 1)
                        ->get('mst_semester')->result_array();
    }

    public function createMasterSemester(){
        $this->db->insert('mst_semester', $this->input->post());
        return $this->db->insert_id();
    }


    public function updateMasterSemester(){
        $this->db->where('id_mst_semester', $this->input->post('id_mst_semester'))  
                    ->update('mst_semester', [
                        'nama_semester' => $this->input->post('nama_semester')
                    ]);
        return $this->db->affected_rows();
    }

    public function deleteMasterSemester(){
        $this->db->where('id_mst_semester', $this->input->post('ids'))  
                    ->update('mst_semester', [
                        'active' => 0
                    ]);
        return $this->db->affected_rows();
    }

    public function createJadwalKuliah(){
        $this->db->insert('trx_jadwal_kuliah', $this->input->post());
    }

    public function updateJadwalKuliah(){
        $datapost = $this->input->post();
        unset($datapost['id_trx_jadwal_kuliah']);
        $this->db->where('id_trx_jadwal_kuliah', $this->input->post('id_trx_jadwal_kuliah'))
                    ->update('trx_jadwal_kuliah', $datapost);
    }

    public function deleteJadwalKuliah(){
        $this->db->where('id_trx_jadwal_kuliah', $this->input->post('ids'))  
                    ->update('trx_jadwal_kuliah', [
                        'active' => 0
                    ]);
        return $this->db->affected_rows();
    }

    public function getJadwal(){
        return $this->db->select('*')
                    ->from('trx_jadwal_kuliah as a')
                    ->join('mst_semester as b', 'a.id_mst_semester = b.id_mst_semester')
                    ->join('mst_kelas as c', 'a.id_mst_kelas = c.id_mst_kelas')
                    ->join('mst_dosen as d', 'a.id_mst_dosen = d.id_mst_dosen')
                    ->join('mst_mata_kuliah as e', 'a.id_mst_mata_kuliah = e.id_mst_mata_kuliah')
                    ->where('a.active', 1)
                    ->order_by('day', 'desc')
                    ->get()->result_array();
    }

    public function getJadwalSekarangByIdKelas($id){
        $daynow = date('w');
        $timenow = date('H:i');
        return $this->db->select('*')
                    ->from('trx_jadwal_kuliah as a')
                    ->join('mst_semester as b', 'a.id_mst_semester = b.id_mst_semester')
                    ->join('mst_kelas as c', 'a.id_mst_kelas = c.id_mst_kelas')
                    ->join('mst_dosen as d', 'a.id_mst_dosen = d.id_mst_dosen')
                    ->join('mst_mata_kuliah as e', 'a.id_mst_mata_kuliah = e.id_mst_mata_kuliah')
                    ->where('a.active', 1)
                    ->where('a.day', $daynow)
                    ->where('a.id_mst_kelas', $id)
                    ->where("jam_mulai >=", $timenow)
                    ->order_by('jam_mulai', 'asc')
                    ->get()->result_array();
    }
}