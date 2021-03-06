	
	<?php //print_r($allvenRating); ?><!-- Slider Section Start -->
	<div class="section home_slider_section">
		<!-- Slider Start -->
		<div class="home_slider owl-carousel owl-theme">
			<div class="item">
				<div class="slide_item_bg" style="background-image: url(<?php echo base_url('front');?>/assets/images/slider/slide_1.png);">
					<!-- slider caption -->
					<div class="slider_caption_wrap">
						<div class="container">
							<div class="slider_caption">
								<h1 class="heading">Search For Best</h1>
								<div class="subheading">Lorem ipsum + Dolor sit amet  + Consectetur</div>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
							</div>
						</div>
					</div>
					<!-- slider caption -->
				</div>
			</div>
			<div class="item">
				<div class="slide_item_bg" style="background-image: url(<?php echo base_url('front');?>/assets/images/slider/slide_1.png);">
					<!-- slider caption -->
					<div class="slider_caption_wrap">
						<div class="container">
							<div class="slider_caption">
								<h1 class="heading">Search For Best</h1>
								<div class="subheading">Lorem ipsum + Dolor sit amet  + Consectetur</div>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
							</div>
						</div>
					</div>
					<!-- slider caption -->
				</div>
			</div>
			<div class="item">
				<div class="slide_item_bg" style="background-image: url(assets/images/slider/slide_1.png);">
					<!-- slider caption -->
					<div class="slider_caption_wrap">
						<div class="container">
							<div class="slider_caption">
								<h1 class="heading">Search For Best</h1>
								<div class="subheading">Lorem ipsum + Dolor sit amet  + Consectetur</div>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
							</div>
						</div>
					</div>
					<!-- slider caption -->
				</div>
			</div>
		</div>
		<!-- Slider End -->
		<!-- Search bar Start -->
		<div class="slider_search_bar">
			<div class="container">
				<div class="s_search_bar">
					<div class="s_search_bar_form">
						<form>
							<input class="s_input" type="text" name="search" placeholder="Search Your Translator">
							<button type="submit" class="search_btn">Search</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Search bar End -->
	</div>
	<!-- Slider Section End -->
   <!-- Team Section start -->
	<div class="section team_section">
		<div class="container">
			<div class="section_heading">
				<h3><span>TOP</span> translator</h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
			</div>
			<div class="team_carousel owl-carousel owl-theme ">
				<?php if(!empty($allVendor)){ 
						foreach($allVendor as $key => $value) { ?>
				<div class="item">
					<div class="team_fegure">
						<div class="team_img">
							<?php if($value['image']){?>
							<img src="<?php echo base_url('upload');?>/vendor/<?php echo $value['image']; ?>" alt="">
						<?php } else{?>
							<img src="<?php echo base_url('front');?>/assets/images/translator/thumbs.jpg" alt="">
						<?php } ?>
						</div>
						<div class="team_desc">
							<h5><a href="<?php echo base_url(); ?>translator-detail/<?php echo preg_replace('/[^a-zA-Z0-9]/s', '-', $value['first_name']); ?>/<?php echo $value['vendor_id']; ?>" onclick="clickcount(<?php echo  $value['vendor_id']; ?>)"><?php echo $value['first_name']." ".$value['last_name']; ?></a></h5>
							<div class="team_rate">$<?php echo $value['price']; ?></div>
						</div>
					</div>
				</div>
			<?php } }?>
				
			</div>
		</div>
	</div>
   <!-- Team Section End -->
   <!-- Looking Translator Section start -->
	<div class="section looking_section pad_top_bottom_70">
		<div class="container">
			<div class="col-md-8 col-12">
				<div class="looking_text">
					<h5>Looking to hire  translators?</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
					<a href="#" class="site_button looking_button">Learn More</a>
				</div>
			</div>
		</div>
	</div>
    <!-- Looking Translator Section End -->
    <!-- Why Translate Section start -->
	<div class="section why_trans_section bg_gray">
		<div class="container">
			<div class="why_trans_head">
				<h5>Why translate with us?</h5>
			</div>
			<div class="row">
				<div class="col-md-6 col-12">
					<div class="feature_boxs">
						<div class="feature_icons">
							<span class="icons"><i class="fas fa-clock"></i></span>
						</div>
						<div class="feature_txt">
						  <h5>Flexible Schedule</h5>
						  <p>Our global platform is active 24/7 so you can set your own schedule and work whenever you want, from wherever you want.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12">
					<div class="feature_boxs">
						<div class="feature_icons">
							<span class="icons"><i class="fas fa-user-check"></i></span>
						</div>
						<div class="feature_txt">
						  <h5>Pick and Choose</h5>
						  <p>With thousands of projects available each day, you can find and work on translations that interest you.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12">
					<div class="feature_boxs">
						<div class="feature_icons">
							<span class="icons"><i class="fas fa-users"></i></span>
						</div>
						<div class="feature_txt">
						  <h5>Supportive Community</h5>
						  <p>Get feedback from professionals, connect with other language lovers, give advice on translations and share ideas on our forums.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12">
					<div class="feature_boxs">
						<div class="feature_icons">
							<span class="icons"><i class="fas fa-tablet"></i></span>
						</div>
						<div class="feature_txt">
						  <h5>Latest Technology</h5>
						  <p>Our state-of-the-art workbench makes working on a PC, tablet or smartphone fun for both professionals and beginners.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
   <!-- Why Translate Section End -->
   <!-- Language Section start -->
	<div class="section language_section pad_top_bottom_70">
		<div class="container">
			<!-- language heading -->
			<div class="lang_top_head">
				<div class="icons">
					<span class="m_icon_box">
						<span class="text">
							Most <span>37</span>
						</span>
						<span class="icon_box_bg"></span>
					</span>
				</div>
				<div class="headings">
					<h5>We provides professional translation services in more than 37 languages.</h5>
					<p>Some of the most popular ones include:</p>
				</div>
			</div>
			<!-- language heading -->
			<div class="row">
				<div class="col-md-6 col-12 language_border">
					<div class="language_links">
						<ul>
						 <?php if(!empty($alllanguage)){
							     foreach ($alllanguage as $value) { ?>
							<li><a href="#"><?php echo $value['title']; ?> translation</a></li>
						 <?php } }?>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-12">
					<div class="language_links">
						<ul>
							<li><a href="#">Italian translation</a></li>
							<li><a href="#">Dutch translation</a></li>
							<li><a href="#">French translation</a></li>
							<li><a href="#">German translation</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Language Section End -->
    <!-- Rating Section start -->
	<div class="section rating_sections_wrap pad_top_70">
		<div class="container">
			<div class="section_heading">
				<h3><span>BEST</span> RATING</h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
			</div>
			<!-- rating row -->
			<div class="row">
			
				<!-- column start -->
				<?php if(!empty($allvenRating)){ 
						foreach($allvenRating as $key=>$value) { ?>
						
				<div class="col-lg-4 col-md-6 col-12">
					<div class="b_rating_box">
						<div class="thumbs">
							<?php if($value['image']){?>
							<img src="<?php echo base_url('upload');?>/vendor/<?php echo $value['image']; ?>" alt="">
						<?php } else{?>
							<img src="<?php echo base_url('front');?>/assets/images/translator/thumbs.jpg" alt="">
						<?php } ?>
						</div>
						<div class="rating_desc">
							<h5><a href="<?php echo base_url(); ?>translator-detail/<?php echo preg_replace('/[^a-zA-Z0-9]/s', '-', $value['first_name']); ?>/<?php echo $value['vendor_id']; ?>" onclick="clickcount(<?php echo  $value['vendor_id']; ?>)"><?php echo $value['first_name']." ".$value['last_name']; ?></a></h5>
							<div class="rating_strip">
							<?php if($value['avgRate'] == 1){ ?>
								<div class="ratings">
									<i class="fas fa-star"></i>
								    <i class="fas fa-star disable"></i>
									<i class="fas fa-star disable"></i>
									<i class="fas fa-star disable"></i>
									<i class="fas fa-star disable"></i>
								</div>
							<?php } else if($value['avgRate'] == 1.5) {?>
							<div class="ratings">
									<i class="fas fa-star"></i>
								    <i class="fas fa-star-half-alt"></i>
									<i class="fas fa-star disable"></i>
									<i class="fas fa-star disable"></i>
									<i class="fas fa-star disable"></i>
								</div>
							<?php } else if($value['avgRate'] == 2) {?>
							<div class="ratings">
									<i class="fas fa-star"></i>
								    <i class="fas fa-star"></i>
									<i class="fas fa-star disable"></i>
									<i class="fas fa-star disable"></i>
									<i class="fas fa-star disable"></i>
								</div>
							<?php } else if($value['avgRate'] == 2.5) {?>
							<div class="ratings">
									<i class="fas fa-star"></i>
								    <i class="fas fa-star"></i>
									<i class="fas fa-star-half-alt"></i>
									<i class="fas fa-star disable"></i>
									<i class="fas fa-star disable"></i>
								</div>
							<?php } else if($value['avgRate'] == 3) {?>
							<div class="ratings">
									<i class="fas fa-star"></i>
								    <i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star disable"></i>
									<i class="fas fa-star disable"></i>
								</div>
							<?php } else if($value['avgRate'] == 3.5) {?>
							<div class="ratings">
									<i class="fas fa-star"></i>
								    <i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star-half-alt"></i>
									<i class="fas fa-star disable"></i>
								</div>
							
							<?php } else if($value['avgRate'] == 4) {?>
								<div class="ratings">
									<i class="fas fa-star"></i>
								    <i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star disable"></i>
								</div>
							<?php }  else if($value['avgRate'] == 4.5) {?>
							<div class="ratings">
									<i class="fas fa-star"></i>
								    <i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star-half-alt"></i>
								</div>
							<?php } else if($value['avgRate'] == 5) {?>
							    <div class="ratings">
									<i class="fas fa-star"></i>
								    <i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
							<?php } ?>
								<div class="rating_txt"><?php print_r($value['avgRate']); ?></div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- column end -->
					<?php } }?>
			</div>
			<!-- rating row -->
		</div>
	</div>
   <!-- Rating Section End -->
   <!-- Newsletter Section Start -->
    <div class="section newsletter_section_wrap">
	    <div class="container">
			<div class="newsletter_row">
				<div class="row">
			  		<div class="col-lg-6 col-12">
						<div class="newsletter_text">
							<div class="texts1">
								<h5>News letter</h5>
							</div>
							<div class="texts2">
								<p>join us now to get all news and special offers</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="newsletter_form">
							<form>
								<input class="input_white" type="text" name="" placeholder="Type Your Email Here">
								<span class="news_icon"><i class="far fa-envelope"></i></span>
								<button type="submit" class="news_btn">Join Us</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
   <!-- Newsletter Section End -->
<script>
  function clickcount(id)
	{		
		jQuery.ajax({
			url: '<?php echo base_url();?>welcome/Welcome/viewcountservice',
			type: 'post',
			data: {id:id},
			success: function (result)
			{					
			}
		});
   } 
</script>