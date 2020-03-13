<?php if(!empty($unavalibaleDates)){
		$dates = $unavalibaleDates;
	}
	else{
		$dates = date("Y/m/d");
	}
?>

 <link rel="stylesheet" href="<?php echo base_url('front');?>/assets/css/croppie.css">
	<!-- page banner start -->
	<div class="page_banner_section">
		<div class="container">
			<div class="page_banner_caption">
				<h2>Translator dashboard</h2>
				<div class="breadcrumbs">
					<ul>
						<li><a href="<?php echo base_url();?>">Home</a></li>
						<li>Translator</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- page banner End -->
<!-- Details section start -->
	<div class="section translator_detail_page">
	 <?php
//	  print_r($item); die;
	// display error & success messages
	if(isset($message))  {					
		if($success){
		?>
		  <div class="alert alert-dismissible alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Success!</strong> <?php print_r($message); ?>
		  </div>						
		<?php
		}else{
		?>
			<div class="alert alert-dismissible alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Error!</strong> <?php print_r($message); ?>
			</div>						
		<?php
		}
	}
	?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-12">
					<div class="trans_detail_bg">
						<div class="back_search_head">
							<!--<a href="translator.html"><i class="fas fa-long-arrow-alt-left"></i> Back to search page</a>-->
						</div>
						<div class="trans_detail_figure">
							<div class="trans_thumb_lft">
								<div class="trans_thumb" id="showphoto">
								<?php if($userDatas->image) { ?>
								<img src="<?php echo base_url('upload/vendor');?>/<?php if(!empty($userDatas)){ echo $userDatas->image; }?>" alt="" class="img-fluid" id="profile_img">
								<div  class="col-md-3" id="showphoto" class="img-fluid">
							        </div>		
								<?php } else{?>
									<img src="<?php echo base_url('front');?>/assets/images/translator/thumbs.jpg" alt="" class="img-fluid" id="profile_img">
								<?php } ?>
									<label class="img_upload_icon">
									  <a href="#"  data-toggle="modal" data-target="#myModalphoto"><i class="far fa-image"></i></a>
									</label>
								</div>
							</div>
							<div class="trans_caption_rgt">
								<div class="heading_dv">
									<div class="lft">
										<h5><?php if(!empty($userDatas)){ echo $userDatas->first_name." ".$userDatas->last_name; } ?></h5>
										<div class="rating_wraps">
											<?php if($allvenRating['avgRate'] == 1){ ?>
													<div class="rating_dv">
														<i class="fas fa-star"></i>
														<i class="fas fa-star disable_str"></i>
														<i class="fas fa-star disable_str"></i>
														<i class="fas fa-star disable_str"></i>
														<i class="fas fa-star disable_str"></i>
													</div>
												<?php } else if($allvenRating['avgRate'] == 1.5) {?>
												<div class="rating_dv">
														<i class="fas fa-star"></i>
														<i class="fas fa-star-half-alt"></i>
														<i class="fas fa-star disable_str"></i>
														<i class="fas fa-star disable_str"></i>
														<i class="fas fa-star disable_str"></i>
													</div>
												<?php } else if($allvenRating['avgRate'] == 2) {?>
												<div class="rating_dv">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star disable_str"></i>
														<i class="fas fa-star disable_str"></i>
														<i class="fas fa-star disable_str"></i>
													</div>
												<?php } else if($allvenRating['avgRate'] == 2.5) {?>
												<div class="rating_dv">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star-half-alt"></i>
														<i class="fas fa-star disable_str"></i>
														<i class="fas fa-star disable_str"></i>
													</div>
												<?php } else if($allvenRating['avgRate'] == 3) {?>
												<div class="rating_dv">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star disable_str"></i>
														<i class="fas fa-star disable_str"></i>
													</div>
												<?php } else if($allvenRating['avgRate'] == 3.5) {?>
												<div class="rating_dv">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star-half-alt"></i>
														<i class="fas fa-star disable_str"></i>
													</div>
												
												<?php } else if($allvenRating['avgRate'] == 4) {?>
													<div class="rating_dv">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star disable_str"></i>
													</div>
												<?php }  else if($allvenRating['avgRate'] == 4.5) {?>
												<div class="rating_dv">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star-half-alt"></i>
													</div>
												<?php } else if($allvenRating['avgRate'] == 5) {?>
													<div class="rating_dv">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
													</div>
												<?php } ?>
											<span class="review_txt">(<?php if(!empty($userDatas)){ echo $userDatas->view_count; }?> Views)</span>
										</div>
									</div>
									<div class="right_dv">
										<a href="#" class="edit_trans site_button" data-toggle="modal" data-target="#edit_profile_modal">Edit Profile</a> 
										<a href="<?php echo base_url('vendor/calendar');?>" class="hire_btn site_button">Set & view calendar</a>
									</div>
								</div>
								<div class="amount_trns">$ <?php if(!empty($userDetails)){ echo $userDetails->price; }?><span>/hr</span></div>
								<div class="table-responsive">
								  <table class="table prof_detail_lst">
									<tr>
										<td class="frst_spn">Gender</td>
										<td class="scnd_spn"><?php if(!empty($userDatas)){ echo $userDatas->gender; }?></td>
									</tr>
									<tr>
										<td class="frst_spn">Number</td>
										<td class="scnd_spn"><?php if(!empty($userDetails)){ echo $userDetails->contact_number;} ?></td>
									</tr>
									<tr>
										<td class="frst_spn">Email</td>
										<td class="scnd_spn"><?php if(!empty($userDatas)){ echo $userDatas->email; } ?></td>
									</tr>
									<!--<tr>
										<td class="frst_spn">Occupation</td>
										<td class="scnd_spn"><?php //if(!empty($userOccup)){ $lg =array();  
										//foreach($userOccup as $vallang) {  $lg[] = $vallang['title']; 
										 // } echo  $lg = implode(", ",$lg);  }?></td>
									</tr>-->
									<tr>
										<td class="frst_spn">City</td>
										<td class="scnd_spn"><?php   if(!empty($usercity)){  $ct =array(); 
										foreach($usercity as $valcity) { $ct[] = $valcity['title']; }  echo $cty = implode(", ",$ct); }?></td>
									</tr>
									<tr>
										<td class="frst_spn">Address</td>
										<td class="scnd_spn"><?php if(!empty($userDetails)){ echo $userDetails->address; }?></td>
									</tr>
									<tr>
										<td class="frst_spn">Other Profile</td>
										<td class="scnd_spn">
										   <div class="social_icons">
											  <a href="<?php if(!empty($userDetails)){ echo $userDetails->facebook_url; } ?>"><i class="fab fa-facebook-f"></i></a>
											  <a href="<?php if(!empty($userDetails)){ echo $userDetails->twiter_url; } ?>"><i class="fab fa-twitter"></i></a>
											  <a href="<?php if(!empty($userDetails)){ echo $userDetails->google_url; } ?>"><i class="fab fa-linkedin-in"></i></a>
											  <a href="<?php if(!empty($userDetails)){ echo $userDetails->insta_url; } ?>"><i class="fab fa-instagram"></i></a>
									 		</div>
									 	</td>
									</tr>
								  </table>
								</div>
								<!--occupation row --->
								<div class="occupation_row">
									<h4>Occupation</h4>
									
									<?php if(!empty($userOccup)){ $lg =array();  
										foreach($userOccup as $vallang) {   
										?>
									<!-- panel start -->
									<div class="ac_panel">
										<div class="ac_heading">
											<h5><?php  echo $vallang['title'];; ?></h5>
											<span class="ac_icons"><i class="fas fa-plus"></i></span>
										</div>
										<div class="ac_content">
											<div class="panel_body">
												<h5>Experience</h5>
												<p><?php  echo $vallang['experience']; ?> Year</p>
												<h5>specialization</h5>
												<p><?php  echo $vallang['specialization']; ?></p>
												<h5>Booking Calendar</h5>
												<p><div class="calendar_tabs_dv"><a class="tabs_link" href="<?php echo site_url();?>vendor/calendar_views/<?php echo $vallang['title'];  ?>/<?php echo $vallang['id'];  ?>"><?php echo $vallang['title']."   Calendar           ".'</br>';?></div></a>
											    </p>
											</div>
										</div>
									</div>
									<?php } }?>
									<!-- panel start -->
									
								</div>
								<!--occupation row --->
								<!--tabs start--->
								<div class="profile_dtl_tabs">
									<div>
										<a href="#" class="site_button edit_dtl_btn" data-toggle="modal" data-target="#edit_detail_modal">
											<i class="fas fa-pencil-alt"></i> Edit Details</a>
									</div>
									<ul class="tab_menu">
										<li class="tab_link active" data-tab="personal_tab">
											Personal details
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
												<p><?php if(!empty($userDetails)) { echo $userDetails->personal_info; } ?></p>
											</div>
										</div>
										<div class="tab_content" id="business_tab">
											<div class="tab_content_inner">
												<h5>Business details</h5>
											<p><?php if(!empty($userDetails)) { echo $userDetails->bussiness_info; } ?></p></div>
										</div>
										<div class="tab_content" id="other_tab">
											<div class="tab_content_inner">
												<h5>Other Details</h5>
											<p><?php if(!empty($userDetails)) { echo $userDetails->other_info	; } ?></p></div>
										</div>
									</div>
								</div>
								<!--tabs End--->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Review section start -->
	<div class="section review_rating_sec pad_top_bottom_40">
		<div class="container">
			<h5 class="review_title">Review</h5>
			<ul class="review_list">
				<!-- review list start -->
				<?php if(!empty($userRating)) {
				foreach ($userRating as $key => $value) { ?>
				<li>
					<div class="review_user_list">
						<div class="r_thumb">
						<?php if(get_user_image($value['user_id'])) {?>
							<img src="<?php echo base_url('upload');?>/user/<?php print_r(get_user_image($value['user_id'])); ?>" alt="">
						<?php } else{?>
							<img src="<?php echo base_url('front');?>/assets/images/translator/thumbs.jpg" alt="">
						<?php } ?>		
						</div>
						<div class="r_caption">
							<div class="headng">
								<h5><?php print_r(get_user_name($value['user_id'])); ?></h5>
							</div>
							<?php if($value['rate'] == 1){ ?>
							<div class="rating_dv">
							    <i class="fas fa-star"></i>
								<i class="fas fa-star disable_str"></i>
								<i class="fas fa-star disable_str"></i>
								<i class="fas fa-star disable_str"></i>
								<i class="fas fa-star disable_str"></i>
							</div>
							<?php }else if($value['rate'] == 2){ ?>
							<div class="rating_dv">
							    <i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star disable_str"></i>
								<i class="fas fa-star disable_str"></i>
								<i class="fas fa-star disable_str"></i>
							</div>
							
							<?php } else if($value['rate'] == 3){ ?>
							<div class="rating_dv">
							    <i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star disable_str"></i>
								<i class="fas fa-star disable_str"></i>
							</div>
						
							<?php } else if($value['rate'] == 4){ ?>
							<div class="rating_dv">
							    <i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star disable_str"></i>
							</div>
							
							<?php } else if($value['rate'] == 5){ ?>
							<div class="rating_dv">
							    <i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
							</div>
							<?php } ?>
							<p><?php echo $value['review']; ?></p>
						</div>
					</div>
				</li>
				<?php } }
				else{?>
					<span>No Reviews</span>
				<?php }?>
				<!-- review list end -->
				
			</ul>
		</div>
	</div>
	<!-- Review section End -->
    
	<!-- Edit profile modal start -->
	<div class="modal fade" id="edit_profile_modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Edit Your Profile Details</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="login_form profile_form">
	      		<form action="<?php echo site_url('vendor/Vendor/editProfile'); ?>" method="POST"> 
					<!-- row start -->
	      			<div class="row">
	      				<div class="col-lg-6">
							<div class="form_group">
								<label>First Name *</label>
								<div class="input_group">
									<input type="hidden" name="uid" id="uid" value="<?php echo $this->session->userdata('user_id'); ?>">
									<input type="text" required name="fname" id="fname" value="<?php if(!empty($userDatas)) { echo $userDatas->first_name; } ?>" placeholder="Enter Your Name">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form_group">
								<label>Last Name *</label>
								<div class="input_group">
									<input type="text" required name="lname" id="lname" value="<?php if(!empty($userDatas)) { echo $userDatas->last_name; }?>" placeholder="Enter Your Name">
								</div>
							</div>
						</div>
	      				
	      				<div class="col-lg-6">
		      				<div class="form_group">
								<label>Contact Number</label>
								<div class="input_group">
									<input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="contact_number" id="contact_number" value="<?php if(!empty($userDetails)) { echo $userDetails->contact_number; }?>" placeholder="Enter Your Mobile Number">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form_group">
								<label>Price Per Hour *</label>
								<div class="input_group">
									<input type="text" required oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="price" id="price" value="<?php if(!empty($userDetails)) { echo $userDetails->price; }?>"  placeholder="Price Per Hour">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
	      					<div class="form_group">
								<label>Email *</label>
								<div class="input_group">
									<input type="email"  name="email" value="<?php if(!empty($userDatas)){ echo $userDatas->email; }?>" placeholder="Enter Your Email" readonly>
								</div>
							</div>
	      				</div>
						<!--<div class="col-md-6 col-12">
							<div class="form_group">
								<label>Language *</label>
								<div class="input_group select_box">
									<select class="selectpicker" multiple="" name="lang[]" id="lang">
									<option value="" disabled>Select Language</option>
									<?php  
									/*  $industrys = '';
									 $fff = $userlangids; 

									  if(!empty($fff)){											 
										$industrys = explode(',',$fff);
									  }
									  if(!empty($alllanguage)){
											 foreach ($alllanguage as $value) { */
										?>
										<option value="<?php// echo $value['id']; ?>" 
			                           <?php //echo (in_array($value['id'],$industrys)) ? 'selected' : ''; ?>><?php //echo $value['title']; ?></option>
			
									  <?php //} } ?>
									</select>
								</div>
							</div>
						</div>-->
						<div class="col-md-6 col-12">
							<div class="form_group">
								<label>City *</label>
								<div class="input_group select_box">
									<select class="selectpicker" multiple="" name="city[]" id="city">
										<option value="" disabled>Select City</option>
										<?php  
										 $industrys1 = '';
										 $ffff = $usercityids; 

										  if(!empty($ffff)){											 
											$industrys1 = explode(',',$ffff);
										  }
										  if(!empty($allcity)){
											 foreach ($allcity as $value1) {
										?>
										<option value="<?php echo $value1['id']; ?>" 
			                           <?php echo (in_array($value1['id'],$industrys1)) ? 'selected' : ''; ?>><?php echo $value1['title']; ?></option>
									  <?php } } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
							
	      			
	      			<!-- row End -->
	      			<h5 class="form_title">Social Links</h5>
	      			<!-- row start -->
	      			<div class="row">
	      				<div class="col-lg-6">
							<div class="form_group">
								<label>Facebook</label>
								<div class="input_group">
									<input type="text" name="facebook" id="facebook" placeholder="facebook url" value="<?php if(!empty($userDetails)) { echo $userDetails->facebook_url; }?>">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form_group">
								<label>Twitter</label>
								<div class="input_group">
									<input type="text" name="twitter" id="twitter" placeholder="Twitter url" value="<?php if(!empty($userDetails)) { echo $userDetails->twiter_url; } ?>">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form_group">
								<label>Linkedin</label>
								<div class="input_group">
									<input type="text" name="google" id="google" placeholder="Linkedin url" value="<?php if(!empty($userDetails)) { echo $userDetails->google_url;} ?>">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form_group">
								<label>Instagram</label>
								<div class="input_group">
									<input type="text" name="insta" id="insta" placeholder="Instagram url" value="<?php if(!empty($userDetails)) { echo $userDetails->insta_url;} ?>">
								</div>
							</div>
						</div>
	      			</div>
	      			<!-- row End -->
	      			<div class="form_group">
						<label>Address</label>
						<div class="input_group">
							<textarea name="address" placeholder="Enter Your Address" id="address" value="<?php if(!empty($userDetails)) { echo $userDetails->address; }?>"><?php if(!empty($userDetails)) { echo $userDetails->address; }?></textarea>
						</div>
					</div>
	      			<div class="form_group button_group">
	      				<button type="submit" name="editProfile" class="update_button" id="editProfile" >update</button>
					</div>
	      		</form>
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- Edit profile modal End -->
	<!-- Edit Details modal start -->
	<div class="modal fade" id="edit_detail_modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Edit Your Other Details</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="login_form other_detail_form">
	      		<form action="<?php echo site_url('vendor/Vendor/editOtherprofile'); ?>" method="POST" >
					<div class="form_group">
						<label>Personal Details</label>
						<div class="input_group">
							<textarea name="pinfo" value="<?php if(!empty($userDetails)) { echo $userDetails->personal_info;} ?>" placeholder="Enter Personal Details"><?php echo $userDetails->personal_info; ?></textarea>
						</div>
					</div>
					<div class="form_group">
						<label>Business Details</label>
						<div class="input_group">
							<textarea name="binfo" value="<?php if(!empty($userDetails)) { echo $userDetails->bussiness_info; }?>" placeholder="Enter Business Details"><?php echo $userDetails->bussiness_info; ?></textarea>
						</div>
					</div>
					<div class="form_group">
						<label>Other Details</label>
						<div class="input_group">
							<textarea name="oinfo"value="<?php if(!empty($userDetails)) { echo $userDetails->other_info; } ?>" placeholder="Enter Other Details"><?php echo $userDetails->other_info; ?></textarea>
						</div>
					</div>
	      			<div class="form_group button_group">
	      				<button type="submit" name="submit" class="site_button">update</button>
					</div>
	      		</form>
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>
		<!-- Edit profile modal End -->
<div id="myModalphoto" class="modal fade" role="dialog">
  <div class="modal-dialog cover_pic">

    <!-- Modal Cover Picture-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Upload Photo</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
         <form action="<?php echo base_url('vendor/Vendor/upload_image');?>" id="valid-form" class="form-horizontal" method="post" enctype="multipart/form-data">
		   <div class="row">
				<p id="img_success"></p>
				<div class="col-md-12 text-center">
					<div id="upload-demo1" ></div>
					
					<!-- <button data-dismiss="modal" type="button" class="btn btn-pink upload-result1">Save Photo</button> -->
					<div>
						<label class="select_photo_btn">
							<span class="textss">Select Photo</span>
							<input type="file" name="ophoto" id="upload1" required>
							<input type="hidden" name="photo" id="photo">
							<input type="hidden" name="photo1" id="photo1" value="<?php if(isset($userDatas->image)) { echo $userDatas->image;} ?>">
						</label>
						<button type="button" class="site_button upload-result1">Upload Photo</button>
						<button class="upload-result1 site_button" type="submit">Save Photo</button>
					</div>
				</div>
			</div>
		</form>	
      </div>
      <div class="modal-footer">
        <button type="button" class="site_button close_btn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	
 <!-- clear busineess modal -->
    <div class="modal" id="confMod">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header custom_modal">
              <h4 class="modal-title">Confirmation</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body clear_schedule_form">
             <form class="my_common_form text-center">
                <p>Are you sure you are unavaliable for this <span id="date"></span> date ?</p>
                <div class="button_groups">
				<input type="hidden" id="businessids">
                  <button type="button" class="site_button" id="yes">Yes</button>
                  <button type="button" class="site_button" data-dismiss="modal">Cancel</button>
                </div>
             </form>
            </div>
          </div>
        </div>
    </div>
    <!-- clear busineess modal -->
<script src="<?php echo base_url('front'); ?>/js/croppie.js"></script>
<script src="<?php echo base_url('front');?>/assets/js/plugins/jquery_ui/jquery-ui.min.js"></script>

    <!-- Common js-->
	
<script>
$uploadCrop1 = $('#upload-demo1').croppie({
    enableExif: true,
    viewport: {
        width: 300,
        height: 369,
        type: 'square'
    },
    boundary: {
        width: 310,
        height: 379
    }
});

$('#upload1').on('change', function () { 
 var reader = new FileReader();
    reader.onload = function (e) {
     $uploadCrop1.croppie('bind', {
      url: e.target.result
     }).then(function(){
      console.log('jQuery bind complete');
     });
     
    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-result1').on('click', function (ev) {
 $uploadCrop1.croppie('result', {
  type: 'canvas',
  size: 'viewport'
 }).then(function (resp) {
    $("#photo").val(resp);
    $("#showphoto").html("<img class='ephoto'  src="+resp+">");		
 });
});

</script>
<!--unavaliable -->

<script>

var holidays= [<?php echo $dates; ?>];

 $('.calendar_input').datepicker({
	dateFormat: "yy/mm/dd",
	//defaultDate: "+1w",
	minDate:0,
	firstDay: 1,
    beforeShowDay: function (date) {
		
	   
	   for (var i = -1; i < holidays.length; i++) {
			/* if (new Date(holidays[i]).toString() == date.toString()) {
				
				  
			} */
			
			 var string = jQuery.datepicker.formatDate("yy/mm/dd", date);
			 //return [holidays.indexOf(string) == -1];
			 return[holidays.indexOf(string) == -1];
			 $(".ui-state-default").addClass("intro");
		}
	  /*  return[date.getDay()== 0 || date.getDay()== 6? false:true]; */
	 return [true,''];
	   
	},
	
   });
   
 

</script>
 
<script>
$(document).on('change','#calInput', function(){
   var date = $(this).val();
   $('#date').text(date);
   localStorage.setItem('dates',date);
   $('#confMod').modal('show');
});		
 $(document).on('click','#yes', function(){
    var date = localStorage.getItem("dates");
	$.ajax({
		url: "<?php echo site_url();?>vendor/addDate",
		type:'post',
		data:{date: date},
		success: function(response){
			//console.log(response);
			$('#mainbodyc').html(response);
			$('#confMod').modal('hide');
		}
	});
});
</script>
	