<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vendor extends MY_Controller 
{
    //private $connection;
        public function __construct(){            
            parent::__construct();
            $this->load->model('vendor_model');
            $this->load->helper('my_helper');
            $page = '';
          
        }
       
         public function dashboard()
        {  
              if($this->session->userdata('logged_in')){
                
            
           $data=new stdClass();
		  
            $udata = array("id"=>$this->session->userdata('user_id'));
            $udata1 = array("vendor_id"=>$this->session->userdata('user_id'));			
            $data->userDatas=$this->vendor_model->SelectSingleRecord('user','*',$udata,$orderby=array());
			$data->userDetails=$this->vendor_model->SelectSingleRecord('vendor_details','*',$udata1,$orderby=array());
			$data->userRating=$this->vendor_model->SelectRecord('rating','*',$udata1,$orderby=array());
		    $unavalibaleDate=$this->vendor_model->SelectRecord('user_avability','*',$udata1,$orderby=array());
			
			$merge_date = [];
			foreach($unavalibaleDate as $date){
				$merge_date[] = '"'.$date['date'].'"'.',';
			}	
			
            $unavalibaleDates1 = implode("",$merge_date);
			$data->unavalibaleDates = rtrim($unavalibaleDates1, ',');
            //print_r($data->userlang); die;
			
			
			$data->userlang = $this->vendor_model->joindataResult('v.language_id','l.id',$udata1,'l.*,v.*','vendor_lang as v','language as l',$orderby=Null);
         // print_r($data->userlang); die;
			$data->usercity = $this->vendor_model->joindataResult('v.city_id','l.id',$udata1,'l.*,v.*','vendor_city as v','city as l',$orderby=Null);
            $data->alllanguage=$this->vendor_model->SelectRecord1('language','*',array('status'=> '1'));
			$data->allcity=$this->vendor_model->SelectRecord1('city','*',array('status'=> '1'));
		    
			$userlangid = $this->vendor_model->joindataResult('v.language_id','l.id',$udata1,'l.*,v.*','vendor_lang as v','language as l',$orderby=Null);
            $lng = [];
			foreach($userlangid as $val){
				$lng[] = $val['language_id'].',';
			}	
			
            $userlangid1 = implode("",$lng);
			$data->userlangids = rtrim($userlangid1, ',');
			
			
			$usercityid = $this->vendor_model->joindataResult('v.city_id','l.id',$udata1,'l.*,v.*','vendor_city as v','city as l',$orderby=Null);
            $city = [];
			foreach($usercityid as $vals){
				$city[] = $vals['city_id'].',';
				
			}	
			
            $usercityid1 = implode("",$city);
			$data->usercityids = rtrim($usercityid1, ',');
			//print_r($data->userlangids); die;
		   $data->notifylist = $this->vendor_model->joindataResult('v.vendor_id','u.id',array("vendor_id"=>$this->session->userdata('user_id'),'v.status'=>0),'u.*,v.*','notification as v','user as u',$orderby=Null);
           
           //$data->userDatas=$this->vendor_model->SelectRecord('notification','*',$where,$orderby=array());
           //$result = $this->vendor_model->UpdateRecord('notification',array('status' => 1),$where);
           //$result = $this->vendor_model->notificationStatus();
                
		    $this->load->view('header',$data);  
            $this->load->view('dashboard_view',$data);
            $this->load->view('footer',$data);  
        }
		
			else{
				 redirect('user');
			} 
		}
		
		 
		 public function history()
        {            
             if($this->session->userdata('logged_in')){
            		
           $data=new stdClass();
            $udata = array("id"=>$this->session->userdata('user_id'));
           		
            $data->userImage=$this->vendor_model->SelectSingleRecord('user','*',$udata,$orderby=array());
			//$data->userHistory=$this->vendor_model->SelectRecord('booking','*',$udata1,$orderby=array());
			$data->userDatas = $this->vendor_model->joindataResult('v.vendor_id','u.id',array("v.vendor_id"=>$this->session->userdata('user_id')),'u.*,v.*','booking as v','user as u',$orderby=Null);
            //echo $this->db->last_query(); die;            
           $where=array('vendor_id'=> $this->session->userdata('user_id'));
           $this->vendor_model->UpdateRecord('notification',array('status' => 1),$where);
           
			$this->load->view('header',$data);  
            $this->load->view('history_view',$data);
            $this->load->view('footer',$data);  
			}
			else{
				 redirect('user');
			} 
        }
        public function register(){
			$data=new stdClass();
			
		    if($this->session->userdata('logged_in')){
                redirect('vendor');
            }
			
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

		                                 
            if(!empty($_POST)){
				
                      
                    $key=md5 (uniqid());
                    //sending conformation mail to signup user                        
                    $to = $this->input->post('email');
                    $sub = "Confirm Your Account";                                                                  
        
				   $udata=array(                                            
						'email'=>$this->input->post('email'),
						'first_name'=>$this->input->post('fname'),   
						'last_name'=>$this->input->post('lname'),   
						'password'=>md5($this->input->post('password')),
						'gender'=>$this->input->post('gender'),
						'user_type'=> '2',
						'token'=> $key                 
					  
					);
					$new_id = $this->vendor_model->new_user($udata);
					
		
					
					 $udataDetails=array(
                        'vendor_id'=>$new_id,					 
						'price'=>$this->input->post('price'),
					);
					$new_id1 = $this->vendor_model->InsertRecord('vendor_details',$udataDetails);
					
					
					$lang_id1 = $this->input->post('lang');
		            $lang_id = implode(",",$lang_id1);
					$lang_id2 = explode(",",$lang_id);
					
		            foreach ($lang_id2 as $lang_ids){
						 $udataLanguage=array(  
							'vendor_id'=>$new_id,						 
							'language_id'=>$lang_ids,
						);
						$new_id2 = $this->vendor_model->InsertRecord('vendor_lang',$udataLanguage);
					 }
					$city1 = $this->input->post('city');
					$city = implode(",",$city1);
					$city2 = explode(",",$city);
					//print_r($city);
					foreach ($city2 as $citys){
					 $udataCity=array(
						'vendor_id'=>$new_id,	
						'city_id'=>$citys,
						);
						$new_id3 = $this->vendor_model->InsertRecord('vendor_city',$udataCity);	
					}	
						
						$message = "<a href='".base_url()."vendor/register_user/$key'>Click here</a>"." to confirm your account";                           					
						$this->email($to,$sub,$message);                                
						
						$data->error=0;
						$data->success=1;
						$data->message='You are successfully registered, please login to your account.';
						$this->session->set_flashdata('item',$data);
                   
		  } 
		                                                      
           
		   
		    $data->alllanguage=$this->vendor_model->SelectRecord1('language','*',array('status'=> '1'));
			$data->allcity=$this->vendor_model->SelectRecord1('city','*',array('status'=> '1'));
			
			
		   $this->load->view('header');        
           $this->load->view('register_view',$data);   
		   $this->load->view('footer');        
        }
        public function addDate(){
			$data=new stdClass();
			$udata=array(                                            
					'vendor_id'=>$this->session->userdata('user_id'),
					'date'=>$this->input->post('date'),
				);
					$new_id = $this->vendor_model->new_usera($udata);
					$udata1 = array("vendor_id"=>$this->session->userdata('user_id'));			
					$unavalibaleDate=$this->vendor_model->SelectRecord('user_avability','*',$udata1,$orderby=array());
					$merge_date = [];
					foreach($unavalibaleDate as $date){
						$merge_date[] = '"'.$date['date'].'"'.',';
					}	
					
					$unavalibaleDates1 = implode("",$merge_date);
					$data->unavalibaleDate = rtrim($unavalibaleDates1, ',');
			
						//print_r($data->unavalibaleDates); 
						$this->load->view('booking_cal',$data);   
		    }
        
         public function editProfile(){
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
			$udata1 = array("vendor_id"=>$this->session->userdata('user_id'));			
            
            if(!empty($_POST)){
				 $where = array("vendor_id"=>$this->session->userdata('user_id'));			
                    $this->vendor_model->delete_record('vendor_lang',$where);  //echo '<pre>';
                   $where = array("vendor_id"=>$this->session->userdata('user_id'));			
                    $this->vendor_model->delete_record('vendor_city',$where);  //echo '<pre>';
					

				  $udata=array(                                            
						'first_name'=>$this->input->post('fname'),   
						'last_name'=>$this->input->post('lname'),   
					);
					
					
					$udata1=array(                                            
						'contact_number'=>$this->input->post('contact_number'),   
						'price'=>$this->input->post('price'),   
						'facebook_url'=>$this->input->post('facebook'),   
						'twiter_url'=>$this->input->post('twitter'),   
						'google_url'=>$this->input->post('google'),   
						'insta_url'=>$this->input->post('insta'),   
						'address'=>$this->input->post('address'),   
					);
					$new = $this->vendor_model->UpdateRecord('vendor_details',$udata1,array("vendor_id"=>$this->session->userdata('user_id')));
					$new1 = $this->vendor_model->UpdateRecord('user',$udata,array("id"=>$this->session->userdata('user_id')));  //echo '<pre>';
                    
					
					
			
					$lang_id11 = $this->input->post('lang');
					//print_r($lang_id1); die;
					
		            $lang_ids = implode(",",$lang_id11);
					$lang_id21 = explode(",",$lang_ids);
					
		            foreach ($lang_id21 as $lang_ids1){
						 $udataLanguage=array(  
							'vendor_id'=>$this->input->post('uid'),						 
							'language_id'=>$lang_ids1,
						);
						$new2 = $this->vendor_model->InsertRecord('vendor_lang',$udataLanguage);
						   
					 }
					 
					
                   
				   
					$city11 = $this->input->post('city');
					$citys = implode(",",$city11);
					$city21 = explode(",",$citys);
					foreach ($city21 as $citys1){
					 $udataCity=array(
						'vendor_id'=>$this->input->post('uid'),	
						'city_id'=>$citys1,
						);
						$new3 = $this->vendor_model->InsertRecord('vendor_city',$udataCity);	
					} 
					
					//print_r($udata); die;
					if ($new || $new1 || $new2)
					{
						$data->error=0;
						$data->success=1;
						$data->message='Profile Update Sucessfully.';
						
											
					}else{
						$data->error=1;
						$data->success=0;
						$data->message='Network Error!';                    
					}
                //print_r($this->db->last_query()); die;
               $this->session->set_flashdata('item',$data);  
                  redirect('vendor/dashboard'); 
		  }

			$udata = array("id"=>$this->session->userdata('user_id'));
            $udata1 = array("vendor_id"=>$this->session->userdata('user_id'));			
            			
            $data->userDatas=$this->vendor_model->SelectSingleRecord('user','*',$udata,$orderby=array());
			$data->userDetails=$this->vendor_model->SelectSingleRecord('vendor_details','*',$udata1,$orderby=array());
			//print_r($data['userDatas']); die;
			$this->load->view('header',$data);  
            $this->load->view('dashboard_view',$data);
            $this->load->view('footer',$data);  
		                                                      
        }
        
		 public function editOtherprofile(){
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
            if(!empty($_POST)){
				$udata=array(                                            
						'first_name'=>$this->input->post('fname'),   
						'last_name'=>$this->input->post('lname'),   
					);
					
					
					$udata1=array(                                            
						'personal_info'=>$this->input->post('pinfo'),   
						'bussiness_info'=>$this->input->post('binfo'),   
						'other_info'=>$this->input->post('oinfo'),   
						
						
					);
					$new = $this->vendor_model->UpdateRecord('vendor_details',$udata1,array("vendor_id"=>$this->session->userdata('user_id')));
					 //print_r($udata); die;
					if ($new)
					{
						$data->error=0;
						$data->success=1;
						$data->message='Profile Update Sucessfully.';
						
											
					}else{
						$data->error=1;
						$data->success=0;
						$data->message='Network Error!';                    
					}
                //print_r($this->db->last_query()); die;
               $this->session->set_flashdata('item',$data);  
                  redirect('vendor/dashboard'); 
		  }

			$udata = array("id"=>$this->session->userdata('user_id'));
			$udata1 = array("vendor_id"=>$this->session->userdata('user_id'));			
            
            $data->userDatas=$this->vendor_model->SelectSingleRecord('user','*',$udata,$orderby=array());
			$data->userDetails=$this->vendor_model->SelectSingleRecord('vendor_details','*',$udata1,$orderby=array());
			//print_r($data['userDatas']); die;
			$this->load->view('header',$data);  
            $this->load->view('dashboard_view',$data);
            $this->load->view('footer',$data);  
		                                                      
        }
		
		
        public function register_user($key){
           if(!empty($key)){                
                if ($this->vendor_model->is_key_valid($key))
                {
                    //$user = $this->vendor_model->UpdateRecord('users',array("status"=>'1'),array());
                    //$userdata = array("user_id"=>$user->parent_id,"child_id"=>$user->id);
                    //$this->vendor_model->InsertRecord('downline',$userdata);
                    $data= new stdClass();
                    $data->page_title = "Registration";
                    $data->page_text = "New User Registration!";
                    $data->page = "vendor-signup";
                    
                    $data->error=0;
                    $data->success=1;
                    $data->message='verified successfully, you can login now.';
                    $this->session->set_flashdata('item',$data);
                    //echo "<script>alert('verified successfully, you can login now.') </script>";
                    redirect('vendor');
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Invalid key.';
                    $this->session->set_flashdata('item',$data);
                    redirect('vendor/register');
                }
            }           
        }
        
        function check_username_exists()
        {                
            if (array_key_exists('username',$_POST)) 
            {
                if ( $this->user_model->username_exists($this->input->post('username')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        
        function check_username_exists1()
        {                
            if (array_key_exists('username',$_POST)) 
            {
                if ( $this->user_model->username_exists_user($this->input->post('username')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        
        function check_email_exists()
        {                
            if (array_key_exists('email',$_POST)) 
            {
                if ( $this->vendor_model->email_exists($this->input->post('email')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        
        function check_email_exists1()
        {                
            if (array_key_exists('email',$_POST)) 
            {
                if ( $this->user_model->email_exists_user($this->input->post('email')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        
        
        
                

        
        
       
        
       
       /*  public function logout()
        {
            $data=new stdClass();
            if($this->session->userdata('logged_in')){
                $this->session->sess_destroy();    
            }
            
            $data->error=0;
            $data->success=1;
            $data->message='Logged Out Successfully';
            $this->session->set_flashdata('item',$data);            
            redirect('user');
        }
             */
        public function update_notification($id){
            if($this->session->userdata('user_group_id') != 2){
                redirect('user');
            }
            $data=new stdClass();
                $udata = array("id"=>$id);                
                $url = $this->user_model->SelectSingleRecord('notifications','*',$udata,$orderby=array());        
                if ($this->user_model->UpdateRecord('notifications',array("status"=>1),array("id"=>$id)))
                {                                                           
                }else{
                    
                }
            redirect(site_url().''.$url->url);
            
        }

       
        function update_vendor_services(){

            $category = $this->input->post('category');
            $subcategory = $this->input->post('subcategory');
            $where = array("vendor_id"=>$this->session->userdata('user_id'));
            
            $update = array(
               'services' =>  json_encode(array_merge($category,$subcategory)),
               'services_search' => implode(",",array_merge($category,$subcategory))
            );
            
            // [vendor_id] => 16 [services] => ["electronics","fashionservices","Beauty"] [services_search]
            
            $d = $this->db->get_where('vendor_services',array())->result_array();
            //print_r($d);die();
            foreach($d as $f){
                $this->db->where(array('vendor_id' => $f['vendor_id']));
                $this->db->update('vendor_services',array('services_search' => implode(",",json_decode($f['services'])) ));
            }
            
            //print_r($this->db->last_query());die();
            
            $this->user_model->UpdateRecord('vendor_services',$update,$where);         
            redirect('user/vendor_services');

            /*$data = $this->user_model->SelectSingleRecord('vendor_services','*',$where,$orderby=array());
            if(!empty($data)){
                $this->user_model->UpdateRecord('vendor_services',$update,$where); 
            }else{
                $this->user_model->UpdateRecord('vendor_services',$update,$where);
                $this->user_model->InsertRecord('vendor_services',$udata);
            }*/
            
        }


    function reviewRating(){
        $postData = $this->input->post();
        

        $review = trim($this->input->post('review_text'));
        $rating = trim($this->input->post('rating'));
        $orderId = $redirectId = trim($this->input->post('orderId'));

        if($review == '' || $review == '' || $review == ''){
            $data->error=1;
            $data->success=0;
            $data->message='Please Fill Review Rating.'; 
            $this->session->set_flashdata('item', $data);
            redirect('user/orderDetail/'.$redirectId);
        }else{
            $orderId = base64_decode($orderId);
            $data = $this->user_model->SelectSingleRecord('order_detail','*',array('order_id' => $orderId),$orderby=array());
            $inserData = array(
                'senderId' => $this->session->userdata('user_id'),
                'receiverId' => $data->vendor_id,
                'orderId' => $orderId,
                'review' => $review,
                'rating' => $rating,
            );

            $this->user_model->InsertRecord('review',$inserData);
            $this->user_model->UpdateRecord('order_detail',array('review_status' => 'sent'),array('order_id' => $orderId));

            $data->error=0;
            $data->success=1;
            $data->message='Rating Successfully Done.'; 
            $this->session->set_flashdata('item', $data);
            redirect('user/orderDetail/'.$redirectId);
        }

    }

    function updatePrice($id){
        $id = base64_decode($id);
        $where = array(
            "userId" => $this->session->userdata('user_id'),
            "userServicesId" => $id
        );
        $data=new stdClass();
        if(isset($_POST) && !empty($_POST)){
            $price = $this->input->post('price');
            $weekPrice = $this->input->post('weekPrice');
            $monthPrice = $this->input->post('monthPrice');
            $yearPrice = $this->input->post('yearPrice');
            if(!empty($price) || !empty($weekPrice) || !empty($monthPrice) || !empty($yearPrice)){
                
                $check = $this->user_model->SelectSingleRecord('vendor_services_price','*',$where,$orderby=array());
                if(isset($check) && !empty($check)){
                    $this->user_model->UpdateRecord('vendor_services_price',$_POST,$where);
                }else{
                    $this->user_model->InsertRecord('vendor_services_price',$where);
                    $this->user_model->UpdateRecord('vendor_services_price',$_POST,$where);
                }
                
                $data->error = 0;
                $data->success = 1;
                $data->message ='price add / update successfully.';
            }else{
                $data->error = 1;
                $data->success = 0;
                $data->message ='Something going wrong';
            }
        }

        $data->newId = $id;

        $data->data = $this->user_model->SelectSingleRecord('vendor_services_price','*',$where,$orderby=array());
        $this->load->view('updatePrice',$data);
    }

    function forgotPassword(){
        $data = new stdClass();

        if($this->session->flashdata('item')) {
            $items = $this->session->flashdata('item');
            if($items->success){
                $data->error = 0;
                $data->success = 1;
                $data->message = $items->message;
            }else{
                $data->error = 1;
                $data->success = 0;
                $data->message = $items->message;
            }
        }

        if(isset($_POST) && !empty($_POST)){
            $data = $this->user_model->SelectSingleRecord('users','*',array('email' => $_POST['email']),$orderby=array());
            if(!empty($data)){
                
                $key = md5 (uniqid().rand());
                
                $this->user_model->UpdateRecord('users',array('key'=>$key),array('email'=>$_POST['email']));
                
                $htmlContent = '<h1>Forgot Password</h1>';
                $htmlContent .= "<a href='".base_url()."user/updatePassword/$key'>Click here</a>"." to update your password";
                $this->email($_POST['email'],"FORGOT PASSWORD",$htmlContent);
                
                $data->error = 0;
                $data->success = 1;
                $data->message ='Your mail has been sent successfuly !';
            }else{
                $data->error = 1;
                $data->success = 0;
                $data->message ='Invalid Email Account';
            }
        }

        $this->load->view('forgotPassword',$data);
    }
    
    function updatePassword($key){
        $data = new stdClass();

        if(isset($_POST) && !empty($_POST)){
            $this->user_model->UpdateRecord('users',array('password'=>md5($_POST['nPassword'])),array('id'=>$_POST['id']));
            $data->error=0;
            $data->success=1;
            $data->message='Please login with your new password';
            $this->session->set_flashdata('item',$data);
            redirect('user/');
        }

        $data->userDetail = $this->user_model->SelectSingleRecord('users','*',array('key'=>$key),$orderby=array());
        if(!isset($data->userDetail) && empty($data->userDetail)){
            $data->error=1;
            $data->success=0;
            $data->message='The password reset link is no longer valid. Please request another password reset email';
            $this->session->set_flashdata('item',$data);
            redirect('user/forgotPassword');
        }

        $this->user_model->UpdateRecord('users',array('key'=>md5(rand())),array('key'=>$key));
        $this->load->view('updatePassword',$data);

    }

    public function upload_image(){
            
          $data=new stdClass();	
		  $id = $this->session->userdata('user_id');
		  if($this->input->post("photo"))
		  {
		  $this->vendor_model->unsetImage($id,'tbl_user','image','upload/vendor/');		  		 
		  $photo=$this->vendor_model->savecropimage("photo","upload/vendor/");		 	     
		  }
		  else{
		  $photo=$this->input->post('photo1');
          }
			if($_POST){                            
                
                $udata=array(                                            
                        'image'=>$photo                                                                  
                        );
             
                $update =  $this->vendor_model->UpdateRecord('user',$udata,array("id"=>$this->session->userdata('user_id')));
				if ($update)
                {
                    $data->error=0;
                    $data->success=1;
                    $data->message='Profile image Update Sucessfully.';
                                        
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Network Error!';                    
                }
                //print_r($this->db->last_query()); die;
            $this->session->set_flashdata('item',$data);
            //redirect('user/profile');
            //print_r($this->session->flashdata('item')); die;  
            }       
			
           
            //$data->result = $this->user_model->SelectSingleRecord('users','*',$udata,$orderby=array());                                    
            $data->title = 'User Profile';
            $data->field = 'User Profile';
            $data->page = 'profile';                
            redirect('vendor/dashboard', $data);    

        }
		 //notification 
        public function notification(){
            $where=array('vendor_id'=> $this->session->userdata('user_id'),'status' => 0);
            $data =$this->vendor_model->SelectRecord('notification','*',$where,$orderby=array());
			echo json_encode($data);
            die;
         }
		
       

}
?>