<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_article extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');
    }

    public function getNameUpdateBY($whereField = 'a.UpdateBY',$asfield = 'UpdateBY'){
        $str = 'if( 
                     (select count(*) as total from db_employees.employees where NIP = '.$whereField.' limit 1 ) = 1,
                        #True
                        (select Name from db_employees.employees where NIP = '.$whereField.' limit 1 ),
                        #False
                        (select Name from db_academic.auth_students where NPM = '.$whereField.' limit 1)  
                  ) as '.$asfield.' ';
        return $str;
    }

    // ========== CRUD Article ========== //

	function list_article(){
        // $hasil= $this->db->query('select * from db_blogs.article order by ID_title desc');
		$hasil= $this->db->query('select a.*,b.Name,
                                 '.$this->getNameUpdateBY().'
                                 from db_blogs.article  as a
                                 join db_blogs.category as b on a.ID_category =  b.ID_category
                                 order by ID_title desc');

		return $hasil->result();
		
	}

	function list_contact(){
		$hasil= $this->db->query('select * from db_blogs.contact order by ID_contact desc');
		return $hasil->result();
	}

	function data_about($id){
		return $this->db->query('select a.ID_AboutUS,a.Title,a.Description,a.CreateAT,b.Name as UpdateBY from db_blogs.about as a join db_employees.employees as b on a.UpdateBY = b.NIP ')->row();

		// $hasil= $this->db->query('SELECT * FROM about WHERE ID_AboutUS='.$id.'');
		// return $hasil->result();
	}


	function show_category(){
		$hasil=$this->db->query('select a.*,'.$this->getNameUpdateBY().' from db_blogs.category as a ');
		return $hasil->result();
	}

	function save_category($data){

		$this->db->insert('db_blogs.category', $data);
        return $this->db->insert_id();
    }

	function save_article($data){

		$this->db->insert('db_blogs.article', $data);
        return $this->db->insert_id();
        // $result=$this->db->insert('article',$data);
    }
 	
 	public function get_by_id($id)
    {
        return $this->db->get_where('db_blogs.article', array('ID_title' => $id))->row();
	}

	public function update_category($where, $data)
    {
    	$this->db->where('ID_category',$where);
    	$this->db->update('db_blogs.category', $data);
        return 1;
    }

    public function update_article($where, $data)
    {
    	$this->db->where('ID_title',$where);
    	$this->db->update('db_blogs.article', $data);
        return 1;
    }

    public function update_about($data)
    {
    	$this->db->where('ID_AboutUS',1);
    	$this->db->update('db_blogs.about', $data);
        return 1;
    }
 
    function delete_article(){
       
        $id = $this->input->post('id');
        $hasil=$this->db->query("DELETE FROM db_blogs.article WHERE ID_title='$id'");
		return $hasil;
    }

    function delete_category(){
       
        $id = $this->input->post('id');
        $hasil=$this->db->query("DELETE FROM db_blogs.category WHERE ID_category='$id'");
		return $hasil;
    }


    // ========== END CRUD ====== //


}