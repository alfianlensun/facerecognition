<?php 


class MY_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function render($body = null, $data = [], $option = []){
        if ($body === null) dd('invalid body parameter');
        $this->load->view('layout/Header', $data);
        // $this->load->view('layout/DefaultTheme');
        $this->load->view('layout/MainLayout', [
            'title' => isset($option['title']) ? $option['title'] : '',
            'view' => $body,
            'data' => $data
        ]);
        $this->load->view('layout/Footer', $data);
    }
}