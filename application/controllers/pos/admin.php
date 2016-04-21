<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        // Your own constructor code

        $enc = $this->session->userdata('admin_id');
        if(trim($enc)==""){
            redirect('pos-signout');
        }

    }
    public function index()
	{
        $this->load->model('Admin_model');            
        $admin = $this->Admin_model->get();   
        $data['title'] = "Admin";
        $data['data'] = $admin;
        $data['csrf'] = $this->encrypt->encode("n0hkie");
        $this->load->view('shared/pos/header', $data);
        $this->load->view('shared/pos/body');
        $this->load->view('shared/pos/datatables');
        $this->load->view('pos/list_admin',$data);
        $this->load->view('shared/pos/footer');
	}
        
    public function create(){
        
        $data['csrf'] = $this->encrypt->encode("n0hkie");
        $data['title'] = "Create Admin";
        
        $this->load->view('shared/pos/header', $data);
        $this->load->view('shared/pos/body');
        $this->load->view('pos/create_admin', $data);    
        $this->load->view('shared/pos/footer');        
    }
    
    public function edit($token){
        $admin_id = $this->input->get('r', TRUE);
        
        $data['admin_id'] = $admin_id;        
        $data['csrf'] = $this->encrypt->encode("n0hkie");
        $data['token'] = $this->encrypt->encode($admin_id);
        $data['title'] = "Edit Admin";
        
        $this->load->model('Admin_model');
        $this->load->model('Authadmin_model');
        
        $admin = $this->Admin_model->get_admin($data);
        $authadmin = $this->Authadmin_model->get_authadmin($data);
        
        $data['last_name'] = $admin['last_name'];
        $data['first_name'] = $admin['first_name'];
        $data['username'] = $authadmin['username'];
        
        $this->load->view('shared/pos/header', $data);
        $this->load->view('shared/pos/body');
        $this->load->view('pos/edit_admin', $data);    
        $this->load->view('shared/pos/footer');        
    }    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */