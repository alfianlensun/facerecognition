<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Main extends MY_Controller {
    public function __construct()
    {   
        parent::__construct();
        if ($this->session->userdata('user_id') === null){
            redirect(base_url('login'));
        } 
    }

    public function index(){
        $this->render('Welcome', []);
    }
}