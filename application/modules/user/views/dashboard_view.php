 <link rel="stylesheet" href="<?php echo base_url('front');?>/assets/css/croppie.css">
	<!-- page banner start -->
	<div class="page_banner_section">
		<div class="container">
			<div class="page_banner_caption">
				<h2>Translator dashboard</h2>
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
				<div class="col-lg-12 col-12">
					<div class="trans_detail_bg">
						<div class="back_search_head">
							<!--<a href="translator.html"><i class="fas fa-long-arrow-alt-left"></i> Back to search page</a>-->
						</div>
						<div class="trans_detail_figure">
							<div class="trans_thumb_lft">
								<div class="trans_thumb" id="showphoto">
								<?php if($result->image) { ?>
									<img src="<?php echo base_url('upload/user');?>/<?php if(isset($result->image)) { echo $result->image;} ?>" alt="" class="img-fluid" id="profile_img">
									<div  class="col-md-3" id="showphoto" class="img-fluid">
							        </div>
									<?php } else{?>
									<img src="<?php echo base_url('front');?>/assets/images/translator/thumbs.jpg" alt="" class="img-fluid" id="profile_img">
								<?php } ?>
									<label class="img_upload_icon">
									<a href="#"  data-toggle="modal" data-target="#myModalphoto" class="btn btn-pink"><i class="far fa-image"></i></a>
										<!-- <input type="file" name="upload" onchange="document.getElementById('profile_img').src = window.URL.createObjectURL(this.files[0])">
										<i class="far fa-image"></i> -->
									</label>
								</div>
							</div>
							<div class="trans_caption_rgt">
								<div class="heading_dv">
									<div class="lft">
										<h5><?php if(isset($result->first_name)) { echo $result->first_name; }   if(isset($result->first_name)) { echo ' '.$result->last_name;} ?></h5>
									
									</div>
									<div class="right_dv">
										<a href="#" class="edit_trans site_button" data-toggle="modal" data-target="#edit_profile_modal">Edit Profile</a> 
										<!--<a href="#" class="hire_btn site_button">Hire now</a>-->
									</div>
								</div>
								
								<div class="table-responsive">
								  <table class="table prof_detail_lst">
									<tr>
										<td class="frst_spn">Gender</td>
										<td class="scnd_spn"><?php if(isset($result->gender)) { echo $result->gender;} ?></td>
									</tr>
								
									<tr>
										<td class="frst_spn">Email</td>
										<td class="scnd_spn"><?php if(isset($result->email)) { echo $result->email; } ?></td>
									</tr>
								
									
								  </table>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    
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
	      		<form method="post" action="<?php echo base_url('user/User/profile');?>">
					<!-- row start -->
	      			<div class="row">
	      				<div class="col-lg-6">
							<div class="form_group">
								<label>First Name</label>
								<div class="input_group">
									<input type="text" name="f_name" value="<?php if(isset($result->first_name)){ echo $result->first_name; } ?>" placeholder="Enter Your Name" required>
								</div>
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="form_group">
								<label>Last Name</label>
								<div class="input_group">
									<input type="text" name="l_name" value="<?php if(isset($result->last_name)){  echo $result->last_name; } ?>" placeholder="Enter Your Name" required>
								</div>
							</div>
						</div>
						
	      				<div class="col-lg-6">
	      					<div class="form_group">
								<label>Email</label>
								<div class="input_group">
									<input type="email" name="email" value="<?php if(isset($result->email)) { echo $result->email;} ?>" placeholder="Enter Your Email" readonly>
								</div>
							</div>
	      				</div>
	      			
	      			</div>
	      			
	      			
	      			<div class="form_group button_group">
	      				<button type="submit" name="submit" class="update_button">update</button>
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
         <form action="<?php echo base_url('user/User/upload_image');?>" id="valid-form" class="form-horizontal" method="post" enctype="multipart/form-data">
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
<script src="<?php echo base_url('front'); ?>/js/croppie.js"></script>
<script type="text/javascript">
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
				
	