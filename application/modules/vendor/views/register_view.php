	
        
	<!-- Register page start -->
   <div class="section signup_page_wraper pad_top_bottom_40">
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
			<div class="login_s_modal vendor_reg_modal">
				<div class="login_s_heading">
					<h4>Become Translater</h4>
				</div>
				<div class="l_form_body">
					<div class="login_form">
						<div class="l_form_heading">
							<h5>Vendor Register</h5>
							<p>if you have new account with us, please <a href="<?php echo base_url('signin');?>">Login</a></p>
						</div>
					
						<form id="vendorregisterform" method="POST"  action="<?php echo site_url('vendor-signup'); ?>">
							<div class="row">
								<div class="col-md-6 col-12">
									<div class="form_group">
										<label>First Name*</label>
										<div class="input_group">
											<input type="text" name="fname" id="fname" placeholder="Enter Your First Name">
										</div>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="form_group">
										<label>Last Name*</label>
										<div class="input_group">
											<input type="text" name="lname" id="lname" placeholder="Enter Your Last Name">
										</div>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="form_group">
										<label>Email*</label>
										<div class="input_group">
											<input type="email" name="email" id="email" placeholder="Enter Your Email id">
										</div>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="form_group">
										<label>Select Gender*</label>
										<div class="input_group">
											<div class="gender_radio radio_box">
												<label>
													<input type="radio" name="gender" value="Male" checked>
													<span class="r_check"></span>
													<span class="r_text">Male</span>
												</label>
												<label>
													<input type="radio" name="gender" value="Female">
													<span class="r_check"></span>
													<span class="r_text">female</span>
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-12">
									<div class="form_group">
										<label>Password*</label>
										<div class="input_group">
											<input type="password" name="password" id="password" placeholder="Confirm Password">
										</div>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="form_group">
										<label>Confirm Password**</label>
										<div class="input_group">
											<input type="password" name="confirm_password" id="confirm_password" placeholder="Enter Your Password">
										</div>
									</div>
								</div>
								<div class="col-md-12 col-12">
								<div class="form_group">
									<label>Price *</label>
									<div class="input_group">
										<input type="text" name="price" id="price" placeholder="Price Per Hour" oninput="this.value=this.value.replace(/[^0-9]/g,'');" >
									</div>
								</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="form_group">
										<label>Language *</label>
										<div class="input_group select_box">
											<select class="selectpicker" multiple="" name="lang[]" id="lang">
											<option value="" disabled>Select Language</option>
											 <?php 
												 if(!empty($alllanguage)){
													 foreach ($alllanguage as $key => $value) {
												?>
											  <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
											  <?php } } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="form_group">
										<label>City *</label>
										<div class="input_group select_box">
											<select class="selectpicker" multiple="" name="city[]" id="city">
												<option value="" disabled>Select City</option>
												 <?php 
												 if(!empty($allcity)){
													 foreach ($allcity as $key => $value) {
												?>
											  <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
											  <?php } } ?>
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<div class="form_group button_group">
							    <button class="submit_btn" type="submit">Sign Up</button>
                                <!--<input class="submit_btn" type="submit" name="login" value="Create Account">-->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
   </div>
