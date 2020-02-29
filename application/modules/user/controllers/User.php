<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller 
{
    //private $connection;
        public function __construct(){            
            parent::__construct();
            $this->load->model('user_model');
            $this->load->helper('my_helper');
            $page = '';
            if($this->session->userdata('user_group_id') == 3){
                redirect('user');
            }
        }
        public function index(){
            if($this->session->userdata('logged_in')){
                redirect('user/dashboard');
            }
            
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                //print_r($items); die;
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
            $data->return_url = isset($_GET['return']) ? $_GET['return'] : '' ;
            $data->title = "Login | ".$this->site_info()['site_title'];
			$this->load->view('header',$data);   
            $this->load->view('login_view',$data);  
			$this->load->view('footer',$data);   
        }
		 public function history()
        {            
             if($this->session->userdata('logged_in')){
            		
            $data=new stdClass();
            $udata = array("id"=>$this->session->userdata('user_id'));
            $data->userImage=$this->user_model->SelectSingleRecord('user','*',$udata,$orderby=array());
			$data->userDatas = $this->user_model->joindataResult('v.vendor_id','u.id',array("user_id"=>$this->session->userdata('user_id')),'u.*,v.*','booking as v','user as u',$orderby=Null);
   
          
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

		  $this->form_validation->set_rules('f_name', 'First Name', 'required|min_length[3]|max_length[50]');
		  $this->form_validation->set_rules('l_name', 'Last Name', 'required|min_length[3]|max_length[50]');	
		  $this->form_validation->set_rules('password', 'Password', 'required');		
		  //$this->form_validation->set_rules('C_pass', 'Confirm Password', 'required|min_length[5]|max_length[16]|matches[password]');
		  $this->form_validation->set_rules('email', 'Email', 'required|min_length[6]|max_length[300]');
          if ($this->form_validation->run() == FALSE)
		  {	
		   $data->error=1;
           $data->success=0;
           $data->message='please enter valid email id unique , with all infomation';
           $this->session->set_flashdata('item',$data);
		  // redirect('signup');
		  }
		  else
		  {	                                 
            if(!empty($_POST)){
				
                if ( $this->user_model->email_exists($this->input->post('email')) == TRUE ) 
                {
                     $data->error=1;
                     $data->success=0;
                     $data->message='This Email is Already Exists';
                     $this->session->set_flashdata('item',$data);
                     redirect('signup');
                } 
            
                    $key=md5 (uniqid());
                    //sending conformation mail to signup user                        
                    $to = $this->input->post('email');
                    $sub = "Confirm Your Account";                                                                  
        
                           $udata=array(                                            
                                'email'=>$this->input->post('email'),
                                'first_name'=>$this->input->post('f_name'),   
								'last_name'=>$this->input->post('l_name'),   
                                'password'=>md5($this->input->post('password')),
								'gender'=>$this->input->post('genderu'),  
                                'user_type'=> '1',
                                'token'=> $key                 
                              
                            );
                                $new_id = $this->user_model->new_user($udata);
                                         
                                $message = "<a href='".base_url()."user/register_user/$key'>Click here</a>"." to confirm your account";                           					
                                $this->email($to,$sub,$message);                                
                                
                                $data->error=0;
                                $data->success=1;
                                $data->message='You are successfully registered, please login to your account.';
                                $this->session->set_flashdata('item',$data);
                   
		  } }                                                           
           $data->title = "Register | ".$this->site_info()['site_title'];
		   $this->load->view('header',$data);        
           $this->load->view('register_view',$data);   
		   $this->load->view('footer',$data);        
        }
        
        
        
        
        public function register_user($key){
            if(!empty($key)){                
                if ($this->user_model->is_key_valid($key))
                {
                    //$user = $this->user_model->UpdateRecord('users',array("status"=>'1'),array());
                    //$userdata = array("user_id"=>$user->parent_id,"child_id"=>$user->id);
                    //$this->user_model->InsertRecord('downline',$userdata);
                    $data= new stdClass();
                    $data->page_title = "Registration";
                    $data->page_text = "New User Registration!";
                    $data->page = "signup";
                    
                    $data->error=0;
                    $data->success=1;
                    $data->message='verified successfully, you can login now.';
                    $this->session->set_flashdata('item',$data);
                    //echo "<script>alert('verified successfully, you can login now.') </script>";
                    redirect('user');
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Invalid key.';
                    $this->session->set_flashdata('item',$data);
                    redirect('user/register');
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
                if ( $this->user_model->email_exists($this->input->post('email')) == TRUE ) 
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
        
        public function login_check()
        {            
            $data=new stdClass();
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');       
            if ($this->form_validation->run() == FALSE)
            {
                $data->error=1;
                $data->success=0;
                $data->message=validation_errors();
            }
            else
            {
                $email = $this->security->xss_clean($this->input->post('email'));
                $password = $this->security->xss_clean($this->input->post('password'));
                $Selectdata = array('id','email','user_type');
                $udata = array("email"=>$email,"password"=>md5($password));                
                $result = $this->user_model->SelectSingleRecord('user',$Selectdata,$udata,$orderby=array());               
               
                //echo "<pre>";
                //print_r($result); die;
                if($result)
                {               
                      $sess_array = array(
                      'user_id' => $result->id,
                      'email' => $result->email,                    
                      'user_group_id' => $result->user_type,
                      'logged_in' => TRUE
                      );                   
                        
                        //print_r($sess_array); die;
                        $this->session->set_userdata($sess_array);
                        $data->error=0;
                        $data->success=1;
                        $data->message='Login Successful';
                        //print_r($this->session->userdata('email')); die;
                        if($this->input->post('return_url')){ redirect(($this->input->post('return_url'))); }
						
						if($result->user_type==1){
                        redirect('user/dashboard'); 
						}
						if($result->user_type==2){
							//echo 'hi';
							redirect('vendor/dashboard');
						}
                        
                    
                }
                else
                {
                    $data->error=1;
                    $data->success=0;
                    $data->message='Invalid Username or Password.';
                    
                }
            }
            $data->msg = 1;
            $this->session->set_flashdata('item',$data);            
            redirect('user');
        }
        
        public function dashboard()
        {            
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            } 
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                $items = $this->session->flashdata('item');
                //print_r($items); die;                
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
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->user_model->SelectSingleRecord('user','*',$udata,$orderby=array()); 
			
            $data->title = "Dashboard | ".$this->site_info()['site_title'];
            $data->field = 'Dashboard';
            $data->page = 'dashboard';
            $this->load->view('header',$data);  
            $this->load->view('dashboard_view',$data);
            $this->load->view('footer',$data);  
        }
                

       
        
        public function profile(){
            //print_r($this->session->userdata());die();
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
            if($this->session->userdata('user_group_id') != 2){
                
            }
            $data=new stdClass();  
            
            if($_POST){                            
                
                $udata=array(                                            
                        'first_name'=>$this->input->post('f_name'),
                        'last_name'=>$this->input->post('l_name')                                            
                        );
                    
                 
                    //echo '<pre>';
                    //print_r($udata); die;
                if ($this->user_model->UpdateRecord('user',$udata,array("id"=>$this->session->userdata('user_id'))))
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
            //redirect('user/profile');
            //print_r($this->session->flashdata('item')); die;  
            }                        
            $data->result = $this->user_model->SelectSingleRecord('user','*',$udata,$orderby=array());                                    
            $data->title = 'User Profile';
            $data->field = 'User Profile';
            $data->page = 'profile';                
            redirect('user/dashboard', $data);          
        }
        
        
        public function upload_image(){
            
          $data=new stdClass();	
		  $id = $this->session->userdata('user_id');
		  if($this->input->post("photo"))
		  {
		  $this->user_model->unsetImage($id,'tbl_user','image','upload/user/');		  		 
		  $photo=$this->user_model->savecropimage("photo","upload/user/");		 	     
		  }
		  else{
		  $photo=$this->input->post('photo1');
          }
			if($_POST){                            
                
                $udata=array(                                            
                        'image'=>$photo                                                                  
                        );
             
                $update =  $this->user_model->UpdateRecord('user',$udata,array("id"=>$this->session->userdata('user_id')));
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
            redirect('user/dashboard', $data);    

        }
        
        public function cover_image(){
            
            $data=new stdClass();
            
            $data = $_POST['image'];

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            
            $data = base64_decode($data);
            $imageName = uniqid().time().'.png';
            file_put_contents('./upload/cover_image/'.$imageName, $data);
            
            $userpic=$this->user_model->SelectSingleRecord('users','*',array("id"=>$this->session->userdata('user_id')),$orderby=array());
            if($userpic->cover_image != 'bgprofile.png'){
                unlink('./upload/cover_image/'.$userpic->cover_image);    
            }
            
            
            $this->user_model->UpdateRecord('users',array("cover_image"=>$imageName),array("id"=>$this->session->userdata('user_id')));
            
            echo 'done';            

        }
        
        public function logout()
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

        function vendor_services(){
            $where = array("vendor_id"=>$this->session->userdata('user_id'));                
            $data = $this->user_model->SelectSingleRecord('vendor_services','*',$where,$orderby=array());
            $services = json_decode($data->services);
            $servicesArr = array();

            //echo "<pre>";
            //print_r($data);die();

            foreach ($services as $key => $value) {
                $where = array("id"=>$value);     
                $oneArr = $this->user_model->SelectSingleRecord('category','*',$where,$orderby=array());

                $where1['userId'] = $this->session->userdata('user_id');
                $where1['userServicesId'] = $value;
                $data = $this->user_model->SelectSingleRecord('vendor_services_price','*',$where1,$orderby=array());
                if(isset($data) && !empty($data)){
                    $oneArr->price = $data->price;
                    $oneArr->weekPrice = $data->weekPrice;
                    $oneArr->monthPrice = $data->monthPrice;
                    $oneArr->yearPrice = $data->yearPrice;
                }else{
                    $oneArr->price = '';
                    $oneArr->weekPrice = '';
                    $oneArr->monthPrice = '';
                    $oneArr->yearPrice = '';
                }
                
                $servicesArr['servicesArr'][] = $oneArr;
            }
            //echo '<pre>';
            //print_r($servicesArr);die();
            $this->load->view('vendor_services',$servicesArr);  
        }

        function add_price(){
            $postData = $this->input->post();
            if($postData['price'] != 0){
                $where['userId'] = $this->session->userdata('user_id');
                $where['userServicesId'] = $postData['id'];
                $data = $this->user_model->SelectSingleRecord('vendor_services_price','*',$where,$orderby=array());
                if(empty($data)){
                    $insert = $where;
                    $insert['price'] = $postData['price'];
                    $this->user_model->InsertRecord('vendor_services_price',$insert);
                }else{
                    $insert = $where;
                    $insert['price'] = $postData['price'];
                    $this->user_model->UpdateRecord('vendor_services_price',$insert,$where);
                }
            }
        }

        function add_vendor_services(){
            $categories = $this->user_model->SelectRecord('category','*',array("level"=>0,"status"=>'1',"is_deleted"=>"0"),'id asc');
            $where = array("vendor_id"=>$this->session->userdata('user_id'));                
            $data = $this->user_model->SelectSingleRecord('vendor_services','*',$where,$orderby=array());
            $services = json_decode($data->services);
            foreach($categories as $key => $value){
                $subcategories = $this->user_model->SelectRecord('category','*',array("parent_id"=>$value['id'],"status"=>'1',"is_deleted"=>"0"),'id asc');
                $isAdded = 0;

                if (in_array($value['id'], $services)){ 
                    $isAdded = 1;
                }


                foreach ($subcategories as $key1 => $value) {
                    $subcategories[$key1]['isAdded'] = 0;
                    if (in_array($value['id'], $services)){ 
                        $subcategories[$key1]['isAdded'] = 1;
                        $isAdded = 1;
                    } 
                }
                $categories[$key]['isAdded'] = $isAdded;
                $categories[$key]['subcategories'] = $subcategories;
            }
            
            //echo '<pre>';
            //print_r($categories);
            $this->load->view('add_vendor_services',array('categories' => $categories,'sellerid'=>$this->session->userdata('user_id')));
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

        function social_login(){
            $postData = $this->input->post();
            //print_r($postData); die;
            $where = array(
                'social_id !=' => Null,
                'social_id' => $postData['socialId'],
                'social_type' => $postData['socialType'],
            );

            $data = $this->user_model->SelectSingleRecord('users','*',$where,$orderby=array());

            if(empty($data)){
                $insert = array(                                            
                    'f_name' => $postData['firstName'],
                    'l_name' => $postData['lastName'],
                    'email' => $postData['email'],
                    'username' => $postData['fullName'],
                    'password' => md5(rand()),
                    'image' => $postData['image'],
                    'user_type' => '1',
                    'is_verified' => '1',
                    'social_id' => $postData['socialId'],
                    'social_type' => $postData['socialType'],
                );
                //print_r($insert); die;
                $new_id = $this->user_model->new_user($insert);

                $sess_array = array(
                    'user_id' => $new_id,
                    'email' => $postData['email'],
                    'image' => $postData['image'],
                    'user_group_id' => 1,
                    'logged_in' => TRUE
                );
                        
                $this->session->set_userdata($sess_array);
                $data->error=0;
                $data->success=1;
                $data->message='Login Successful';
                redirect('user/dashboard'); 

            }else{
                //print_r($data); die;
                $sess_array = array(
                    'user_id' => $data->id,
                    'email' => $data->email,
                    'image' => $data->image,
                    'user_group_id' => 1,
                    'logged_in' => TRUE
                );
                        
                $this->session->set_userdata($sess_array);
                $data->error=0;
                $data->success=1;
                $data->message='Login Successful';
                redirect('user/dashboard');
            }

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

    function changePaymentStatus(){
        $postData = $this->input->post();
        $requestId = $postData['id'];
        
        $data = $this->user_model->SelectSingleRecord('order_detail','*',array('id'=>$requestId),$orderby=array());

        $cardAccount['cardToken'] = 'NA';
        $cardAccount['cardType'] = 'NA';
        $cardAccount['custId'] = 'NA';
        $cardAccount['custEmail'] = 'NA';
        $cardAccount['refundedId'] = 'NA';
        $cardAccount['transactionId'] = 'NA';


        $cardAccount['requestId'] = $data->order_id;
        $cardAccount['mainPrice'] = $data->amount*100;
        $cardAccount['discountPresent'] = 0;
        $cardAccount['price'] = $data->amount*100;
        $cardAccount['userId'] = $this->session->userdata('user_id');
        
        //print_r($cardAccount); die;
        $this->db->insert('payment',$cardAccount);

        $this->db->where(array('order_id' => $data->order_id));
        $this->db->update('order_detail',array('payment_status' => 'paid'));

    }

}
?>