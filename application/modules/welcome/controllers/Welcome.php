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
       
        $this->load->view('header');
		$this->load->view('home');
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
   
}  

