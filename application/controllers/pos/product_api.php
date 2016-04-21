<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_Api extends CI_Controller {

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
        
    public function find_by_location()
    {
        $ret['success'] = 0;
        $ret['message'] = 'System Error!';
        $ret['data'] = null;
		
        $bin_name = $this->input->post('bin_name', TRUE);        

		$where['tbl_bin.strName'] = strtoupper($bin_name);
		$this->load->model('Product_model');
		
		$Product_model = $this->Product_model->find_by($where);		
		if(isset($Product_model)||$Product_model!=null){
			if(count($Product_model->result())>0){
				$ret['success'] = 1;
				$ret['message'] = 'Found!';
				$ret['data'] = $Product_model->result();				
			} else {
				$ret['success'] = 0;
				$ret['message'] = 'No data!';
				$ret['data'] = null;			
			}
		
		} else {
			$ret['success'] = 0;
			$ret['message'] = 'No data!';
			$ret['data'] = null;		
		}
        echo json_encode($ret);
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */