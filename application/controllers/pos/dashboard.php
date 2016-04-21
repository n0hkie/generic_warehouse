<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
    public function index()
	{
		
		$this->load->model('Product_model');
		$Product = $this->Product_model->get_list();
		$rack = [];
		$rack_fron = [];
		$bin = [];
		if(isset($Product)||$Product!=null){
			foreach ($Product->result() as $row){
				if(!in_array($row->rack_location, $rack)){
					array_push($rack, $row->rack_location);
					array_push($rack_fron, array($row->rack_location,$row->rack_front));
					array_push($bin,array('rack_id'=>$row->rack_id,
										'rack_name'=>$row->rack_name,
										'rack_location'=>$row->rack_location,
										'rack_front'=>$row->rack_front,
										'bin_id'=>$row->bin_id,
										'bin_name'=>$row->bin_name,
										'bin_location'=>$row->bin_location,
										'prod_id'=>$row->prod_id,
										'prod_name'=>$row->prod_name,
										'prod_quantity'=>$row->prod_quantity,
										'picker_id'=>$row->picker_id,
										'picker_name'=>$row->picker_name,
										));				
				} else {
					array_push($bin,array('rack_id'=>$row->rack_id,
										'rack_name'=>$row->rack_name,
										'rack_location'=>$row->rack_location,
										'rack_front'=>$row->rack_front,
										'bin_id'=>$row->bin_id,
										'bin_name'=>$row->bin_name,
										'bin_location'=>$row->bin_location,
										'prod_id'=>$row->prod_id,
										'prod_name'=>$row->prod_name,
										'prod_quantity'=>$row->prod_quantity,
										'picker_id'=>$row->picker_id,
										'picker_name'=>$row->picker_name,
										));				
				}
			}
		}		
		
        $data['title'] = "My Dashboard";
		asort($rack);
		$data['rack'] = $rack;
		$data['rack_fron'] = $rack_fron;
		$data['bin'] = $bin;
        $this->load->view('shared/pos/header', $data);
        $this->load->view('shared/pos/body');
        $this->load->view('pos/dashboard');
        $this->load->view('shared/pos/footer');
	}   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */