<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        // Load database prodi
        $this->load->library('JWT');
    }

    public function getInputToken()
    {
        $token = $this->input->post('token');
        // print_r($token);die();
        $key = "UAP)(*";
        $data_arr = (array) $this->jwt->decode($token,$key);
        return $data_arr;
    }

    private function genratePassword($Username,$Password){

        $plan_password = $Username.''.$Password;
        $pas = md5($plan_password);
        $pass = sha1('jksdhf832746aiH{}{()&(*&(*'.$pas.'HdfevgyDDw{}{}{;;*766&*&*');

        return $pass;
    }
    
    function cek_mhs(){
    	$input = $this->getInputToken();
    	// cari di employees
    	$SQLEMP = 'select NIP from db_employees.employees where NIP = "'.$input['Username'] .'" ';
    	$querySQLEMP = $this->db->query($SQLEMP,array())->result_array();
    	if (count($querySQLEMP) > 0 ) {
    		// user nya empployees
    		
				$dataEmp = $this->db->get_where('db_employees.employees',
		                    array(
		                    	'NIP' => $input['Username'],
		                    	'Password' => $this->genratePassword($input['Username'],$input['Password'])  ))->result_array();

				if (count($dataEmp) > 0) {
					$this->session->set_userdata('loggedIn',1);
					// $this->session->set_userdata('Username',$dataEmp['NIP']);
					// $this->session->set_userdata('Name',$dataEmp['Name']);
					$DataUser = array(
                        'Name' => $dataEmp[0]['TitleAhead'].' '.$dataEmp[0]['Name'].' '.$dataEmp[0]['TitleBehind'],
                        'Username' => $dataEmp[0]['NIP'],
                        'User' => 'Employees',
                        'Year' => 0,
                        // 'Status' => $dataMhs[0]['Status'],
                        'PathPhoto' => 'https://pcam.podomorouniversity.ac.id/'.'uploads/employees/'.$dataEmp[0]['Photo']
                    );
                    $Data=$this->session->set_userdata($DataUser);

					redirect('dashboard');
				}
				else
				{
					// username atau password salah

					// $result = array(
     //                        'Status' => 0,
     //                        'Message' => 'Password is wrong'
     //                    );
					$this->session->set_flashdata('Message', 'Username or Password is wrong');
					redirect(base_url());
				}

    	}
    	else
    	{
    		// cek di MHS
    		$SQLMHS = 'select NPM from db_academic.auth_students where NPM = "'.$input['Username'] .'" ';
    		$querySQLMHS = $this->db->query($SQLMHS,array())->result_array();
    		if (count($querySQLMHS) > 0 ) {
    			// usernya MHS
				$dataMhs = $this->db->get_where('db_academic.auth_students',
		                    array(
		                    	'NPM' => $input['Username'],
		                    	'Password' => $this->genratePassword($input['Username'],$input['Password'])  ))->result_array();

				if (count($dataMhs) > 0) {
					$this->session->set_userdata('loggedIn',1);
					$DataUser = array(
                        'Name' => $dataMhs[0]['Name'],
                        'Username' => $dataMhs[0]['NPM'],
                        'Email' => $dataMhs[0]['Email'],
                        'User' => 'Student',
                        'Year' => $dataMhs[0]['Year'],
                        // 'Status' => $dataMhs[0]['Status'],
                        'PathPhoto' => 'https://pcam.podomorouniversity.ac.id/'.'uploads/students/ta_'.$dataMhs[0]['Year'].'/'.$dataMhs[0]['Photo']
                    );
                    $Data=$this->session->set_userdata($DataUser);

                    $result = array(
                        'DataUser' => $Data,
                        'Status' => '1',
                        'Message' => 'Success'
                    );
					
					redirect('dashboard');
				}
				else
				{
					// username atau password salah
					// $result = array(
     //                        'Status' => 0,
     //                        'Message' => 'Password is wrong'
     //                    );
					$this->session->set_flashdata('Message', 'Username or Password is wrong');
					redirect(base_url());
				}

    		}
    		else
    		{
    			// user tidak ada pada database
    			$this->session->set_flashdata('Message', 'Username or Password is wrong');
    			redirect(base_url());
    		}

    	}

        // print_r($result);           
        return print_r(json_encode($result));
	}


}