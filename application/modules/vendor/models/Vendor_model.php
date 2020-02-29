<?php
class Vendor_model extends MY_Model 
{
	function __construct() {
		parent::__construct();		
	}
        
    function new_user ($data)
    {
        $this->db->insert('user', $data);
 		
		return $this->db->insert_id();		
    }
	function new_usera ($data)
    {
        $this->db->insert('user_avability', $data);
 		
		return $this->db->insert_id();		
    }
    
	public function is_key_valid($key)
    {
        $this->db->where('key', $key);
        $query = $this->db->get('users');
        if( $query->num_rows() > 0 ){  } else { return False; }
        
        $this->db->set('is_verified', '1'); 
        $this->db->where('key',$key); 
        $this->db->update('users'); 
        return true;
    }
    
    
	function email_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        if( $query->num_rows() > 0 ){ return True; } else { return False; }
    }
    
    function email_exists_user($email)
    {
        $this->db->where('email', $email);
        $this->db->where('id !=', $this->session->userdata('user_id'));
        $query = $this->db->get('users');
        if( $query->num_rows() > 0 ){ return True; } else { return False; }
    }
    
    function username_exists($email)
    {
        $this->db->where('username', $email);
        $query = $this->db->get('users');
        if( $query->num_rows() > 0 ){ return True; } else { return False; }
    }
    
    function username_exists_user($email)
    {
        $this->db->where('username', $email);
        $this->db->where('id !=', $this->session->userdata('user_id'));
        $query = $this->db->get('users');
        if( $query->num_rows() > 0 ){ return True; } else { return False; }
    }
    
    function check_login($email,$pass)
    {
        $this->db->where('email', $email);
        $this->db->or_where('username', $email);
        $query = $this->db->get('users');
        if( $query->num_rows() > 0 ){ return True; } else { return False; }
    }
	function SelectRecord1($TableName,$Selectdata,$WhereData){
		$this->db->select($Selectdata);
		
		if(!empty($WhereData)){
			$this->db->where($WhereData);
		}
		$query = $this->db->get($TableName);
		
		return $query->result_array();
	}
function savecropimage($file,$path)
	 {
		    $imageName="";
		    if($this->input->post($file))
			{
		    $data = $this->input->post($file);
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            
            $data = base64_decode($data);
            $imageName = uniqid().rand(1000,9999).time().'.png';
            file_put_contents($path.$imageName, $data);
			}
			return $imageName;
	 }		 
function unsetImage($id,$table,$data,$path) {	    
	    $this->db->select($data);
        $this->db->from($table);
		$this->db->where('id',$id);
        $query=$this->db->get();
		if($query->num_rows()>0)
		{
		   $query=$query->result();
		   $img=$query[0]->$data;
           @unlink($path.$img);
		}
        return true;		
	}
}