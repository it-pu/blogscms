<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->helper('url');
	}

	public function login()
	{
		 $this->load->view('template/login');
	}

    function cek_login(){
        $data_mhs =$this->m_login->cek_mhs();
    	
    }

    function logout(){
    	$this->session->sess_destroy();
    redirect('login');
  }

}