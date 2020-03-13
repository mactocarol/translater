
 <link rel="stylesheet" href="<?php echo base_url('front');?>/assets/css/croppie.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
 <style>


* {
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  box-sizing:border-box;
}

*:before, *:after {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

.clearfix {
  clear:both;
}

.text-center {text-align:center;}

a {
  color: tomato;
  text-decoration: none;
}

a:hover {
  color: #2196f3;
}

pre {
display: block;
padding: 9.5px;
margin: 0 0 10px;
font-size: 13px;
line-height: 1.42857143;
color: #333;
word-break: break-all;
word-wrap: break-word;
background-color: #F5F5F5;
border: 1px solid #CCC;
border-radius: 4px;
}

.header {
  padding:20px 0;
  position:relative;
  margin-bottom:10px;
  
}

.header:after {
  content:"";
  display:block;
  height:1px;
  background:#eee;
  position:absolute; 
  left:30%; right:30%;
}

.header h2 {
  font-size:3em;
  font-weight:300;
  margin-bottom:0.2em;
}

.header p {
  font-size:14px;
}



#a-footer {
  margin: 20px 0;
}

.new-react-version {
  padding: 20px 20px;
  border: 1px solid #eee;
  border-radius: 20px;
  box-shadow: 0 2px 12px 0 rgba(0,0,0,0.1);
  
  text-align: center;
  font-size: 14px;
  line-height: 1.7;
}

.new-react-version .react-svg-logo {
  text-align: center;
  max-width: 60px;
  margin: 20px auto;
  margin-top: 0;
}





.success-box {
  margin:50px 0;
  padding:10px 10px;
  border:1px solid #eee;
  background:#f9f9f9;
}

.success-box img {
  margin-right:10px;
  display:inline-block;
  vertical-align:top;
}

.success-box > div {
  vertical-align:top;
  display:inline-block;
  color:#888;
}



/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}
.rating-stars label {
    color: #000;
}
/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:24px; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}
</style>
	<!-- page banner start -->
	<div class="page_banner_section">
		<div class="container">
			<div class="page_banner_caption">
				<h2>Translator history</h2>
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
								<?php if($userImage->image) { ?>
								<img src="<?php echo base_url('upload/user');?>/<?php if(!empty($userImage)){ echo $userImage->image; }?>" alt="" class="img-fluid" id="profile_img">
								<div  class="col-md-3" id="showphoto" class="img-fluid">
							        </div>		
								<?php } else{?>
									<img src="<?php echo base_url('front');?>/assets/images/translator/thumbs.jpg" alt="" class="img-fluid" id="profile_img">
								<?php } ?>
									
								</div>
							</div>
							<div class="trans_caption_rgt">
								<div class="history_table table-responsive">
									 <table class="table" id="example">
										<thead>
										  <tr>
										    <th>Translator name</th>
										    <th>Language</th>
										    <th>City</th>
											<th>Date</th>
											<th>Time</th>
											<th>Hours</th>
											<th>Booking time</th>
											<th>Review</th>
										  </tr>
										</thead>
										<tbody>
										<?php 
										foreach($userDatas as $data){
											
										?>
										  <tr>
										    <td><?php echo $data['first_name']." ".$data['last_name']; ?></td>
											<td><?php echo $data['occupation']; ?></td>
											<td><?php echo $data['city']; ?></td>
											<td><?php echo $data['start']; ?></td>
											<td><?php echo $data['start_time']; ?></td>
											<td><?php echo $data['hours']; ?></td>
											<td><?php echo $data['created_at']; ?></td>
											<td>
											<?php if($data['review_status'] == 1){ ?>
												 <span>Review given</span>
											<?php }else{ ?>
										    <a href="#" data-vendorId =<?php echo $data['vendor_id']; ?>  data-id =<?php echo $data['id']; ?> class="site_button edit_dtl_btn" data-toggle="modal" data-target="#confMod">
											 Give review</a>
											<?php } ?>
									       </td>
										  </tr>
										  <?php }	?>
										</tbody>
									  </table>
								  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 <!-- review modal -->
    <div class="modal" id="confMod">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header custom_modal">
              <h4 class="modal-title">Review and Rate translator</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
			<div class="login_form other_detail_form">
			<form action="<?php echo site_url('user/User/rating'); ?>" class="my_common_form" method="POST" >
				<div class='rating-widget'>
				  <!-- Rating Stars Box -->
				  <div class='rating-stars text-center'>
				   <label>Rate</label>
					<ul id='stars'>
					  <li class='star selected' title='Poor' data-value='1'>
						<i class='fa fa-star fa-fw'></i>
					  </li>
					  <li class='star' title='Fair' data-value='2'>
						<i class='fa fa-star fa-fw'></i>
					  </li>
					  <li class='star' title='Good' data-value='3'>
						<i class='fa fa-star fa-fw'></i>
					  </li>
					  <li class='star' title='Excellent' data-value='4'>
						<i class='fa fa-star fa-fw'></i>
					  </li>
					  <li class='star' title='WOW!!!' data-value='5'>
						<i class='fa fa-star fa-fw'></i>
					  </li>
					</ul>
				  </div>
				  <input type="hidden" name="rating" id="rate" value="1">
				</div>
				<div class="form_group">
					<label>Review</label>
					<div class="input_group">
						<textarea name="review" placeholder="Enter Personal Details"></textarea>
						<input type="hidden" id="vid" name="vendor_id">
						<input type="hidden" id="oid" name="order_id">
					</div>
				</div>
				
			<div class="button_groups">
				<input type="hidden" id="businessids">
			  <button type="submit" class="site_button" id="addReview">Add</button>
			  <button type="button" class="site_button" data-dismiss="modal">Cancel</button>
			</div>
		</form>
	</div>
	</div>
  </div>
</div>
    </div>
	

    <!-- review modal -->
<script src="<?php echo base_url('front'); ?>/js/croppie.js"></script>
<script src="<?php echo base_url('front');?>/assets/js/plugins/jquery_ui/jquery-ui.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />







<script>
$(document).ready(function() {
    $('#example').DataTable( {
       
    });
});
  $(document).on('click','.edit_dtl_btn', function(e){
		var id = $(this).data('vendorid');
		$("#vid").val(id);
		var id = $(this).data('id');
		$("#oid").val(id);
  });
  
  
$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = ratingValue;
    }
    else {
        msg = ratingValue;
    }
    responseMessage(msg);
    
  });
  
  
});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('#rate').val(msg);
}
</script>

