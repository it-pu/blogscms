<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_content extends MY_Controller {
	
	function __construct()
    {
        parent::__construct();
         // header('Access-Control-Allow-Origin: *');
        // header('Content-Type: application/json');
        $this->load->model('m_article');
	}

	public function dateTimeNow(){
        date_default_timezone_set('Asia/Jakarta');
        $dataTime = date('Y-m-d H:i:s') ;
        return $dataTime;
    }

	public function temp($content)
    {
        parent::template($content);
    }

	public function index()
	{
		$data["pageTitle"] = "Dashboard";
		$content = $this->load->view('template/V_content',$data,true);
		parent::template($content);
	}

	public function article()
	{
		$content = $this->load->view('V_article','',true);
		parent::template($content);
	}

	public function add_article()
	{
		date_default_timezone_set('Asia/Jakarta');
		$content = $this->load->view('V_addarticle','',true);
		parent::template($content);
	}

	public function about()
	{
		$content = $this->load->view('V_editabout','',true);
		parent::template($content);
	}

	public function category()
	{
		$content = $this->load->view('V_category','',true);
		parent::template($content);
	}

	public function contact()
	{
		$content = $this->load->view('V_contact','',true);
		parent::template($content);
	}

	// ===== CRUD Article ====== //
	
    function show_article(){
        $data=$this->m_article->list_article();
        echo json_encode($data);
    }
     function show_contact(){
        $data=$this->m_article->list_contact();
        echo json_encode($data);
    }
    function show_about(){
    	$id = $this->input->post('id');
        $data = $this->m_article->data_about($id);
        echo json_encode($data);
    }

    function show_category(){
        $data=$this->m_article->show_category();
        echo json_encode($data);
    }
 	
    function save_category(){
    	date_default_timezone_set('Asia/Jakarta');
        $dataTime = date('Y-m-d H:i:s') ;

        $data = [
                // 'ID_title'  => $this->input->post('id_title'), 
                'Name' => $this->input->post('title'), 
                'CreateAT' => $dataTime,
                'UpdateBY' => $this->session->userdata('Name'),
            ];
	    $insert = $this->m_article->save_category($data);
        // $result=$this->db->insert('article',$data);
        echo json_encode(array("status" => TRUE));
    	
    }

    function update_category(){
    	date_default_timezone_set('Asia/Jakarta');
        $dataTime = date('Y-m-d H:i:s') ;
        
        $data = [
                // 'ID_title'  => $this->input->post('id_title'), 
                'Name' => $this->input->post('title_edit'), 
                'CreateAT' => $dataTime,
                'UpdateBY' => $this->session->userdata('Name'),
            ];

        $where =$this->input->post('idtitle_edit');
        $this->m_article->update_category($where, $data);     

        echo json_encode(array("status" => TRUE));
    	
    }

    function save_article(){
    	date_default_timezone_set('Asia/Jakarta');
        $dataTime = date('Y-m-d H:i:s') ;

    	$this->_validate();
        $data = [
                // 'ID_title'  => $this->input->post('id_title'), 
                'Category'  => $this->input->post('category'), 
                'Title' => $this->input->post('title'), 
                'Content' => $this->input->post('content'),
                'Url' => $this->input->post('url'),
                'Status' => $this->input->post('status'),
                'CreateAT' => $dataTime,
                'UpdateBY' => $this->session->userdata('Name'),
            ];
             if(!empty($_FILES['photo']['name']))
	        {
	            $upload = $this->_do_upload();
	            $data['Images'] = $upload;
	        }
	 
	    $insert = $this->m_article->save_article($data);
        // $result=$this->db->insert('article',$data);
        echo json_encode(array("status" => TRUE));
    	
    }
 	
 	function show_editarticle($id){

        $data=$this->m_article->get_by_id($id);
        echo json_encode($data);
    }
  
    function update_article(){
    	 // header('Content-Type: application/json');
     	date_default_timezone_set('Asia/Jakarta');
        $dataTime = date('Y-m-d H:i:s') ;
        // $this->_validate();
        $data = array(
               	// 'ID_title' => $this->input->post('id'),
                'Category'  => $this->input->post('category_edit'), 
                'Title' => $this->input->post('title_edit'), 
                'Content' => $this->input->post('content_edit'),
                'Url' => $this->input->post('url_edit'),
                'Status' => $this->input->post('status_edit'),
                'CreateAT' => $dataTime,
                'UpdateBY' => $this->session->userdata('Name'),
            );
 
        if($this->input->post('remove_photo')) // if remove photo checked
        {
            if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink('upload/'.$this->input->post('remove_photo'));
            $data['Images'] = '';
        }
 
        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
             
            //delete file
            $idarticle = $this->m_article->get_by_id($this->input->post('idtitle_edit'));
            if(file_exists('upload/'.$idarticle->Images) && $idarticle->Images)
                unlink('upload/'.$idarticle->Images);
 
            $data['Images'] = $upload;
        }

 		$where =$this->input->post('idtitle_edit');
        $this->m_article->update_article($where, $data);        
        echo json_encode(array("status" => TRUE));
    	// return print_r(json_encode($data));
    	// return print_r($where);
    }
 
    function delete_article(){

    	$id= $this->input->post('id');
    	 //delete file
        $idarticle = $this->m_article->get_by_id($id);
        if($idarticle->Images!=''){
        	unlink('upload/'.$idarticle->Images);
        }
        // if(file_exists('upload/'.$idarticle->Images) && $idarticle->Images)
        //     unlink('upload/'.$idarticle->Images);

        $this->m_article->delete_article();
        echo json_encode(array("status" => TRUE));
        
    }

    function delete_category(){
        $this->m_article->delete_category();
        echo json_encode(array("status" => TRUE));     
    }

    function update_about(){
    	 // header('Content-Type: application/json');
     	date_default_timezone_set('Asia/Jakarta');
        $dataTime = date('Y-m-d H:i:s') ;
        // $this->_validate();
        $data = array(
                'Title' => $this->input->post('title'), 
                'Description' => $this->input->post('content'),
                'CreateAT' => $dataTime,
                'UpdateBY' => $this->session->userdata('Name'),
            );
        $this->m_article->update_about($data);        
        echo json_encode(array("status" => TRUE));
    }
    // ======== Summernote Image ======== //
    //Upload image summernote
	function upload_image(){
		if(isset($_FILES["image"]["name"])){
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('image')){
				$this->upload->display_errors();
				return FALSE;
			}else{
				$data = $this->upload->data();
		        //Compress Image
		        $config['image_library']='gd2';
		        $config['source_image']='./assets/upload/'.$data['file_name'];
		        $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= TRUE;
	            $config['quality']= '60%';
	            $config['width']= 1180;
	            $config['height']= 660;
	            $config['new_image']= './assets/upload/'.$data['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();
				echo base_url().'assets/upload/'.$data['file_name'];
			}
		}
	}

	//Delete image summernote
	function delete_image(){
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		if(unlink($file_name)){
	        echo 'File Delete Successfully';
	    }
	}
    // ======= END CRUD ====== //

    // ======= Validasi ====== //

    private function _do_upload()
    {
        $config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        // $config['max_size']             = 100; //set max size allowed in Kilobyte
        // $config['max_width']            = 83; // set max width image allowed
        // $config['max_height']           = 83; // set max height allowed
        // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
 
        if($this->upload->do_upload("photo")){
            $data = $this->upload->data();
 
            //Resize and Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./upload/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE; // Ratio menyesuaikan  //false mengikutin height ratio
            $config['quality']= '70%';
            $config['width']= 1082;
            $config['height']= 609;
            $config['new_image']= './upload/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);
	        $this->image_lib->resize();
	        $this->image_lib->clear();

        }else{

            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('title') == '')
        {
            $data['inputerror'][] = 'title';
            $data['error_string'][] = 'Title is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('category') == '')
        {
            $data['inputerror'][] = 'category';
            $data['error_string'][] = 'Category is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('content') == '')
        {
            $data['inputerror'][] = 'content';
            $data['error_string'][] = 'Content is required';
            $data['status'] = FALSE;
        }
 
        // if($this->input->post('url') == '')
        // {
        //     $data['inputerror'][] = 'url';
        //     $data['error_string'][] = 'Url is required';
        //     $data['status'] = FALSE;
        //     // Do anything for not being valid          
        // }
 
        if($this->input->post('status') == '')
        {
            $data['inputerror'][] = 'status';
            $data['error_string'][] = 'Status is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    /// ============= ==============  ///
 
}
