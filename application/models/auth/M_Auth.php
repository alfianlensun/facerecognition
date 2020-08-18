<?php


class M_Auth extends CI_Model {
    public function __construct()
    {   
        parent::__construct();
    }

    public function getUserDosen(){
        return $this->db->where('active', 1)
                        ->get('mst_dosen')
                        ->result_array();
    }

    public function createUserDosen(){
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $this->db->insert('mst_auth', [
            'username' => $this->input->post('nip'),
            'password' => $password,
            'user_type' => 2,
        ]);
        $id_mst_auth = $this->db->insert_id();
        $this->db->insert('mst_dosen', [
            'id_mst_auth' => $id_mst_auth,
            'nama_dosen' => $this->input->post('nama_dosen'),
            'nip' => $this->input->post('nip'),
            
        ]);
    }

    public function updateUserDosen(){
        $dosen = $this->db->select('id_mst_auth')    
                                ->from('mst_dosen')
                                ->where('active', 1)
                                ->where('id_mst_dosen', $this->input->post('id_mst_dosen'))  
                                ->get()
                                ->row_array(0);
        $dataupdateauth = [
            'username' => $this->input->post('nip'),
            'user_type' => 2,
        ];
        if (trim($this->input->post('password')) != ''){
            $dataupdate['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        }
        $this->db->where('id_mst_auth', $dosen['id_mst_auth'])  
                    ->update('mst_auth', $dataupdateauth);
        

        $this->db->where('id_mst_dosen', $this->input->post('id_mst_dosen'))
                ->update('mst_dosen', [
                    'nama_dosen' => $this->input->post('nama_dosen'),
                    'nip' => $this->input->post('nip')
                ]);
        return $this->db->affected_rows();
    }
    
    public function deleteUserDosen(){
        $dosen = $this->db->select('id_mst_auth')    
                                ->from('mst_dosen')
                                ->where('active', 1)
                                ->where('id_mst_dosen', $this->input->post('ids'))  
                                ->get()
                                ->row_array(0);

        $this->db->where('id_mst_dosen', $this->input->post('ids'))  
                    ->update('mst_dosen', [
                        'active' => 0
                    ]);

        $this->db->where('id_mst_auth', $dosen['id_mst_auth'])  
                    ->update('mst_auth', [
                        'active' => 0
                    ]);
        return $this->db->affected_rows();
    }

    public function getUserMahasiswa(){
        return $this->db->select('*')
                        ->from('mst_mahasiswa as a')
                        ->join('mst_kelas as b', 'a.id_mst_kelas = b.id_mst_kelas')
                        ->join('mst_semester as c', 'a.id_mst_semester = c.id_mst_semester')
                        ->where('a.active', 1)
                        ->get()
                        ->result_array();
    }

    public function getUserMahasiswaByIdAuth($id){
        return $this->db->where('active', 1)
                        ->where('id_mst_auth', $id)
                        ->get('mst_mahasiswa')
                        ->row_array();
    }

    public function createUserMahasiswa(){
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $this->db->insert('mst_auth', [
            'username' => $this->input->post('nim'),
            'password' => $password,
            'user_type' => 3,
        ]);
        $id_mst_auth = $this->db->insert_id();
        $this->db->insert('mst_mahasiswa', [
            'id_mst_auth' => $id_mst_auth,
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'id_mst_kelas' => $this->input->post('id_mst_kelas'),
            'id_mst_semester' => $this->input->post('id_mst_semester'),
            'nim' => $this->input->post('nim'),
            
        ]);
    }

    public function updateUserMahasiswa(){
        $mahasiswa = $this->db->select('id_mst_auth')    
                                ->from('mst_mahasiswa')
                                ->where('active', 1)
                                ->where('id_mst_mahasiswa', $this->input->post('id_mst_mahasiswa'))  
                                ->get()
                                ->row_array(0);
        $dataupdateauth = [
            'username' => $this->input->post('nim'),
            'user_type' => 2
        ];
        
        if (trim($this->input->post('password')) != ''){
            $dataupdate['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        }
        $this->db->where('id_mst_auth', $mahasiswa['id_mst_auth'])  
                    ->update('mst_auth', $dataupdateauth);
        

        $this->db->where('id_mst_mahasiswa', $this->input->post('id_mst_mahasiswa'))
                ->update('mst_mahasiswa', [
                    'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
                    'nim' => $this->input->post('nim'),
                    'id_mst_kelas' => $this->input->post('id_mst_kelas'),
                    'id_mst_semester' => $this->input->post('id_mst_semester')
                ]);
        return $this->db->affected_rows();
    }
    
    public function deleteUserMahasiswa(){
        $mahasiswa = $this->db->select('id_mst_auth')    
                                ->from('mst_mahasiswa')
                                ->where('active', 1)
                                ->where('id_mst_mahasiswa', $this->input->post('ids'))  
                                ->get()
                                ->row_array(0);

        $this->db->where('id_mst_mahasiswa', $this->input->post('ids'))  
                    ->update('mst_mahasiswa', [
                        'active' => 0
                    ]);

        $this->db->where('id_mst_auth', $mahasiswa['id_mst_auth'])  
                    ->update('mst_auth', [
                        'active' => 0
                    ]);
        return $this->db->affected_rows();
    }

    public function getUserAuthByUsername($username){
        return $this->db->where('username', $username)
                        ->where('active', 1)
                        ->get('mst_auth')->row_array();
    }
}