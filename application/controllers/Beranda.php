<?php
class Beranda extends CI_Controller{
    public function index()
    {
        $this->load->view('beranda/Beranda.php');
    }

    public function kirim_pesan()
    {
      var_dump($this->input->post());
    }
} 
