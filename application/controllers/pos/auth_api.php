<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_Api extends CI_Controller {

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
        
        $ret['success'] = 0;
        $ret['message'] = 'System Error!';
        $ret['data'] = null;
                        
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $data['username'] = $username;
        $data['password'] = $password;

        $this->load->model('Authadmin_model');

        if(trim($username)=="" || trim($password)==""){
            $ret['success'] = 0;
            $ret['message'] = 'Wrong Username or Password.';
            $ret['data'] = null;
        } else {

            $admin_id = $this->Authadmin_model->get_id($data);
            if($admin_id>0){
                $admin['admin_id'] = $this->encrypt->encode($admin_id);
                $ret['success'] = 1;
                $ret['message'] = 'Success.';
                $ret['data'] = $admin;
            } else {
                $ret['success'] = 0;
                $ret['message'] = 'Wrong Username or Password.';
                $ret['data'] = null;
            }
        }
        
        echo json_encode($ret);
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */