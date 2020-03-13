<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	 public function __construct(){
        parent::__construct();
        $this->load->model('welcome_model');
        $this->load->helper('my_helper');  
    }
    
	public function index()
	{
	    $data=new stdClass();
        if($this->session->flashdata('item')) {
            $items = $this->session->flashdata('item');
            if($items->success){
                $data->error=0;
                $data->success=1;
                $data->message=$items->message;
            }else{
                $data->error=1;
                $data->success=0;
                $data->message=$items->message;
            }                
        }            
       //$data->allVendor=$this->welcome_model->SelectRecord('user','*',array('user_type'=> '2','is_verified'=> '1'),$orderby=array());
	   	$data->allVendor = $this->welcome_model->joindataResult('v.vendor_id','l.id',array('l.user_type'=> '2','l.is_verified'=> '1'),'l.*,v.*','vendor_details as v','user as l',$orderby=Null);
        $data->allvenRating = $this->welcome_model->joindataResultAll('v.vendor_id','l.id',array('l.user_type'=> '2','l.is_verified'=> '1'),'l.*,v.*,AVG(v.rate) as avgRate','rating as v','user as l','v.vendor_id');
        $data->alllanguage=$this->welcome_model->SelectRecord1('language','*',array('status'=> '1'));
			 
		//echo $this->db->last_query(); die;    
        $this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}
	
	// faq page  //
	public function faq()
	{
	    $data=new stdClass();
        if($this->session->flashdata('item')) {
            $items = $this->session->flashdata('item');
            if($items->success){
                $data->error=0;
                $data->success=1;
                $data->message=$items->message;
            }else{
                $data->error=1;
                $data->success=0;
                $data->message=$items->message;
            }                
        }            
       
        $this->load->view('header');
		$this->load->view('faq');
		$this->load->view('footer');
	}
    // faq page  //
	
	
	// about page  //
	public function about()
	{
	    $data=new stdClass();
        if($this->session->flashdata('item')) {
            $items = $this->session->flashdata('item');
            if($items->success){
                $data->error=0;
                $data->success=1;
                $data->message=$items->message;
            }else{
                $data->error=1;
                $data->success=0;
                $data->message=$items->message;
            }                
        }            
       
        $this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}
    // about page  //
	
	
	// contact page  //
	public function contact()
	{
	    $data=new stdClass();
        if($this->session->flashdata('item')) {
            $items = $this->session->flashdata('item');
            if($items->success){
                $data->error=0;
                $data->success=1;
                $data->message=$items->message;
            }else{
                $data->error=1;
                $data->success=0;
                $data->message=$items->message;
            }                
        }            
       
        $this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}
    // contact page  //
	
	
	// privacy_policy page  //
	public function privacy_policy()
	{
	    $data=new stdClass();
        if($this->session->flashdata('item')) {
            $items = $this->session->flashdata('item');
            if($items->success){
                $data->error=0;
                $data->success=1;
                $data->message=$items->message;
            }else{
                $data->error=1;
                $data->success=0;
                $data->message=$items->message;
            }                
        }            
       
        $this->load->view('header');
		$this->load->view('privacy_policy');
		$this->load->view('footer');
	}
    // privacy_policy page  //
	
	
	// user view count //
   public function viewcountservice()
    {
	$id=$this->input->post('id');	
	$this->db->where('id',$id);
	$this->db->set('view_count','view_count+1',FALSE);    
    $this->db->update('tbl_user');
	return ($this->db->affected_rows()>0)?TRUE:FALSE;
    }
	
	// user view count //
	
	// autocomplete//
    

 	// autocomplete //
   
}  

