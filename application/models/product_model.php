<?php
class Product_model extends CI_Model {

	var $table = 'tbl_product';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_list()
    {

		$select = 'tbl_product.intID as prod_id,';
		$select.= 'tbl_product.strName as prod_name,';
		$select.= 'tbl_product.intQuantity as prod_quantity,';
		$select.= 'tbl_bin.intID as bin_id,';
		$select.= 'tbl_bin.strName as bin_name,';
		$select.= 'tbl_bin.intLocation as bin_location,';
		$select.= 'tbl_rack.intID as rack_id,';
		$select.= 'tbl_rack.strName as rack_name,';
		$select.= 'tbl_rack.intLocation as rack_location,';
		$select.= 'tbl_rack.strOpen as rack_front,';
		$select.= 'tbl_picker.intID as picker_id,';
		$select.= 'tbl_picker.strName as picker_name';
		
        $this->db->select($select);
        $this->db->from($this->table);
        $this->db->join('tbl_bin', 'tbl_bin.intID = tbl_product.intBinID', 'left');
        $this->db->join('tbl_rack', 'tbl_rack.intID = tbl_bin.intRackID', 'left');
        $this->db->join('tbl_picker', 'tbl_picker.intRackID = tbl_rack.intID', 'left');
        $this->db->order_by('bin_id','desc');
        $query = $this->db->get();
        try{
            return $query;
        } catch(Exception $e){
            return null;
        } 
    }
	
    public function find_by($where)
    {

		$select = 'tbl_product.intID as prod_id,';
		$select.= 'tbl_product.strName as prod_name,';
		$select.= 'tbl_product.intQuantity as prod_quantity,';
		$select.= 'tbl_bin.intID as bin_id,';
		$select.= 'tbl_bin.strName as bin_name,';
		$select.= 'tbl_bin.intLocation as bin_location,';
		$select.= 'tbl_rack.intID as rack_id,';
		$select.= 'tbl_rack.strName as rack_name,';
		$select.= 'tbl_rack.intLocation as rack_location,';
		$select.= 'tbl_rack.strOpen as rack_front,';
		$select.= 'tbl_picker.intID as picker_id,';
		$select.= 'tbl_picker.strName as picker_name';
		
        $this->db->select($select);
        $this->db->from($this->table);
        $this->db->join('tbl_bin', 'tbl_bin.intID = tbl_product.intBinID', 'left');
        $this->db->join('tbl_rack', 'tbl_rack.intID = tbl_bin.intRackID', 'left');
        $this->db->join('tbl_picker', 'tbl_picker.intRackID = tbl_rack.intID', 'left');
        $this->db->order_by('bin_id','desc');
		$this->db->where($where);
        $query = $this->db->get();
        try{
            return $query;
        } catch(Exception $e){
            return null;
        } 
    }	
    
    
}