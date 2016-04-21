<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Api extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
        $headers = $this->input->request_headers();
        $csrf = "";
        foreach($headers as $key=>$val){
            if(trim(strtolower($key))=="csrf"){
                $csrf = $val;
            }
        }
        $token = $this->encrypt->decode($csrf);
        
        $ret['success'] = 0;
        $ret['message'] = 'System Error!';
        $ret['data'] = null;

        if($token!="n0hkie"){
            echo json_encode($ret);
            exit;
        }

    }
    public function index()
	{

	}
        
    public function create()
    {
        $ret['success'] = 0;
        $ret['message'] = 'System Error!';
        $ret['data'] = null;
                        
        $last_name = $this->input->post('last_name', TRUE);
        $first_name = $this->input->post('first_name', TRUE);        
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $data['last_name'] = $last_name;
        $data['first_name'] = $first_name;
        $data['username'] = $username;
        $data['password'] = $password;        

        $this->load->model('Admin_model');
        $this->load->model('Authadmin_model');
        $found = $this->Authadmin_model->find_username($data);
        
        if($found>0){
            $ret['success'] = 0;
            $ret['message'] = 'Username already exist.';
            $ret['data'] = null;            
            
        } else {
            if(trim($last_name)=="" || trim($first_name)=="" || trim($username)=="" || trim($password)==""){
                $ret['success'] = 0;
                $ret['message'] = 'Please fillin required fields.';
                $ret['data'] = null;
            } else {

                $admin_id = $this->Admin_model->create($data);
                if($admin_id>0){
                    $data['admin_id'] = $admin_id;                
                    $id = $this->Authadmin_model->create($data);
                    if($id>0){
                        $admin['admin_id'] = $this->encrypt->encode($admin_id);
                        $ret['success'] = 1;
                        $ret['message'] = 'Success.';
                        $ret['data'] = $admin;
                    }
                } else {
                    $ret['success'] = 0;
                    $ret['message'] = 'Failed to save data.';
                    $ret['data'] = null;
                }
            }
        }
        echo json_encode($ret);
    }
    
    public function update()
    {
        $ret['success'] = 0;
        $ret['message'] = 'System Error!';
        $ret['data'] = null;
                        
        $last_name = $this->input->post('last_name', TRUE);
        $first_name = $this->input->post('first_name', TRUE);        
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $token = $this->input->post('token', TRUE);

        $data['last_name'] = $last_name;
        $data['first_name'] = $first_name;
        $data['username'] = $username;
        $data['password'] = $password;        
        $data['admin_id'] = $this->encrypt->decode($token);        

        $this->load->model('Admin_model');
        $this->load->model('Authadmin_model');
        $found = $this->Authadmin_model->find_username($data);
        $ret['data'] = $found;
        if($found==$data['admin_id']){
            $found=0;
        }
        if($found>0){
            $ret['success'] = 0;
            $ret['message'] = 'Username already exist.';
            $ret['data'] = null;            
            
        } else {
            if(trim($last_name)=="" || trim($first_name)=="" || trim($username)==""){
                $ret['success'] = 0;
                $ret['message'] = 'Please fillin required fields.';
                $ret['data'] = null;
            } else {
                $this->Admin_model->update($data);
                $this->Authadmin_model->update($data);                
                $ret['success'] = 1;
                $ret['message'] = 'Successfully updated.';
                $ret['data'] = null;                
            }
        }
        echo json_encode($ret);
    }    
    public function delete(){
        $ret['success'] = 0;
        $ret['message'] = 'System Error!';
        $ret['data'] = null;
                        
        $admin_id = $this->input->post('admin_id', TRUE);        
        $data['id'] = $this->encrypt->decode($admin_id);      

        $this->load->model('Admin_model');
        $this->load->model('Authadmin_model');
        $del_admin = $this->Admin_model->delete($data);
        if($del_admin>0){
            $del_authadmin = $this->Authadmin_model->delete($data);
            if($del_authadmin){
                $ret['success'] = 1;
                $ret['message'] = 'Deleted!';
                $ret['data'] = null;
            }
        }
        
        
        echo json_encode($ret);    
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */