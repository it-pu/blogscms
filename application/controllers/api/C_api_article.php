<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_api_article extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // header('Access-Control-Allow-Origin: *');
        // header('Content-Type: application/json');
        // $this->load->library('JWT');
        $this->load->model('m_article');
    
    }


    private function getInputToken()
    {
        $token = $this->input->post('token');
        $key = "s3Cr3T-G4N";
        $data_arr = (array) $this->jwt->decode($token,$key);
        return $data_arr;
    }

    function show_article(){
        $data=$this->m_article->list_article();
        echo json_encode($data);
    }


}