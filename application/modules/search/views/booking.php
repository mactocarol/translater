<!-- page banner start -->
	<div class="page_banner_section">
		<div class="container">
			<div class="page_banner_caption">
				<h2>Booking Detail</h2>				
				<div class="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Booking</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- page banner End -->
	<!-- Login page start -->
   <div class="section contact_page bg_gray pad_top_bottom_40">
   <?php
        // display error & success messages
        if(isset($message)) {					
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
			  <?php if(isset($booked)) { if($booked==""){?>
   				<div class="col-lg-6 col-12 offset-lg-3">
   					<div class="booking_fetch_data">
						<div class="booking_fetch_dtl">
							<div class="l_form_heading">
								<h5>Booking Detail</h5>								
							</div>
							<form method="post" action="<?php echo base_url('booked'); ?>">
								<div class="form_group">
									<label>Vendor Name*</label>
									<div class="input_group">
										<p><?php if(isset($userdetail[0]['first_name'])){ echo $userdetail[0]['first_name'];}  if(isset($userdetail[0]['last_name'])){ echo ' '.$userdetail[0]['last_name']; }?></p>
										<input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>">
									</div>
								</div>
								<div class="form_group">
									<label>Booking Date*</label>
									<div class="input_group">
										<p><?php echo $booking_date; ?></p>
										<input type="hidden" name="booking_date" value="<?php echo $booking_date; ?>">
									</div>
								</div>
								<div class="form_group">
									<label>Booking Time*</label>
									<div class="input_group">
										<p><?php echo $booking_time; ?></p>
										<input type="hidden" name="booking_time" value="<?php echo $booking_time; ?>">
									</div>
								</div>
								<div class="form_group">
									<label>Booking Hour*</label>
									<div class="input_group">
										<p><?php echo $booking_hour; ?></p>
										<input type="hidden" name="booking_hour" value="<?php echo $booking_hour; ?>">
									</div>
								</div>
								
								<div class="form_group">
									<label>Booking Price*</label>
									<div class="input_group">
										<p>$<?php echo $booking_price; ?></p>
										<input type="hidden" name="booking_price" value="<?php echo $booking_price; ?>">
									</div>
								</div> 
								
								<div class="form_group">
									<label>Booking Language*</label>
									<div class="input_group">
										<p><?php echo $booking_lang; ?></p>
										<input type="hidden" name="booking_lang" value="<?php echo $booking_lang; ?>">
									</div>
								</div>
								<div class="form_group">
									<label>Booking City*</label>
									<div class="input_group">
										<p><?php echo $booking_city; ?></p>
										<input type="hidden" name="booking_city" value="<?php echo $booking_city; ?>">
									</div>
								</div>
								<div class="form_group">
									<label>Booking payment*</label>
									<div class="input_group">
										<p>By Cash</p>
									</div>
								</div>
								<div class="form_group button_group">
								    <a href="<?php echo base_url('translator'); ?>" class="submit_btn site_button">Cancel</a>
									<input class="submit_btn site_button" type="submit" name="login" value="Book Now">
								</div>
							</form>
						</div>
					</div>
   				</div>
			  <?php  } } if(isset($booked)) { if($booked=="booked") { ?>
				<div class="col-lg-6 col-12 offset-lg-3">
   					<div class="booking_fetch_data">
						<div class="success_booking_dv">
							<div>
								<span class="success_img">
							     <i class="fas fa-check"></i>
								</span>
							</div>
							<div class="l_form_heading">
								<h5>Thank You For Booking</h5>	
                                 <p>Booked Successfully!</p>								
							</div>							
						</div>
					</div>
   				</div>
			  <?php } }?>
   			</div>
			

		</div>
   </div>
 <!-- Login page End -->