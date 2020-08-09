<?php 

class M_Absen extends CI_Model {
    public function __construct()
    {   
        parent::__construct();
    }

    public function createRegisterAbsen($filename){
        $checkifexist = $this->db->where('active', 1)
                                    ->where('id_mst_auth', $this->input->post('id_mst_auth'))
                                    ->where('filename', $filename)
                                    ->get('trx_facedata')
                                    ->row_array();

        if ($checkifexist !== null){
            $this->db->where('id_mst_auth', $this->input->post('id_mst_auth'))
                        ->where('active', 1)
                        ->where('filename',$filename)
                        ->update('trx_facedata', [
                            'filename' => $filename,
                            'id_mst_auth' => $this->input->post('id_mst_auth'),
                        ]);
            
        } else {
            $this->db->insert('trx_facedata', [
                'filename' => $filename,
                'id_mst_auth' => $this->input->post('id_mst_auth')
            ]);

            $this->db->where('active', 1)
                        ->where('id_mst_auth', $this->input->post('id_mst_auth'))
                        ->update('mst_mahasiswa', [
                'status_daftar_absensi' => 1
            ]);
        }
    }

    public function getAbsenRegister(){
        return $this->db->select('*')
                    ->from('mst_mahasiswa as a')
                    ->join('trx_facedata as b','a.id_mst_auth = b.id_mst_auth')
                    ->where('a.status_daftar_absensi', 1)
                    ->where('b.filename', 'register1.jpg')
                    ->where('a.active', 1)
                    ->where('b.active', 1)
                    ->get()->result_array();
    }
}