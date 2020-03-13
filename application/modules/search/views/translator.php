<!-- page banner start -->
	<div class="page_banner_section">
		<div class="container">
			<div class="page_banner_caption">
				<h2>Search Translator</h2>
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
	<!-- page banner start -->
	<div class="section translator_search_page pad_top_40">
		<div class="container">
			<div class="row">
				<!-- sidebar start -->
				<div class="col-lg-4 col-12">
					<div class="transl_sidebar_wrap">
						<div>
						   <span class="sidebar_toggle"><i class="fas fa-sliders-h"></i> Filter</span>
						</div>
						<div class="transl_sidebar">
							<!-- search bar start -->
							<div class="tran_widgets">
								<div class="search_bar_input">
									<form>
									  <input type="text" name="keyword" id="keyword"  placeholder="Search">
									  <!--<button type="submit" class="search_btn">
									  	<i class="fas fa-search"></i>
									  </button>-->
									</form>
								</div>
							</div>
							<!-- search widget End -->
							<!-- Language widget start 
							<div class="tran_widgets">
								<h5 class="titles">Select Language</h5>
								<div class="widget_body">
									<div class="input_group select_box">
                                        <input type="hidden" name="lng" id="lng">									
										<select class="selectpicker" name="language" id="language"  multiple="">
											<option value="" disabled>Select Language</option>
											<?php 
											if(isset($language)){
											foreach($language as $lng) { ?>
											<option value="<?php echo $lng['id']; ?>"><?php echo $lng['title']; ?></option>
											<?php } } ?>
											
										</select>
									</div>
								</div>
							</div>-->
							<!-- Language widget End -->
							<!-- city widget start -->
							<div class="tran_widgets">
								<h5 class="titles">Select City</h5>
								<div class="widget_body">
									<div class="input_group select_box">
									 <input type="hidden" name="ctyy" id="ctyy">	
										<select class="selectpicker" name="city" id="city" multiple="">
											<option value="" disabled>Select City</option>
											<?php 
											if(isset($city)){
											foreach($city as $cty) { ?>
											<option value="<?php echo $cty['id']; ?>"><?php echo $cty['title']; ?></option>
											<?php } } ?>
										</select>
									</div>
								</div>
							</div>
							<!-- city widget End -->
							<!-- Price widget start -->
							<div class="tran_widgets">
								<h5 class="titles">Price Range</h5>
								<div class="range_wrap">
								   <div class="price_range"></div>
								   <div class="price_txt">Price: 
								   <input type="text" id="p_amount" readonly>
								   </div>
								</div>
							</div>
							<!-- Price widget End -->
							<!-- Rating widget start -->
							<div class="tran_widgets">
								<h5 class="titles">Rating</h5>
								<div class="radio_box">
									<label>
										<input type="radio" name="Rating" value="1">
										<span class="r_check"></span>
										<span class="r_text">1 star <span class="r_count">15</span></span>
									</label>
									<label>
										<input type="radio" name="Rating" value="2">
										<span class="r_check"></span>
										<span class="r_text">2 star <span class="r_count">10</span></span>
									</label>
									<label>
										<input type="radio" name="Rating" value="3">
										<span class="r_check"></span>
										<span class="r_text">3 star <span class="r_count">20</span></span>
									</label>
									<label>
										<input type="radio" name="Rating" value="4">
										<span class="r_check"></span>
										<span class="r_text">4 star <span class="r_count">25</span></span>
									</label>
									<label>
										<input type="radio" name="Rating" value="5">
										<span class="r_check"></span>
										<span class="r_text">5 star <span class="r_count">25</span></span>
									</label>
								</div>
								<div class="flt_btn_dv">
								<button type="button" class="site_button p_filter_btn" onclick="filter_data('no')">Filter</button></div>
							</div>
							<!-- Rating widget End -->
						</div>
					</div>
				</div>
				<!-- sidebar End -->
				<div class="col-lg-8 col-12">
					<div class="translate_search_wrap">
						<h4 class="trans_s_heading">Translator</h4>
						<!-- filter bar start -->
						<div class="trans_filter_bar">
							<div class="rslt_count">
								<?php echo $total_rows; ?> Result found
							</div>
							<div class="rslt_sort">
								<label>Sort</label>
								<select id="sort_by" name="sort_by">
									<option value="" disabled>Sort By</option>
									<option value="rating_asc">Rating Ascending</option>
									<option value="rating_desc">Rating Descending </option>
									<option value="price_asc">Price Ascending</option>
									<option value="price_desc">Price Descending</option>									
								</select>
							</div>
						</div>
						<!-- filter bar End -->
						<!-- Translator row start -->
						<div class="row filter_data" id="filter_data">
                           <?php if(isset($vendorslist)) { foreach($vendorslist as $list){ ?>						
							<div class="col-xl-4 col-md-6 col-6 trans_col">
								<div class="trans_fegure">
									<div class="trans_img">
									    <?php if($list['image']==""){ ?>
										<img src="<?php echo base_url('front');?>/assets/images/translator/thumbs.jpg">
										<?php } else {  ?>
                                        <img src="<?php echo base_url('upload');?>/vendor/<?php echo $list['image']; ?>">
										<?php  } ?>
									</div>
									<div class="fig_captions">
										<h5><a href="<?php echo base_url(); ?>translator-detail/<?php echo preg_replace('/[^a-zA-Z0-9]/s', '-', $list['first_name']); ?>/<?php echo $list['id']; ?>" onclick="clickcount(<?php echo  $list['id']; ?>)"><?php echo $list['first_name']; ?></a></h5>
										<div class="lang_div">Language - <?php  $lg =array(); foreach(get_lang($list['id']) as $lng){  $lg[]= $lng->title; } echo $lg = implode(", ",$lg); ?></div>
										<div class="city_div">City - <?php  $ct =array(); foreach(get_city($list['id']) as $cty){  $ct[]= $cty->title; } echo $cty = implode(", ",$ct); ?></div>
										
										<div class="rating_dv">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star disable_str"></i>
										</div>
										<div class="team_rate">$<?php echo $list['price']; ?></div>
									</div>
								</div>
							</div>
						   <?php }}  ?>
							
						</div>
						
						<!-- Translator row End -->
						<!-- pagination start -->
						<!-- <div class="tr_pagination">
							<ul class="pagination">
								<li><span class="prev"><i class="fas fa-caret-left"></i>
								</span></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><span class="Next"><i class="fas fa-caret-right"></i></span></li>
							</ul>
						</div> -->
						<!-- pagination End -->
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- page banner End -->
<script src="<?php echo base_url('front');?>/assets/js/plugins/jquery_ui/jquery-ui.min.js"></script>
<script>
function filter_data(url)
 {
 if(url=="no"){
 var urll = "<?php echo base_url(); ?>search/Search/vendorlist/0";		
 }
 else {	
 var urll = url; 
 }

 $('.filter_data').html('<div id="loading" style="" ></div>');	 
 //alert(page);
 var lng = [];
    $("#language :selected").each(function() {
         lng.push($(this).val());
    });
	
	var cty = [];
    $("#city :selected").each(function() {
       cty.push($(this).val());
    });
	
	var keyword = $('#keyword').val();
	
	$('#lng').val(lng);
	var lng = $('#lng').val();
	
	$('#ctyy').val(cty);
	var ctyy = $('#ctyy').val();
		
	var price = $('#p_amount').val();
	
	var rating = $("input[name='Rating']:checked").val();
	
	var sortby = $('#sort_by').val();
	//alert(sortby);
	
	$.ajax({
            url:urll,
            method:"POST",
            //dataType:"JSON",
            data:{keyword:keyword, lng:lng, ctyy:ctyy, price:price,rating:rating,sortby},
            success:function(data1)
            {
				//alert('neha');
				//alert(data1);
				document.getElementById('filter_data').innerHTML=data1;
                //$('.filter_data').html(data.vendorslist);
                //$('#pagination_link').html(data.pagination_link);
            }
        }) 
	
 }
 filter_data('<?php echo base_url(); ?>search/Search/vendorlist/0');
 
function clickcount(id)
		{			
			jQuery.ajax({
				url: '<?php echo base_url();?>search/Search/viewcountservice',
				type: 'post',
				data: {id:id},
			    success: function (result)
				{					
				}
			});
      } 
</script>
