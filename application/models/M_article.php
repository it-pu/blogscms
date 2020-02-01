<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_article extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        // Load database prodi
        $this->load->library('JWT');
        
    }
    // ========== CRUD Article ========== //

	function list_article(){
		$hasil= $this->db->query('select * from db_blogs.article order by ID_title desc');
		return $hasil->result();
		
	}

	function list_contact(){
		$hasil= $this->db->query('select * from db_blogs.contact order by ID_contact desc');
		return $hasil->result();
	}

	function data_about($id){
		return $this->db->get_where('db_blogs.about', array('ID_AboutUS' => $id))->row();

		// $hasil= $this->db->query('SELECT * FROM about WHERE ID_AboutUS='.$id.'');
		// return $hasil->result();
	}


	function show_category(){
		$hasil=$this->db->get('db_blogs.category');
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