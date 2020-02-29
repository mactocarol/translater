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
										<h5><a href="<?php echo base_url(); ?>translator-detail/<?php echo preg_replace('/[^a-zA-Z0-9]/s', '-', $list['first_name']); ?>/<?php echo $list['id']; ?>"><?php echo $list['first_name']; ?></a></h5>
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
						   <div class="tr_pagination pagination_dv col-sm-12 col-12">
	<?php print_r($links); ?>
</div>