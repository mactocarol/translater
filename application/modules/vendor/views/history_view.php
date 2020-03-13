
 <link rel="stylesheet" href="<?php echo base_url('front');?>/assets/css/croppie.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
 
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
								<img src="<?php echo base_url('upload/vendor');?>/<?php if(!empty($userImage)){ echo $userImage->image; }?>" alt="" class="img-fluid" id="profile_img">
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
										    <th>Booked By</th>
										    <th>Language</th>
										    <th>City</th>
											<th>Date</th>
											<th>Time</th>
											<th>Hours</th>
											<th>Booking time</th>
										  </tr>
										</thead>
										<tbody>
										<?php 
										foreach($userDatas as $data){
											
										?>
										  <tr>
										    <td><?php print_r(get_user_name($data['user_id'])); ?></td>
											<td><?php echo $data['occupation']; ?></td>
											<td><?php echo $data['city']; ?></td>
											<td><?php echo $data['start']; ?></td>
											<td><?php echo $data['start_time']; ?></td>
											<td><?php echo $data['hours']; ?></td>
											<td><?php echo $data['created_at']; ?></td>
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

<script src="<?php echo base_url('front'); ?>/js/croppie.js"></script>
<script src="<?php echo base_url('front');?>/assets/js/plugins/jquery_ui/jquery-ui.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
       
    });
} );
</script>
 