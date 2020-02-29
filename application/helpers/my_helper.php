<?php	
if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	
    function phpmailer($to,$sub,$msg){        
        require("./PHPMailer/class.phpmailer.php");

            $email = 'mss.parvezkhan@gmail.com';
            $password = 'mact@123';
            $to_id = $to;
            $message = $msg;
            $subject = $sub;
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 1;
            $mail->Host = "mactosys.com";
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->From = "info@khidmat.com";
            $mail->FromName = "Khidmat";
            $mail->SMTPAuth = false;
            $mail->Username = 'dating@mactosys.com';
            $mail->Password = 'dating!@#';
            $mail->addAddress($to_id);
            $mail->Subject = $subject;
            $mail->msgHTML($message);
            $mail->send();
    }
    
	    
    
    function get_user($userid){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('id'=>$userid));
            $query = $CI->db->get('users');            
            $reslt = $query->row();
            //print_r($userid); die;
            return $reslt;
    }
        
    
    function get_time_ago( $time )
    {
        $time_difference = time() - $time;
    
        if( $time_difference < 1 ) { return 'less than 1 second ago'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day',
                    60 * 60                 =>  'hour',
                    60                      =>  'minute',
                    1                       =>  'second'
        );
    
        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;
    
            if( $d >= 1 )
            {
                $t = round( $d );
                return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
    
    
	
	function getLatLong($address){
		if(!empty($address)){
		    //Formatted address
		    $formattedAddr = str_replace(' ','+',$address);
		    //Send request and receive json data by address
		    $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
		    $output = json_decode($geocodeFromAddr);
		    //Get latitude and longitute from json data
		    $data['latitude']  = $output->results[0]->geometry->location->lat; 
		    $data['longitude'] = $output->results[0]->geometry->location->lng;
		    //Return latitude and longitude of the given address
		    if(!empty($data)){
			return $data;
		    }else{
			return false;
		    }
		}else{
		    return false;   
		}
	}
    

    function get_notifications($userId){
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->where('user_id',$userId);
        $query = $CI->db->get('notification');            
        $reslt = $query->result_array();
        return $reslt;
    }
   

    if (!function_exists('baseE')) {
      function baseE($data){
        return base64_encode(md5(rand()).'_'.$data.'_'.md5(rand()));
      }
    }

    if (!function_exists('baseD')) {
      function baseD($data){
        return explode('_', base64_decode($data))[1] ;
      }
    }
	
	function get_lang($id)
	{
	
		 $CI =& get_instance();
            $CI->db->select('tbl_vendor_lang.*,tbl_language.title');           
            $CI->db->join('tbl_language','tbl_vendor_lang.language_id = tbl_language.id','left');
            $CI->db->where(' tbl_vendor_lang.vendor_id',$id);
            $query = $CI->db->get('tbl_vendor_lang');            
            $reslt = $query->result();			
            return $reslt;      	
		
	}
	
	function get_city($id)
	{		
		 $CI =& get_instance();
            $CI->db->select('tbl_vendor_city.*,tbl_city.title');           
            $CI->db->join('tbl_city','tbl_vendor_city.city_id = tbl_city.id','left');
            $CI->db->where('tbl_vendor_city.vendor_id',$id);
            $query = $CI->db->get('	tbl_vendor_city');            
            $reslt = $query->result();			
            return $reslt;      	
		
	}
	
	function get_user_name($userid){
        
            $CI =& get_instance();
            $CI->db->select('*');
            $CI->db->where(array('id'=>$userid));
            $query = $CI->db->get('tbl_user');            
            $reslt = $query->row();
          return  $reslt->first_name." ". $reslt->last_name;
           // return $reslt;
    }
        
       
        
?>