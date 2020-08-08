<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Absen extends MY_Controller {
    public function __construct()
    {   
        parent::__construct();
        $this->load->model('absen/M_Absen', 'absen');
    }

    public function ambilAbsen(){
        $this->render('moduls/absen/AmbilAbsen');
    }

    public function registrasiAbsen(){
        $this->render('moduls/absen/DaftarAbsen');
    }

    public function registrasiAbsenDetail(){
        $this->render('moduls/absen/DaftarAbsenDetail');
    }

    public function createRegisterAbsen(){
        $image = base64_decode(str_replace('data:image/jpeg;base64,', '',$this->input->post("photo")));

        $image_name = md5(uniqid(rand(), true));
        $filename = $image_name . '.' . 'jpg';
        //rename file name with random number
        $path = "uploaddata/registerabsensi/".$filename;
        //image uploading folder path
        file_put_contents($path . $filename, $image);

        dd($path);
        
    }
}