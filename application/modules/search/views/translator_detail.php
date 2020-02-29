<?php if(!empty($unavalibaleDates)){
		$dates = $unavalibaleDates;
	}
	else{
		$dates = date("Y/m/d");
	}
?>
<!-- page banner start -->
	<div class="page_banner_section">
		<div class="container">
			<div class="page_banner_caption">
				<h2>Search Translator</h2>
				<div class="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Translator</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- page banner End -->
	<!-- Details section start -->
	<div class="section translator_detail_page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-12">
					<div class="trans_detail_bg">
						<div class="back_search_head">
							<a href="<?php echo base_url('translator'); ?>"><i class="fas fa-long-arrow-alt-left"></i> Back to search page</a>
						</div>
						<div class="trans_detail_figure">
							<div class="trans_thumb_lft">
								<div class="trans_thumb">
								  <?php if($detailvendor->image!=""){  ?>
									<img src="<?php echo base_url('upload');?>/vendor/<?php echo $detailvendor->image; ?>" alt="" class="img-fluid">			
									<?php } else {  ?>
									<img src="<?php echo base_url('front');?>/assets/images/translator/img_3.jpg" alt="" class="img-fluid">
									<?php } ?>	
								</div>
							</div>
							<div class="trans_caption_rgt">
								<div class="heading_dv">
									<div class="lft">
										<h5><?php if(isset($detailvendor->first_name)) {echo $detailvendor->first_name; } if(isset($detailvendor->last_name)) {echo ' '.$detailvendor->last_name; } ?></h5>
										<div class="rating_wraps">
											<div class="rating_dv">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star disable_str"></i>
											</div>
											<span class="review_txt">(30 views)</span>
										</div>
									</div>
									<?php if($this->session->userdata('user_group_id')!=2){ ?>
									<div class="right_dv">
										<a href="#" class="hire_btn site_button">Hire now</a>
									</div>
									<?php } ?>
								</div>
								<div class="amount_trns">$<?php if(isset($detailvendor->price)) {echo $detailvendor->price; } ?> <span>/hr</span></div>
								<div class="table-responsive">
								  <table class="table prof_detail_lst">
									<tr>
										<td class="frst_spn">Gender</td>
								<td class="scnd_spn"><?php if(isset($detailvendor->gender)) {echo $detailvendor->gender; } ?></td>
									</tr>
									<tr>
										<td class="frst_spn">Number</td>
										<td class="scnd_spn"><?php if(isset($detailvendor->contact_number)) {echo $detailvendor->contact_number; } ?></td>
									</tr>
									<tr>
										<td class="frst_spn">Email</td>
										<td class="scnd_spn"><?php if(isset($detailvendor->email)) {echo $detailvendor->email; } ?></td>
									</tr>
									<tr>
										<td class="frst_spn">Language</td>
										<td class="scnd_spn"><?php   if(!empty($userlang)){ $lg =array();  
										foreach($userlang as $vallang) {  $lg[] = $vallang['title']; 
										 } echo  $lg = implode(", ",$lg); }?></td>
									</tr>
									<tr>
										<td class="frst_spn">City</td>
										<td class="scnd_spn"><?php   if(!empty($usercity)){  $ct =array(); 
										foreach($usercity as $valcity) { $ct[] = $valcity['title']; }  echo $cty = implode(", ",$ct); }?></td>
									</tr>
									
									<tr>
										<td class="frst_spn">Address</td>
										<td class="scnd_spn"><?php if(isset($detailvendor->address)) {echo $detailvendor->	address; } ?></td>
									</tr>
									<tr>
										<td class="frst_spn">Other Profile</td>
										<td class="scnd_spn">
										   <div class="social_icons">
											  <a href="<?php if(isset($detailvendor->facebook_url)) {echo $detailvendor->	facebook_url; } ?>" target="_blanck"><i class="fab fa-facebook-f"></i></a>
											  <a href="<?php if(isset($detailvendor->twiter_url)) {echo $detailvendor->		twiter_url; } ?>" target="_blanck"><i class="fab fa-twitter"></i></a>
											  <a href="<?php if(isset($detailvendor->google_url)) {echo $detailvendor->		google_url; } ?>" target="_blanck"><i class="fab fa-google-plus-g"></i></a>
											  <a href="<?php if(isset($detailvendor->insta_url)) {echo $detailvendor->		insta_url; } ?>" target="_blanck"><i class="fab fa-instagram"></i></a>
									 		</div>
									 	</td>
									</tr>
								  </table>
								</div>
								<div class="profile_dtl_tabs">
									<ul class="tab_menu">
										<li class="tab_link active" data-tab="personal_tab">
											personal details
										</li>
										<li class="tab_link" data-tab="business_tab">
											Business details
										</li>
										<li class="tab_link" data-tab="other_tab">
											Other
										</li>
									</ul>
									<div class="tab_content_wrap">
										<div class="tab_content active" id="personal_tab">
											<div class="tab_content_inner">
												<h5>personal details</h5>
												<p><?php if(isset($detailvendor->personal_info)) {echo $detailvendor->	personal_info; } ?></p>
											</div>
										</div>
										<div class="tab_content" id="business_tab">
											<div class="tab_content_inner">
												<h5>Business details</h5>
												<p><?php if(isset($detailvendor->bussiness_info)) {echo $detailvendor->	bussiness_info; } ?></p>
											</div>
										</div>
										<div class="tab_content" id="other_tab">
											<div class="tab_content_inner">
												<h5>Other Details</h5>
												<p><?php if(isset($detailvendor->other_info)) {echo $detailvendor->other_info; } ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Details section start -->
	
	<!-- Booking calendar start -->
	<div class="section booking_cal_section">
		<div class="container">
			<div class="booking_head_dv">
				<h5>Booking Calendar</h5>
			</div>
			<?php if($this->session->userdata('user_group_id')!=2){ ?>
			<div class="booking_cal_bg">
				<div class="booking_form">
					<div class="booking_forms">
						<div class="booking_form_head">
							<h5>Booking</h5>
						</div>
						<form method="post" action="<?php echo base_url('booking'); ?>">
						
							<div class="form_group">
								<input type="text" name="booking_date" class="datepicker input_white" placeholder="Select Date">
							</div>
							
							<div class="form_group">
								<input type="text" name="booking_time" class="time_picker input_white" placeholder="Select Time">
							</div>
							
							<input type="hidden" name="vendor_id" value="<?php echo $this->uri->segment(3);  ?>">
							
							<input type="hidden" name="booking_price" value="<?php if(isset($detailvendor->price)) {echo $detailvendor->price; } ?>">
							
							<div class="form_group">
								<select name="booking_hour">
									<option value="">Select Hour</option>
									<option value="1">1 Hour</option>
									<option value="2">2 Hour</option>
									<option value="3">3 Hour</option>
									<option value="4">4 Hour</option>
									<option value="5">5 Hour</option>
									<option value="6">6 Hour</option>
									<option value="7">7 Hour</option>
									<option value="8">8 Hour</option>
								</select>
							</div>
							
							<div class="form_group">
								<select name="booking_lang">
									<option value="">Select Language</option>
									<?php foreach($userlang as $vallang) { ?>
									<option value="<?php echo $vallang['title']; ?>"><?php echo $vallang['title']; ?></option>
									<?php }  ?>									
								</select>
							</div>
							
							<div class="form_group">
								<select name="booking_city">
									<option value="">Select City</option>
									<?php foreach($usercity as $valcity) { ?>
									<option value="<?php echo $valcity['title']; ?>"><?php echo $valcity['title']; ?></option>
									<?php }  ?>									
								</select>
							</div>
							
							<div class="button_group">
							    <?php if($this->session->userdata('user_id')!=""){ ?>
								<button type="submit" class="book_btn">Book</button>
								<?php } else {  ?>
								<a href="<?php echo base_url('signin');?>" class="book_btn">Book</a>			
								<?php }  ?>
							</div>
						</form>
					</div>
				</div>
				<?php } ?>
				<div class="booking_calendar_dv">
					<div class="booking_calendar">
						<div class="calendar_input"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Booking calendar End -->
	
	<!-- Review section start -->
	<div class="section review_rating_sec pad_top_bottom_40">
		<div class="container">
			<h5 class="review_title">Review</h5>
			<ul class="review_list">
				<!-- review list start -->
				<li>
					<div class="review_user_list">
						<div class="r_thumb">
							<img src="<?php echo base_url('front');?>/assets/images/team/team1.jpg" alt="">
						</div>
						<div class="r_caption">
							<div class="headng">
								<h5>Norma M. Morgan</h5>
							</div>
							<div class="rating_dv">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star disable_str"></i>
							</div>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
						</div>
					</div>
				</li>
				<!-- review list end -->
				
			</ul>
		</div>
	</div>
	<!-- Review section End -->
<script src="<?php echo base_url('front');?>/assets/js/plugins/jquery_ui/jquery-ui.min.js"></script>

<script>

var holidays= [<?php echo $dates; ?>];

 $('.calendar_input').datepicker({
	dateFormat: "yy/mm/dd",
	//defaultDate: "+1w",
	 minDate:0,
	 //minDateHighlight: false,
	 firstDay: 1,
	 beforeShowDay: function (date) {
		
	   
	   for (var i = -1; i < holidays.length; i++) {
			if (new Date(holidays[i]).toString() == date.toString()) {
				
				  
			}
			 var string = jQuery.datepicker.formatDate("yy/mm/dd", date);
			 var classs =   jQuery('.calendar_input').addClass("neha");
			 //return [ holidays.indexOf(classs) == -1 ];
			 return [ holidays.indexOf(string) == -1 ];
			 
		}
	  /*  return[date.getDay()== 0 || date.getDay()== 6? false:true]; */
	 return [true,''];
	   
	},
	
   });
   
   
 $('.datepicker').datepicker({
	dateFormat: "yy/mm/dd",
	//defaultDate: "+1w",
	 minDate:0,
	 firstDay: 1,
	 beforeShowDay: function (date) {
		
	   
	   for (var i = -1; i < holidays.length; i++) {
			if (new Date(holidays[i]).toString() == date.toString()) {
				
				  
			}
			 var string = jQuery.datepicker.formatDate("yy/mm/dd", date);
			 return [ holidays.indexOf(string) == -1 ];
			 
		}
	  /*  return[date.getDay()== 0 || date.getDay()== 6? false:true]; */
	 return [true,''];
	   
	},
	
   });
     
   
 

</script>	