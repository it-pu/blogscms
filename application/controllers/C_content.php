<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_content extends MY_Controller {
    
    function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        // header('Content-Type: application/json');
        $this->load->model('m_article');
        $this->load->model('m_setting');
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
        $data['Arr_ASmaster'] =  $this->db->query('select * from db_blogs.set_master_group where Active = 1')->result_array();
        $data['Arr_AS'] =  $this->db->query('select * from db_blogs.set_group where (Active = 1 or ID_set_group = 0) ')->result_array();
        $data['Arr_Topic'] =  json_encode($this->db->query('select * from db_blogs.topic')->result_array());
        $content = $this->load->view('V_article',$data,true);
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
    function change_post_to()
    {
        if($this->input->post('ID_master_group'))
        {
            echo $this->m_article->get_change_post_to($this->input->post('ID_master_group'));
        }
    }
    public function banner()
    {
        $content = $this->load->view('V_banner','',true);
        parent::template($content);
    }
    public function contact()
    {
        $content = $this->load->view('V_contact','',true);
        parent::template($content);
    }

    public function setting(){
        $content = $this->load->view('V_setting','',true);
        parent::template($content);
    }

    // ===== CRUD Article ====== //
    function show_articlebylimit(){
        $input = $this->getInputToken();
        $data=$this->m_article->loadByLimit_article();
        echo json_encode($data);
    }

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
    function show_banner(){
        $data=$this->m_article->list_banner();
        echo json_encode($data);
    }

    function save_category(){
        date_default_timezone_set('Asia/Jakarta');
        $dataTime = date('Y-m-d H:i:s') ;

        $data = [
                // 'ID_title'  => $this->input->post('id_title'), 
                'Name' => $this->input->post('title'), 
                'CreateAT' => $dataTime,
                'UpdateBY' => $this->session->userdata('Username'),
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
                'CreateAT1' => $dataTime,
                'UpdateBY1' => $this->session->userdata('Username'),
            ];

        $where =$this->input->post('idtitle_edit');
        $this->m_article->update_category($where, $data);     

        echo json_encode(array("status" => TRUE));
        
    }

    function save_article(){
        date_default_timezone_set('Asia/Jakarta');
        $dataTime = date('Y-m-d H:i:s') ;
        // print_r($this->input->post());die();
        $this->_validate();
        $data = [
                // 'ID_title'  => $this->input->post('id_title'), 
                'ID_category'  => $this->input->post('category'), 
                'Title' => $this->input->post('title'), 
                'Content' => $this->input->post('content'),
                'Url' => $this->input->post('url'),
                'Status' => $this->input->post('status'),
                'CreateAT' => $dataTime,
                'UpdateBY' => $this->session->userdata('Username'),
                'ID_set_group' => $this->input->post('ID_set_group'),
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

    function save_banner(){
        date_default_timezone_set('Asia/Jakarta');
        $dataTime = date('Y-m-d H:i:s') ;
        // print_r($this->input->post());die();
        $this->_validatebanner();
        $data = [
                // 'ID_title'  => $this->input->post('id_title'), 
                'Title_Banner' => $this->input->post('title'), 
                'Link' => $this->input->post('url'),
                'CreateAT' => $dataTime,
                'CreateBY' => $this->session->userdata('Username'),
            ];
            if(!empty($_FILES['photo']['name']))
            {
                $upload = $this->_do_uploadbanner();
                $data['Img'] = $upload;
            }
        $insert = $this->m_article->save_banner($data);
        // $result=$this->db->insert('article',$data);
        echo json_encode(array("status" => TRUE));
        
    }

    function update_banner(){
         // header('Content-Type: application/json');
        date_default_timezone_set('Asia/Jakarta');
        $dataTime = date('Y-m-d H:i:s') ;
        // $this->_validate();
        $data = array(
                'Title_Banner' => $this->input->post('title_edit'), 
                'Link' => $this->input->post('url_edit'),
                'UpdateAT' => $dataTime,
                'UpdateBY' => $this->session->userdata('Username'),
            );
 
        // if($this->input->post('remove_photo')) // if remove photo checked
        // {
        //     if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
        //         unlink('upload/'.$this->input->post('remove_photo'));
        //     $data['Images'] = '';
        // }
 
        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_uploadbanner();
             
            //delete file
            $idbanner = $this->m_article->get_by_idbanner($this->input->post('idtitle_edit'));
            if(file_exists('upload/'.$idbanner->Img) && $idbanner->Img)
                unlink('upload/'.$idbanner->Img);
 
            $data['Img'] = $upload;
        }

        $where =$this->input->post('idtitle_edit');
        $this->m_article->update_banner($where, $data);        
        echo json_encode(array("status" => TRUE));
        // return print_r(json_encode($data));
        // return print_r($where);
    }
    function delete_banner(){

        $id= $this->input->post('id');
         //delete file
        $idarticle = $this->m_article->get_by_idbanner($id);
        if($idarticle->Img!='' && file_exists('./upload/'.$idarticle->Img) ){
            unlink('upload/'.$idarticle->Img);
        }
        // if(file_exists('upload/'.$idarticle->Images) && $idarticle->Images)
        //     unlink('upload/'.$idarticle->Images);

        $this->m_article->delete_banner();
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
                'ID_category'  => $this->input->post('category_edit'), 
                'Title' => $this->input->post('title_edit'), 
                'Content' => $this->input->post('content_edit'),
                'Url' => $this->input->post('url_edit'),
                'Status' => $this->input->post('status_edit'),
                'CreateAT1' => $dataTime,
                'UpdateBY1' => $this->session->userdata('Username'),
                'ID_master_group' => $this->input->post('EditID_master_group'),
                'ID_set_group' => $this->input->post('EditID_set_group'),
            );
        // if($this->input->post('remove_photo')) // if remove photo checked
        // {
        //     if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
        //         unlink('upload/'.$this->input->post('remove_photo'));
        //     $data['Images'] = '';
        // }
 
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
        if($idarticle->Images!='' && file_exists('./upload/'.$idarticle->Images) ){
            unlink('upload/'.$idarticle->Images);
        }
        // if(file_exists('upload/'.$idarticle->Images) && $idarticle->Images)
        //     unlink('upload/'.$idarticle->Images);

        $this->m_article->delete_article();
        echo json_encode(array("status" => TRUE));
        
    }

    function delete_category(){
        $deleteProcess = $this->m_article->delete_category();
        if ($deleteProcess == 1) {
            echo json_encode(array("status" => TRUE));   
        }
        else
        {
            echo json_encode(array("status" => False,'msg' => 'The data has been using for transaction'));  
        }
          
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
                'UpdateBY' => $this->session->userdata('Username'),
            );
        $this->m_article->update_about($data);        
        echo json_encode(array("status" => TRUE));
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
        $config['allowed_types']        = 'gif|jpg|png|PNG|JPG';
        $config['encrypt_name'] = TRUE;
        $config['maintain_ratio']= false; // Ratio menyesuaikan  //false mengikutin height ratio
        $config['quality']= '100%';
        $config['max_size'] = '2048'; //2MB
        // $config['width']= 1000;
        // $config['height']= 600;
        $config['create_thumb']= FALSE;
        
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
                        
            // $config["image_sizes"]["rectangle"] = array(600, 400);
            // $config['x_axis'] = 500; //left->crop
            // $config['y_axis'] = 500; //top crop
            // $config['new_image']= './upload/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();

        }else{

            $data['error_string'][] = 'The Image file size shoud not exceed 2MB!';
            $data['inputerror'][] = 'photo';
             //show ajax error
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
        // if (($_FILES['photo']['name'])=='')
        // {
        //     $data['inputerror'][] = 'photo';
        //     $data['error_string'][] = 'Photo is required';
        //     $data['status'] = FALSE;
        // } 
        // if($this->input->post('photo') == '')
        // {
        //     $data['inputerror'][] = 'photo';
        //     $data['error_string'][] = 'photo is required';
        //     $data['status'] = FALSE;
        //     // Do anything for not being valid          
        // }
 
        if($this->input->post('status') == '')
        {
            $data['inputerror'][] = 'status';
            $data['error_string'][] = 'Status is required';
            $data['status'] = FALSE;
        }
 
        if (($_FILES['photo']['name'])=='')
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Photo is required';
            $data['status'] = FALSE;
        } 

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _do_uploadbanner()
    {
        $config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png|PNG|JPG';
        $config['encrypt_name'] = TRUE;
        $config['maintain_ratio']= false; // Ratio menyesuaikan  //false mengikutin height ratio
        $config['quality']= '100%';
        $config['max_size'] = '2048'; //2MB
        $config['width']= 515;
        $config['height']= 460;
        $config['create_thumb']= FALSE;
        
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
                        
            // $config["image_sizes"]["rectangle"] = array(600, 400);
            // $config['x_axis'] = 500; //left->crop
            // $config['y_axis'] = 500; //top crop
            $config['new_image']= './upload/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();

        }else{

            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('','');
            $data['inputerror'][] = 'photo';
             //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    private function _validatebanner()
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

        if($this->input->post('url') == '')
        {
            $data['inputerror'][] = 'url';
            $data['error_string'][] = 'Url is required';
            $data['status'] = FALSE;
        }
        if (($_FILES['photo']['name'])=='')
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Photo is required';
            $data['status'] = FALSE;
        } 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

    }

    function data_setting_master_group(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        $Input = $this->getInputToken();
        $action = $Input['action'];
        $rs = [];
        switch ($action) {
            case 'LoadData':
                $rs = $this->m_setting->MasterGroup_LoadData();
                break;
            case 'datatables':
                $rs = $this->m_setting->MasterGroup_LoadData_datatables();
                break;
            case 'add' : 
                $data = $Input['data'];
                $this->db->insert('db_blogs.set_master_group',$data);
                $rs = ['status' => 1,'msg' => ''];
            case 'edit' :
                $ID = $Input['ID']; 
                $data = $Input['data'];
                $this->db->where('ID_master_group',$ID);
                $this->db->update('db_blogs.set_master_group',$data);
                $rs = ['status' => 1,'msg' => ''];
                break;
            case 'delete' :
                $ID = $Input['ID'];
                // check data telah di gunakan atau belum
                // $chk =  $this->m_setting->checkTransactionData('db_blogs.set_list_member','ID_set_group',$ID);
                // if ($chk) {
                //     $this->db->where('ID_set_group',$ID);
                //     $this->db->delete('db_blogs.set_group');
                //     $rs = ['status' => 1,'msg' => ''];
                // }
                // else
                // {
                //     $rs = ['status' => 0,'msg' => 'The data has been using for transaction'];
                // }
                $data = $Input['data'];
                $this->db->where('ID_master_group',$ID);
                $this->db->update('db_blogs.set_master_group',['Active' => 0 ] );
                $rs = ['status' => 1,'msg' => ''];
                break;
            default:
                # code...
                break;
        }

        echo json_encode($rs);
    }

    function data_setting_group(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        $Input = $this->getInputToken();
        $action = $Input['action'];
        // $idgroup = $Input['idgroup'];
        
        $rs = [];
        switch ($action) {
            case 'LoadData':
                $rs = $this->m_setting->Group_LoadData();
                break;
            case 'LoadSelect':
                $idgroup = $Input['idgroup'];
                $rs = $this->m_setting->Group_LoadDataSelect($idgroup);
                break;    
            case 'datatables':
                $rs = $this->m_setting->Group_LoadData_datatables();
                break;
            case 'add' : 
                $data = $Input['data'];
                // print_r($data);die();
                $ck=$this->db->insert('db_blogs.set_group',$data);
                $insert_id = $this->db->insert_id();
                $rs = ['status' => 1,'msg' => ''];
                // if($insert_id){
                //     $hasil = $this->db->query('select * from db_blogs.set_group where Active = 1 and ID_set_group='.$insert_id.' ')->result_array();
                //     $data = array();
                //     for ($i=0; $i < count($hasil); $i++) { 
                //         $nestedData = array();
                //         $row = $hasil[$i]; 
                //         $nestedData[] = ($i+1);
                //         $nestedData[] = $row['ID_master_group']; 
                //         $nestedData[] = $row['ID_set_group'];     
                //         $data[] = $nestedData;
                //     }
                //     $this->db->insert('db_blogs.set_master_join',$data);
                // }
                    
                
            case 'edit' :
                $ID = $Input['ID']; 
                $data = $Input['data'];
                $this->db->where('ID_set_group',$ID);
                $this->db->update('db_blogs.set_group',$data);
                $rs = ['status' => 1,'msg' => ''];
                break;
            case 'delete' :
                $ID = $Input['ID'];
                // check data telah di gunakan atau belum
                // $chk =  $this->m_setting->checkTransactionData('db_blogs.set_list_member','ID_set_group',$ID);
                // if ($chk) {
                //     $this->db->where('ID_set_group',$ID);
                //     $this->db->delete('db_blogs.set_group');
                //     $rs = ['status' => 1,'msg' => ''];
                // }
                // else
                // {
                //     $rs = ['status' => 0,'msg' => 'The data has been using for transaction'];
                // }
                $data = $Input['data'];
                $this->db->where('ID_set_group',$ID);
                $this->db->update('db_blogs.set_group',['Active' => 0 ] );
                $rs = ['status' => 1,'msg' => ''];
                break;
            default:
                # code...
                break;
        }

        echo json_encode($rs);
    }

    function data_setting_member(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        $Input = $this->getInputToken();
        $action = $Input['action'];
        $rs = [];
        switch ($action) {
            case 'LoadData':
                $rs = $this->m_setting->member_LoadData();
                break;
            case 'datatables' :
                $rs = $this->m_setting->member_LoadData_datatables();
                break;
            case 'add' : 
                $data = $Input['data'];
                $this->db->insert('db_blogs.set_member',$data);
                $rs = ['status' => 1,'msg' => ''];
            case 'edit' :
                $ID = $Input['ID']; 
                $data = $Input['data'];
                $this->db->where('ID_set_member',$ID);
                $this->db->update('db_blogs.set_member',$data);
                $rs = ['status' => 1,'msg' => ''];
                break;
            case 'delete' :
                $ID = $Input['ID'];
                $data = $Input['data'];
                $this->db->where('ID_set_member',$ID);
                $this->db->update('db_blogs.set_member',['Active' => 0 ] );
                $rs = ['status' => 1,'msg' => ''];
                break;
            default:
                # code...
                break;
        }

        echo json_encode($rs);
    }

    function data_setting_listmember(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        $Input = $this->getInputToken();
        $Input = json_decode(json_encode($Input),true);
        $action = $Input['action'];
        $rs = [];
        switch ($action) {
            case 'datatables':
                $rs = $this->m_setting->listmember_datatables($Input);
                break;
            case 'add' : 
                $data = $Input['data'];
                $data['UpdateBY'] = $this->session->userdata('Username');
                $data['UpdateAT'] = date('Y-m-d H:i:s');

                $this->db->insert('db_blogs.set_list_member',$data);
                $rs = ['status' => 1,'msg' => ''];
            case 'edit' :
                $ID = $Input['ID']; 
                $data = $Input['data'];
                $data['UpdateBY'] = $this->session->userdata('Username');
                $data['UpdateAT'] = date('Y-m-d H:i:s');
                $this->db->where('ID_set_list_member',$ID);
                $this->db->update('db_blogs.set_list_member',$data);
                $rs = ['status' => 1,'msg' => ''];
                break;
            case 'delete' :
                $ID = $Input['ID']; 
                $this->db->where('ID_set_list_member',$ID);
                $this->db->delete('db_blogs.set_list_member');
                $rs = ['status' => 1,'msg' => ''];
                break;
            default:
                # code...
                break;
        }

        echo json_encode($rs);
    }

    function show_topic(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        error_reporting(0);
        $rs = ['status' => 0,'msg' => ''];
        try {
            $Input = $this->getInputToken();
            $Input = json_decode(json_encode($Input),true);
            $this->db->query('TRUNCATE TABLE db_blogs.show_topic');
            for ($i=0; $i < count($Input); $i++) { 
                $data = $Input[$i];
                $this->db->insert('db_blogs.show_topic',$data);
            }

            $rs['status'] = 1;
        } catch (Exception $e) {
            $rs['msg'] = $e;
        }

        echo json_encode($rs);
        
    }

    /// ============= ==============  ///
 
}
