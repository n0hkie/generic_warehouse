<?php
class Admin_model extends CI_Model {

    var $table = 'tbl_admin';
    
    function __construct()
    {
        parent::__construct();
    }
    
    function get_admin($data){
        $id = $data['admin_id'];
        
        $this->db->select('strLastName,strFirstName');
        
        $this->db->where('intID',$id);
        
        $query = $this->db->get($this->table);
        try{
            $ret["last_name"] = $query->row()->strLastName;
            $ret["first_name"] = $query->row()->strFirstName;
            return $ret;
        } catch(Exception $e){
            return 0;
        }
        
    }
    function get(){
        $this->db->select('intID, strLastName, strFirstName');
        $query = $this->db->get($this->table);
        try{
            return $query;
        } catch(Exception $e){
            return 0;
        }
    }
    function create($data){
        $fields['strLastName']=$data['last_name'];
        $fields['strFirstName']=$data['first_name'];
        try{
            $this->db->insert($this->table, $fields); 
            return $this->db->insert_id();
        } catch(Exception $e){
            return 0;
        }
    }
    function delete($data){
        try{
            $this->db->delete($this->table, array('intID' => $data['id'])); 
            return $this->db->affected_rows();
        } catch(Exception $e){
            return 0;
        }
    }  
    function update($data){
        $fields = array(
                       'strLastName' => $data['last_name'],
                       'strFirstName' => $data['first_name']
                    );

        $this->db->where('intID', $data['admin_id']);
        $this->db->update($this->table, $fields); 
    }
}