<?php if(!empty($unavalibaleDates)){
		$dates = $unavalibaleDates;
	}
	else{
		$dates = date("Y/m/d");
	}
?>
 <link href="<?php echo base_url('front');?>/assets/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
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
					<!-- translator detail start -->
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
									
								</div>
							</div>
							<div class="trans_caption_rgt">
								<div class="heading_dv">
									<div class="lft">
										<h5><?php if(!empty($userDatas)){ echo $userDatas->first_name." ".$userDatas->last_name; } ?></h5>
	                                </div>
								</div>
								<!-- occupation form -->
								  <div class="occupation_form">
									<form id="addmultioccupform"> 
										
										<div class="occup_form_row">
											<div class="form_group">
												<label>Occupation</label>
												<div class="input_group select_box">
													<select class="selectpicker" name="ocupation[]">
														<option value="">Select occupation</option>
														<?php  
														 if(!empty($allOccuption)){
																 foreach ($allOccuption as $value) {
															?>
															<option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
								
														  <?php } } ?>
													</select>
												</div>
											</div>
											<div class="form_group">
												<label>Experience</label>
												<div class="input_group select_box">
													<input type="text" name="exp[]" placeholder="Experience" required />
												</div>
											</div>
											<div class="form_group">
												<label>Specialization</label>
												<div class="input_group select_box">
													<input type="text" name="spez[]" placeholder="Specialization" required />
												</div>
											</div>
										</div>
										<div class="add_more_form">
										
										</div>
										<div class="add_button_group">
											<button type="button" class="site_button add_more_btn"><i class="fas fa-plus"></i>add more occupation</button>
											<button type="submit" class="site_button form_submit" id="addmultioccup">Submit</button>
										</div>
									</form>
								  </div>
								  <!-- occupation form -->
							</div>
						</div>
					</div>
					<!-- translator detail end -->
					<!-- translator Calendar div -->
					<div class="calendar_tabs_dv">
						<?php if(!empty($userOccup)){ $lg =array();  
						foreach($userOccup as $vallang) {  ?>

						<a class="tabs_link" href="<?php echo site_url();?>vendor/calendar_views/<?php echo $vallang['title'];  ?>/<?php echo $vallang['id'];  ?>"><?php echo $vallang['title']."   Calendar           ".'</br>';?></a>
						<?php  
						}}?>
					</div>
					<!-- translator Calendar div -->
				</div>
			</div>
		</div>
	</div>
<!-- Booking calendar start
	<div class="section booking_cal_section">
		<div class="container">
			<div class="booking_head_dv text-center">
				<h5>Booking Calendar</h5>
			</div>
			
			
			 <div class="row">
				<div class="col-md-12 col-sm-12">
					 <div class="card-box">
						 <div class="card-body ">
							<div class="panel-body">
									<div id="calendar" class="has-toolbar new"> </div>
								</div>
						 </div>
					 </div>
				 </div>
			</div>
					
		</div>
	</div>
	<!-- Booking calendar End -->

	

<script src="<?php echo base_url('front'); ?>/js/croppie.js"></script>
<script src="<?php echo base_url('front');?>/assets/js/plugins/jquery_ui/jquery-ui.min.js"></script>

    <!-- calendar -->
    <script src="<?php echo base_url('front'); ?>/js/moment/moment.min.js" ></script>
    <script src="<?php echo base_url('front'); ?>/js/fullcalendar/fullcalendar.min.js" ></script>
    
<script>
   //add dymanic field on click
	var o = 0;
	$('.add_more_btn').on('click', function(){
		o++;
		var html = '<div class="occup_form_row" id="oc_row'+o+'">\
			<div class="form_group">\
				<label>Occupation</label>\
				<div class="input_group select_box">\
				<select class="selectpicker" name="ocupation[]">\
					<option value="">Select occupation</option>\
					<?php if(!empty($allOccuption)){foreach ($allOccuption as $value) { ?>\
					<option value="<?php  echo $value['id']; ?>"><?php  echo $value['title']; ?></option>\
					<?php } } ?>\
				</select>\
				</div>\
			</div>\
			<div class="form_group">\
				<label>Experience</label>\
				<div class="input_group">\
				  <input type="text" name="exp[]" placeholder="Experience" required/>\
				</div>\
			</div>\
			<div class="form_group">\
				<label>specialization</label>\
				<div class="input_group">\
				  <input type="text" name="spez[]" placeholder="specialization" required/>\
				   <button type="button" value="Remove" class="remove_btn" id="btn'+o+'"><i class="fas fa-times"></i></button>\
				</div>\
			</div>\
		</div>';
		$('.add_more_form').append(html);
		$('.selectpicker').selectpicker();
	});
	//remove field
	$(document).on('click', '.remove_btn', function(){
		//var button_id = $(this).attr("id");
		var remove_prnt = $(this).parents(".occup_form_row");
		$(remove_prnt).remove();
	});
	

</script>
    <!-- Common js-->

 
<script>


//add multiple staff button
	$(document).on('click','#addmultioccup', function(){
		
	      $.ajax({
			url: "<?php echo site_url();?>vendor/addmultioccup",
			type:'post',
			data:$('#addmultioccupform').serialize(),//{date: date,start_time: start_time,end_time: end_time,business_idd: business_idd,staff_id: staff_id},
			success: function(response){
				//alert(response);
				
				//$('#multiple_staff_modal').modal('hide');
				//$('#addstaffmod').modal('hide');
				//$("#moddiv").html(response);
				//$('#message').show();
				//$('#message .msg').html("Staffs Added Successfully");
				//$('#email_preview_modal').modal('show');
				
			}
		}); 
    });
</script>
<!-- Calendar modal-->		
<div class="calendar_popup">
	<div class="modal_dialog">
		<div class="modal-content">
			<div class="modal_header">
				<span class="close_modal">&times;</span>
			</div>
			<div>Add unavalible time on <span class="showdate"></span></div>
			
			<div class="login_form calendar_form">
				<form>
					<div class="form_group">
						<label>Start time</label>
						<div class="input_group">
							<input type="text" name=""  >
							<input type="hidden" name="" id="showdate" >
						</div>
					</div>
					<div class="form_group">
						<label>End time</label>
						<div class="input_group">
							<input type="text" name=""/>
						</div>
					</div>
					<!--<div class="form_group">
						<label>Comment</label>
						<div class="input_group">
							<textarea placeholder="Add Comment"></textarea>
						</div>
					</div>-->
					<div class="button_group">
						<button type="submit" class="site_button cal_submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Calendar modal-->	