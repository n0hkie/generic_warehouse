<?php
class Authadmin_model extends CI_Model {

    var $table = 'tbl_auth_admin';
    
    function __construct()
    {
        parent::__construct();
        
    }
    
    function get_id($data){
        $password = $data['password'];
        
        try{
            $this->db->select('intAdminID, strPassword');
            $this->db->where('strUsername',$data['username']);
            $query = $this->db->get($this->table);  
            
            $ret = $query->row()->strPassword;
            $passwordDB = $this->encrypt->decode($ret);
            if($passwordDB==$password){
                return $query->row()->intAdminID;
            } else {
                return 0;
            }
        } catch(Exception $e){
            return 0;
        }
        
    }
    function get_authadmin($data){
        $id = $data['admin_id'];
        
        $this->db->select('strUsername');
        
        $this->db->where('intAdminID',$id);
        
        $query = $this->db->get($this->table);
        try{
            $ret["username"] = $query->row()->strUsername;
            return $ret;
        } catch(Exception $e){
            return 0;
        }    
    }
    
    function create($data){
        $fields['intAdminID']=$data['admin_id'];
        $fields['strUsername']=$data['username'];
        $fields['strPassword']=$this->encrypt->encode($data['password']);
        try{
            $this->db->insert($this->table, $fields); 
            return $this->db->insert_id();
        } catch(Exception $e){
            return 0;
        }
    }  
    
    function find_username($data){
        try{
            $this->db->select('intAdminID');
            $this->db->where('strUsername',$data['username']);
            $query = $this->db->get($this->table);  
            $id = (isset($query->row()->intAdminID)?$query->row()->intAdminID:0);
            return $id;
            
        } catch(Exception $e){
            return 0;
        }    
            
    }
    function update($data){
        if(trim($data['password'])==""){
            $fields = array(
                           'strUsername' => $data['username']
                        );
        } else {
            $fields = array(
                           'strUsername' => $data['username'],
                           'strPassword' => $this->encrypt->encode($data['password'])
                        );
        }
        $this->db->where('intAdminID', $data['admin_id']);
        $this->db->update($this->table, $fields); 
    }    
    function delete($data){
        $this->db->delete($this->table, array('intAdminID' => $data['id'])); 
        return $this->db->affected_rows();
    }
}