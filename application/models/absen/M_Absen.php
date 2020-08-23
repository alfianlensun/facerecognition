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


    public function createAbsensi($datamk,$filename){
        $this->db->insert('trx_absensi', [
            'id_mst_kelas' => $this->input->post('id_mst_kelas'),
            'id_mst_mata_kuliah' => $datamk['id_mst_mata_kuliah'],
            'id_mst_mahasiswa' => $this->input->post('id_mst_mahasiswa'),
            'tipe_absen' => 1,
            'jam_absen' => date('Y-m-d H:i:s'),
            'filename' => $filename
        ]);
    }

    public function getLaporanAbsensi($id_mst_kelas, $datapost = null){
        $datakelas = $this->db->select('nama_kelas')
                                ->from('mst_kelas')
                                ->where('active', 1)
                                ->where('id_mst_kelas', $id_mst_kelas)
                                ->get()->row_array();
        $this->db->select('*')
                    ->from('trx_absensi as a')
                    ->join('mst_kelas as b', 'a.id_mst_kelas = b.id_mst_kelas')
                    ->join('mst_mata_kuliah as c', 'a.id_mst_mata_kuliah = c.id_mst_mata_kuliah')
                    ->join('mst_mahasiswa as d', 'a.id_mst_mahasiswa = d.id_mst_mahasiswa')
                    ->where('a.id_mst_kelas', $id_mst_kelas);
        if ($this->input->post('date')){
            $this->db->where('date(a.jam_absen)', $this->input->post('date'));
        }
        // // dd($this->input->post('date'));

        if ($this->input->post('id_mst_mata_kuliah') && $this->input->post('id_mst_mata_kuliah') != 'all'){
            $this->db->where('a.id_mst_mata_kuliah', $this->input->post('id_mst_mata_kuliah'));
        }
        if ($datapost != null){
            $this->db->where('date(a.jam_absen)', $datapost['date']);
            if (isset($datapost['id_mst_mata_kuliah']) && $datapost['id_mst_mata_kuliah'] != 'all'){
                $this->db->where('a.id_mst_mata_kuliah', $datapost['id_mst_mata_kuliah']);
            }
        }

        
        
        return $this->db->get()->result_array();
                            
    }
}