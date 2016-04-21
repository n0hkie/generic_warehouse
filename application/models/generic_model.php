<?php
class Generic_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function get_list($data){
        $this->db->select('*');
        $query = $this->db->get($data['table']);
        try{
            return $query;
        } catch(Exception $e){
            return 0;
        }    
    }
    function find($data, $where){
        $this->db->select('*');
        $query = $this->db->get_where($data['table'], $where);
        try{
            return $query;            
        } catch(Exception $e){
            return 0;
        }          
    }    
    function find_id($data, $where){
        $this->db->select('id');
        $query = $this->db->get_where($data['table'], $where);
        try{
            $id = (isset($query->row()->id)?$query->row()->id:0);
            return $id;            
        } catch(Exception $e){
            return 0;
        }          
    }
    function create($data, $fields){
        try{
            $this->db->insert($data['table'], $fields); 
            return $this->db->insert_id();
        } catch(Exception $e){
            return 0;
        }    
    }
    function delete($data, $where){
        try{
            $this->db->delete($data['table'], $where); 
            return $this->db->affected_rows();
        } catch(Exception $e){
            return 0;
        }
    } 
    function update($data, $fields, $where){
        $this->db->where($where);
        $this->db->update($data['table'], $fields); 
        return $this->db->affected_rows();
    }    
}