<?php
class Landing extends CI_Controller{
    public function index()
    {
        $this->load->view('landing/Landing.php');
    }

    public function kirim_pesan()
    {
      var_dump($this->input->post());
    }
} 
