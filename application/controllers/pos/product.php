<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

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

        $enc = $this->input->post('session_id', TRUE);
        
        if($enc!=""){
            
            $admin['admin_id'] = $this->encrypt->decode($enc);
            
            $this->load->model('Admin_model');            
            $admin = $this->Admin_model->get_admin($admin);
            $newdata = array(
                'admin_id'   => $enc,
                'last_name'  => $admin['last_name'],
                'first_name' => $admin['last_name']
            );

            $this->session->set_userdata($newdata);            
        } else {
            $enc = $this->session->userdata('admin_id');
            if(trim($enc)==""){
                redirect('pos-signout');
            }
        }
    }
    public function find()
	{  
        $data['title'] = "Find Product";
        $data['data'] = null;
        $data['csrf'] = $this->encrypt->encode("n0hkie");
        $this->load->view('shared/pos/header', $data);
        $this->load->view('shared/pos/body');
        $this->load->view('shared/pos/datatables');
        $this->load->view('pos/find_product',$data);
        $this->load->view('shared/pos/footer');
	}
    
    public function order()
	{  
        $data['title'] = "Order Product";
        $data['data'] = null;
        
		$this->load->model('Product_model');
		$Product_model = $this->Product_model->get_list();
        
        if(isset($Product_model)||$Product_model!=null){
            if(count($Product_model->result())>0){
                $data['data'] = $Product_model;
            }
        }
        $data['csrf'] = $this->encrypt->encode("n0hkie");
        $this->load->view('shared/pos/header', $data);
        $this->load->view('shared/pos/body');
        $this->load->view('shared/pos/datatables');
        $this->load->view('pos/order_product',$data);
        $this->load->view('shared/pos/footer');
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */