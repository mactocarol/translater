<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	 public function __construct(){
        parent::__construct();
        $this->load->model('Search_model');
        $this->load->helper('my_helper');  
		$this->load->library("pagination");
        $this->load->library('Ajax_pagination');
		 $this->perPage = 2;
    }
    
	public function index()
	{
	$this->load->library('ajax_pagination');
	$keyword = "";
    $lng = "";
    $ctyy = "";
    $price = "";
	$rating ="";
	$sortby ="";
  
	
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
        
		$config['base_url'] = base_url().'search/Search/vendorlist';
        $config['total_rows'] = $this->Search_model->fetch_datacount($keyword,$lng,$ctyy,$price,$rating,$sortby);
		//print_r($config['total_rows']); die;
        $config['uri_segment'] = 9;
        $config['per_page'] = 9;
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin">';
        $config['full_tag_close'] = '</ul>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['anchor_class'] = 'class="paginationlink" ';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $page = $this->uri->segment(4); 
        $limit = $config['per_page'];
        $start = $page > 0 ? $page : 0;
        $this->ajax_pagination->initialize($config);

		
        $where = array();     
	    $data->vendorslist = $this->Search_model->joindatapagination('v.vendor_id','u.id',array(),'u.*,v.price','vendor_details as v','user as u','u.id desc',$limit,$start);	
        //echo $this->db->last_query(); die;		
		$data->language = $this->Search_model->SelectRecord('language','*',$where,$orderby=array());
		$data->city = $this->Search_model->SelectRecord('city','*',$where,$orderby=array());
		
		$data->links =$this->ajax_pagination->create_links();		
        $data->startFrom = $start + 1;
		
		$data->total_rows = $this->Search_model->fetch_datacount($keyword,$lng,$ctyy,$price,$rating,$sortby);
		
        $this->load->view('header');
		$this->load->view('translator',$data);
		$this->load->view('footer');
	}	

 function vendorlist()
 { 
  $this->load->library('ajax_pagination');
  $keyword = $this->input->post('keyword');
  $lng = $this->input->post('lng');
  $ctyy = $this->input->post('ctyy');
  $price = $this->input->post('price');
  $rating = $this->input->post('rating');
  $sortby = $this->input->post('sortby');
  
        $config['base_url'] = base_url().'search/Search/vendorlist';
        $config['total_rows'] = $this->Search_model->fetch_datacount($keyword,$lng,$ctyy,$price,$rating,$sortby);
		//print_r($config['total_rows']); die;
        $config['uri_segment'] = 9;
        $config['per_page'] = 9;
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin">';
        $config['full_tag_close'] = '</ul>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['anchor_class'] = 'class="paginationlink" ';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $page = $this->uri->segment(4); 
        $limit = $config['per_page'];
        $start = $page > 0 ? $page : 0;
        $this->ajax_pagination->initialize($config);
	
  $data['vendorslist'] =$this->Search_model->fetch_data($keyword,$lng,$ctyy,$price, $rating,$sortby,$limit,$start);
  $data['links'] =$this->ajax_pagination->create_links();
  $data['startFrom'] = $start + 1;
  
  $data['total_rows'] = $this->Search_model->fetch_datacount($keyword,$lng,$ctyy,$price,$rating,$sortby);
  
  $errors = array_filter($data['vendorslist']);

		if (!empty($errors)){
			echo $dt=$this->load->view("ajaxtranslator",$data,TRUE);
		}
		else{
			echo '<div class="s_data">No data</div>';
		}
 }


	// translator  detail page  //		  
	public function translatordetail()
	{
	    $id =  $this->uri->segment(3); 		
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
        $data->detailvendor =$this->Search_model->translator_detail($id);
		$udata1 = array("vendor_id"=>$id);	
		$data->ratingreview=$this->Search_model->SelectRecord('rating','*',$udata1,$orderby=array());
		
		$data->userlang = $this->Search_model->joindataResult('v.language_id','l.id',$udata1,'l.*,v.*','vendor_lang as v','language as l',$orderby=Null);
		
        $data->usercity = $this->Search_model->joindataResult('v.city_id','l.id',$udata1,'l.*,v.*','vendor_city as v','city as l',$orderby=Null);	
		
		$unavalibaleDate=$this->Search_model->SelectRecord('user_avability','*',$udata1,$orderby=array());
		
			$merge_date = [];
			foreach($unavalibaleDate as $date){
				$merge_date[] = '"'.$date['date'].'"'.',';
			}
		$unavalibaleDates1 = implode("",$merge_date);
		$data->unavalibaleDates = rtrim($unavalibaleDates1, ',');
		
        $this->load->view('header');
		$this->load->view('translator_detail',$data);
		$this->load->view('footer');
	}
	// translator deatil page  //
	
	// booking  detail page  //		  
	public function booking()
	{	    	
		$data=new stdClass();
		
		$data->booking_date = $this->input->post('booking_date');
        $data->booking_time = $this->input->post('booking_time');
        $data->booking_hour = $this->input->post('booking_hour').' Hour';
		$data->booking_lang = $this->input->post('booking_lang');
		$data->booking_city = $this->input->post('booking_city');
		$data->booking_price = $this->input->post('booking_price');
		$data->vendor_id = $this->input->post('vendor_id');
		$data->booked="";
		
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
      
		$udata1 = array("id"=>$data->vendor_id);	
		$data->userdetail=$this->Search_model->SelectRecord('user','*',$udata1,$orderby=array());	

        $this->load->view('header');
		$this->load->view('booking',$data);
		$this->load->view('footer');
	}
	// booking deatil page  //
	
	// booking vendor page  //
	function  bookingvendor(){
		
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

	    $booking_date = $this->input->post('booking_date');
        $booking_time = $this->input->post('booking_time');
        $booking_hour = $this->input->post('booking_hour');
		$booking_lang = $this->input->post('booking_lang');
		$booking_city = $this->input->post('booking_city');
		$booking_price = $this->input->post('booking_price');
		$vendor_id = $this->input->post('vendor_id');
		$user_id = $this->session->userdata('user_id');		
		
		if($booking_date!="" &&  $booking_time!=""){
		$booking = $this->Search_model->InsertRecord('booking',array('vendor_id'=>$vendor_id,'user_id'=>$user_id,'date'=>$booking_date,'time'=> $booking_time,'hours'=>$booking_hour,'lang'=>$booking_lang,'city'=>$booking_city,'status'=>1));
		
		$this->Search_model->InsertRecord('user_avability',array('vendor_id'=>$vendor_id,'date'=>$booking_date,'status'=>1));
		
		$this->Search_model->InsertRecord('notification',array('vendor_id'=>$vendor_id,'user_id'=>$user_id,'notification_type'=>"user_booking"));
		
		$order_id=uniqid();
		//echo $booking; die;
		$this->Search_model->InsertRecord('order',array('vendor_id'=>$vendor_id,'user_id'=>$user_id,'booking_id'=>"user_booking",'order_id'=>$order_id,	'payment_type'=>'by_cash','price'=>$booking_price));
		
		$data->booked="booked";
		
		$udata1 = array("id"=>$vendor_id);	
		$udata2 = array("id"=>$user_id);	
		$data->vendordetail=$this->Search_model->SelectRecord('user','*',$udata1,$orderby=array());
		$data->userdetail=$this->Search_model->SelectRecord('user','*',$udata1,$orderby=array());
		
		$name = $data->vendordetail[0]['first_name'].' '.$data->vendordetail[0]['last_name'];
		$to = $data->vendordetail[0]['email']; 
		$user_name = $data->userdetail[0]['first_name'].' '.$data->userdetail[0]['last_name'];
			
		
        $sub = "New Booking For Translator";         
		$message = 'Hello '.$name.'<br>
		'.$user_name.' Booked you for translation on date - '.$booking_date.' and time - '.$booking_time.' and hour - '.$booking_hour.'<br> Kind regards<br>
        The Translater Team';	
		
        //$this->email($to,$sub,$message); 		
		$data->error=0;
                    $data->success=1;
                    $data->message="Booking Successfully";
		
		
		}
	    
        $this->session->set_flashdata('item',$data);
	    $this->load->view('header');
		$this->load->view('booking',$data);
		$this->load->view('footer');
	}
	// booking vendor page  //
	
   
}  

