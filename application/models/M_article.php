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

    public function getEMPorMHS($whereField = 'a.UpdateBY',$asfield = 'UpdateBY'){
        $str = 'if( 
                     (select count(*) as total from db_employees.employees where NIP = '.$whereField.' limit 1 ) = 1,
                        #True
                        "Employees",
                        #False
                        "Student"  
                  ) as '.$asfield.' ';
        return $str;
    }

    // ========== CRUD Article ========== //
    function loadByLimit_article(){
        $sql = "select * from db_blogs.article";
        $query = $this->db->query($sql)->result_array();
       return print_r(json_encode($query));
    }

	function list_article(){
        // $hasil= $this->db->query('select * from db_blogs.article order by ID_title desc');
        $Addwhere  = '';
        $AuthDivisionCrud = array(16,12);
        if (!in_array($this->session->userdata('DivisionID') , $AuthDivisionCrud)){
            $WhereOrAnd = ($Addwhere == '') ? ' Where ' : ' And ';
            $Addwhere = $WhereOrAnd.' a.UpdateBY ="'.$this->session->userdata('Username').'" ';
        }
		$hasil= $this->db->query('SELECT a.*,b.Name,c.GroupName,'.$this->getNameUpdateBY().',d.MasterGroupName,
                                        (
                                            SELECT Count(sv.id_article) 
                                            FROM db_blogs.site_visits sv 
                                            WHERE sv.id_article = a.ID_title
                                        ) as Tot_Visit 
                                    FROM  db_blogs.article AS a
                                    LEFT JOIN  db_blogs.category AS b on a.ID_category =  b.ID_category
                                    LEFT JOIN  db_blogs.set_group AS c on a.ID_set_group = c.ID_set_group
                                    LEFT JOIN  db_blogs.set_master_group AS d on a.ID_master_group = d.ID_master_group
                                    '.$Addwhere.'
                                    ORDER BY ID_title DESC')->result_array();
        // print_r($this->db->last_query());die();

        for ($i=0; $i < count($hasil); $i++) { 
            $ID_title = $hasil[$i]['ID_title'];
            $hasil[$i]['show_topic'] = $this->getTopicArticle($ID_title);
        }

		return $hasil;
		
	}

    public function getTopicArticle($ID_article){
        $sql = 'select a.*,b.Name_topic,b.CreateAT,b.UpdateBY 
                from db_blogs.show_topic as a join db_blogs.topic as b on a.ID_topic = b.ID_topic
                where a.ID_article = '.$ID_article.'
                 ';
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

	function list_contact(){
		$hasil= $this->db->query('select * from db_blogs.contact order by ID_contact desc');
		return $hasil->result();
	}

    function list_banner(){
        $hasil= $this->db->query('select * from db_blogs.banner order by ID_banner desc');
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

    function save_banner($data){

        $this->db->insert('db_blogs.banner', $data);
        return $this->db->insert_id();
        // $result=$this->db->insert('article',$data);
    }

    public function update_banner($where, $data)
    {
        $this->db->where('ID_Banner',$where);
        $this->db->update('db_blogs.banner', $data);
        return 1;
    }

    function delete_banner(){
       
        $id = $this->input->post('id');
        $hasil=$this->db->query("DELETE FROM db_blogs.banner WHERE ID_Banner='$id'");
        return $hasil;
    }

 	public function get_by_idbanner($id)
    {
        return $this->db->get_where('db_blogs.banner', array('ID_Banner' => $id))->row();
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
       $this->load->model('m_setting');
        $id = $this->input->post('id');
        // check data transaction
        $chk = $this->m_setting->checkTransactionData('db_blogs.article','ID_category',$id);
        if ($chk) {
            $hasil=$this->db->query("DELETE FROM db_blogs.category WHERE ID_category='$id'");
            return $hasil;
        }
        else
        {
            return '';
        }
        
    }

    // ========== END CRUD ====== //
    
    function get_change_post_to($ID_master_group)
    {
        $this->db->where('ID_master_group', $ID_master_group);
        $this->db->where('Active', 1);
        $this->db->order_by('ID_set_group', 'ASC');
        $query = $this->db->get('db_blogs.set_group');
        $output = '';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->ID_set_group.'">'.$row->GroupName.'</option>';
            
        }
        return $output;
    }

}