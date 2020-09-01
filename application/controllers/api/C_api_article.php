<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_api_article extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        $this->load->library('JWT');
        $this->load->model('m_article');
    
    }


    private function getInputToken2()
    {
        $token = $this->input->post('token');
        $key = "s3Cr3T-G4N";
        $data_arr = (array) $this->jwt->decode($token,$key);
        return $data_arr;
    }


    public function is_url_exist($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($code == 200){
            $status = true;
        }else{
            $status = false;
        }
        curl_close($ch);
        return $status;
    }


    public function show_article(){
        $data=$this->m_article->list_article();
        echo json_encode($data);
    }


    public function show_articlebylimit(){
        $input = $this->getInputToken2();
        // print_r($input);die();
        $sql = "select * from db_blogs.article";
        $query = $this->db->query($sql)->result_array();
        return print_r(json_encode($query));
    }

}