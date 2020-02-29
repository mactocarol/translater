<?php
class Search_model extends MY_Model 
{
	function __construct() {
		parent::__construct();		
	}
    
    function getVendor($serviceid){

		$data = $this->db->get_where('services',array('id' => $serviceid))->row_array();
	    if(empty($data)){
	        return false;
	    }
		$ser = get_parent_id($data['category_id']);
        if(empty($ser)){
	        return false;
	    }
		/*print_r($serviceid.' sdf ');
		
		die();*/
		$sql = "
			SELECT 	
				*
			FROM 
				vendor_services 
			INNER JOIN 
				users 
				ON 
					users.id=vendor_services.vendor_id 
			INNER JOIN 
				vendor_services_price 
				ON 
				vendor_services_price.userServicesId=$ser
				AND
				vendor_services_price.userId=users.id
			WHERE 
				CONCAT(',', services_search, ',') 
			LIKE '%,".$ser.",%'
		";
		//print_r($sql);die();
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
    
    function searchVendor($serviceid){
        $data = $this->db->get_where('services',array('id' => $serviceid))->row_array();
	    if(empty($data)){
	        return false;
	    }
		$serviceid = get_parent_id($data['category_id']);
        if(empty($serviceid)){
	        return false;
	    }
        
        if(empty($serviceid)){
	        return false;
	    }
		
		$sql = "
			SELECT 	
				*
			FROM 
				vendor_services 
			INNER JOIN 
				users 
				ON 
					users.id=vendor_services.vendor_id 
			INNER JOIN 
				vendor_services_price 
				ON 
				vendor_services_price.userServicesId=$serviceid
				AND
				vendor_services_price.userId=users.id
			WHERE 
				CONCAT(',', services_search, ',') 
			LIKE '%,".$serviceid.",%' AND vendor_services_price.price != '' AND vendor_services_price.price != '0'
		";
		//print_r($sql);die();
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
    
	function getPrice($serviceid,$userId){

		$data = $this->db->get_where('services',array('id' => $serviceid))->row_array();
		$ser = get_parent_id($data['category_id']);

		/*print_r($serviceid.' sdf ');
		print_r($ser);
		die();*/
		$sql = "
			SELECT 	
				*
			FROM 
				vendor_services 
			INNER JOIN 
				users 
				ON 
					users.id=vendor_services.vendor_id 
			INNER JOIN 
				vendor_services_price 
				ON 
				vendor_services_price.userServicesId=$ser
				AND
				vendor_services_price.userId=$userId
			WHERE 
				CONCAT(',', services_search, ',') 
			LIKE '%,".$ser.",%'
		";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}

	function mostPopularCategories(){
		$data = $this->db->order_by('rand()')->group_by('parent_id')->get_where('category',array('level' => 1))->result_array();
		$data = $this->db->order_by('rand()')->where_in('id',array(10,11,42,43,61,65,68,66,101,102,73,74,75,79,80,86,87))->limit(8)->get('category')->result_array();
		return $data;
	}
    
   function search_record($TableName,$keyword,$orderby)
	{
		// print_r($query);die();
        if($keyword){
            $result = $this->db->select('id,title')->from('services')
                            ->where("title LIKE '%$keyword%'")->get()->result_array();    
        }else{
            $result = [];
        }
		
       	return $result;
	}
	
		
	function fetch_datacount($keyword,$lng,$ctyy,$price,$rating,$sortby)
	{
		
     if($price!=""){
	 $price = explode("-",$price);  
	 $price1 =  $price[0];
     $price2 =  $price[1];
	 }else {
		  $price1 =  "";
     $price2 = "";
	 }	 
	 
    $this->db->select("count(*) as count , tbl_user.*,tbl_vendor_details.price,tbl_vendor_city.city_id,tbl_vendor_lang.language_id,tbl_rating.rate");
    $this->db->join("tbl_vendor_details","tbl_user.id=tbl_vendor_details.vendor_id","left");
	$this->db->join("tbl_vendor_city","tbl_user.id=tbl_vendor_city.vendor_id","left");
	$this->db->join("tbl_rating","tbl_user.id=tbl_rating.vendor_id","left");
	$this->db->join("tbl_vendor_lang","tbl_user.id=tbl_vendor_lang.vendor_id","left");
    
	if($keyword!=''){   
	$this->db->where("(tbl_user.first_name LIKE '%$keyword%' OR tbl_user.last_name LIKE '%$keyword%' OR tbl_vendor_details.price LIKE '%$keyword%')");	
	}
	
	if($lng!=''){ 
	$this->db->where_in("tbl_vendor_lang.language_id",explode(',',$lng));  
	}
	
	if($ctyy!=''){
	$this->db->where_in("tbl_vendor_city.city_id",explode(',',$ctyy));
	}
	
	if($price1!='' && $price2!='' ){
	$this->db->where('tbl_vendor_details.price >=',$price1);
    $this->db->where('tbl_vendor_details.price <=', $price2);
	}
	
	if($rating){	
    $this->db->where('tbl_rating.rate', $rating);
	}
	
	$this->db->where("tbl_user.is_verified",1);
	$this->db->where("tbl_user.user_type",2);
	$this->db->group_by("tbl_user.id", "desc");
	
	if($sortby=="rating_asc"){
	$this->db->order_by("tbl_rating.rate", "asc");		
	}
	else if($sortby=="rating_desc"){
	$this->db->order_by("tbl_rating.rate", "desc");		
	}
	else if($sortby=="price_asc"){
	$this->db->order_by("tbl_vendor_details.price", "asc");		
	}
	else if($sortby=="price_desc"){
	$this->db->order_by("tbl_vendor_details.price", "desc");		
	}	
	else{
	$this->db->order_by("tbl_user.id", "desc");	
	}
	
	$this->db->from('tbl_user');
	$query = $this->db->get();
	//$result = $query->row_array();
		
	return  $result = $query->num_rows(); 
	//echo $this->db->last_query(); die;
	//return  $result['count'];   
	}
	
	
	function fetch_data($keyword,$lng,$ctyy,$price,$rating,$sortby,$limit,$start)
	{
    if($price!=""){
	 $price = explode("-",$price);  
	 $price1 =  $price[0];
     $price2 =  $price[1];
	 }else {
		  $price1 =  "";
     $price2 = "";
	 }
	 
    $this->db->select("tbl_user.*,tbl_vendor_details.price,tbl_vendor_city.city_id,tbl_vendor_lang.language_id,tbl_rating.rate");
    $this->db->join("tbl_vendor_details","tbl_user.id=tbl_vendor_details.vendor_id","left");
	$this->db->join("tbl_vendor_city","tbl_user.id=tbl_vendor_city.vendor_id","left");
	$this->db->join("tbl_rating","tbl_user.id=tbl_rating.vendor_id","left");
	$this->db->join("tbl_vendor_lang","tbl_user.id=tbl_vendor_lang.vendor_id","left");
    
	if($keyword!=''){   
	$this->db->where("(tbl_user.first_name LIKE '%$keyword%' OR tbl_user.last_name LIKE '%$keyword%' OR tbl_vendor_details.price LIKE '%$keyword%')");	
	}
	
	if($lng!=''){ 
	$this->db->where_in("tbl_vendor_lang.language_id",explode(',',$lng));  
	}
	
	if($ctyy!=''){
	$this->db->where_in("tbl_vendor_city.city_id",explode(',',$ctyy));
	}
	
	if($price1!='' && $price2!='' ){
	$this->db->where('tbl_vendor_details.price >=',$price1);
    $this->db->where('tbl_vendor_details.price <=', $price2);
	}
	
	if($rating){	
    $this->db->where('tbl_rating.rate', $rating);
	}
	
	$this->db->where("tbl_user.user_type",2);
	$this->db->where("tbl_user.is_verified",1);
	$this->db->group_by("tbl_user.id", "desc");
	
	if($sortby=="rating_asc"){
	$this->db->order_by("tbl_rating.rate", "asc");		
	}
	else if($sortby=="rating_desc"){
	$this->db->order_by("tbl_rating.rate", "desc");		
	}
	else if($sortby=="price_asc"){
	$this->db->order_by("tbl_vendor_details.price", "asc");		
	}
	else if($sortby=="price_desc"){
	$this->db->order_by("tbl_vendor_details.price", "desc");		
	}	
	else{
	$this->db->order_by("tbl_user.id", "desc");	
	}
	
	$this->db->limit($limit,$start);
	$this->db->from('tbl_user');
	$query = $this->db->get();
	return $result = $query->result_array();	
    //echo $this->db->last_query(); die;
	}
	
	
	function translator_detail($id)
	{
   
    $this->db->select("tbl_user.*,tbl_vendor_details.*");
    $this->db->join("tbl_vendor_details","tbl_user.id=tbl_vendor_details.vendor_id","left");    	
	$this->db->where("tbl_user.user_type",2);
	$this->db->where("tbl_user.id",$id);
	$this->db->from('tbl_user');
	$query = $this->db->get();
	return $result = $query->row();	
    //echo $this->db->last_query(); die;
	}
        
}