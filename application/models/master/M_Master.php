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
}