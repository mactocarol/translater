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
			<div class="login_s_modal">
				<div class="login_s_heading">
					<h4>Create New Account</h4>
				</div>
				<div class="l_form_body">
					<div class="login_form">
						<div class="l_form_heading">
							<h5>Register</h5>
							<p>if you have new account with us, please <a href="<?php echo base_url('signin');?>">Login</a></p>
						</div>
						<form id="registerformuser"  method="post" action="<?php echo base_url('signup');?>" >
						<div class="col-md-12">
							<div class="form_group">
								<label>First Name*</label>
								<div class="input_group">
									<input type="text" name="f_name" id="f_name" placeholder="Enter Your First Name">
								</div>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form_group">
								<label>Last Name*</label>
								<div class="input_group">
									<input type="text" name="l_name" id="l_name" placeholder="Enter Your Last Name">
								</div>
							</div>
						</div>	
						
						<div class="col-md-12">
							<div class="form_group">
								<label>Select Gender**</label>
								<div class="input_group">
									<div class="gender_radio radio_box">
												<label>
													<input type="radio" name="genderu" value="Male">
													<span class="r_check"></span>
													<span class="r_text">Male</span>
												</label>
												<label>
													<input type="radio" name="genderu" value="Female">
													<span class="r_check"></span>
													<span class="r_text">Female</span>
												</label>
											</div>
								</div>
							</div>
						</div>	
						
						<div class="col-md-12">
							<div class="form_group">
								<label>Email*</label>
								<div class="input_group">
									<input type="text"  id="email" name="email" placeholder="Enter Your Email id">
								</div>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form_group">
								<label>Password*</label>
								<div class="input_group">
									<input type="password" name="password" id="password" placeholder="Enter Your Password">
								</div>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form_group">
								<label>Confirm Password*</label>
								<div class="input_group">
									<input type="password" id="confirm_password" name="confirm_password" placeholder="Enter Your Confirm Password">
								</div>
							</div>
						</div>	
							
							<div class="form_group button_group">
								<button class="submit_btn" type="submit">Create Account</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
   </div>  