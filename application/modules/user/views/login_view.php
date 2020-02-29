<!-- Login page start -->
   <div class="section login_page_wraper pad_top_bottom_40">
   		<div class="container">
			<div class="login_s_modal">
				<div class="login_s_heading">
					<h4>Login To Account</h4>
				</div>
				<div class="l_form_body">
					<div class="login_form">
						<div class="l_form_heading">
							<h5>Login</h5>
							<p>if you have No account with us, please <a href="<?php echo base_url('signup');?>">Register</a></p>
						</div>
						<form id="loginform" method="post" action="<?php echo site_url('user/login_check');?>">
							<div class="form_group">
								<label>Email*</label>
								<div class="input_group">
									<input type="email" name="email" placeholder="Enter Your Email id">
								</div>
							</div>
							<div class="form_group">
								<label>Password*</label>
								<div class="input_group">
									<input type="password" name="password"  placeholder="Enter Your Password">
								</div>
							</div>
							<div class="form_group button_group">
								<input class="submit_btn" type="submit" name="login" value="Login">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
   </div>
   <!-- Login page End -->