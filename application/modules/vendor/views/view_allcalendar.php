<link href="<?php echo base_url('front');?>/assets/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="<?php echo base_url('front');?>/assets/css/croppie.css">
	<!-- page banner start -->
	<div class="page_banner_section">
		<div class="container">
			<div class="page_banner_caption">
				<h2>Translator dashboard</h2>
				<div class="breadcrumbs">
					<ul>
						<li><a href="<?php echo base_url();?>">Home</a></li>
						<li>Translator</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

<?php if(!empty($userOccup)){ $lg =array();  
	foreach($userOccup as $vallang) {  ?>
	
	<a href="<?php echo site_url();?>vendor/calendar_views/<?php echo $vallang['id'];  ?>"><?php echo $vallang['title']."   Calendar           ".'</br>';?></a>
<?php  
 }}?>
<!-- Booking calendar start -->
	<div class="section booking_cal_section">
		<div class="container">
			<div class="booking_head_dv text-center">
				<h5><?php echo $this->uri->segment(3); ?> Calendar</h5>
			</div>
			<!--<div class="booking_cal_bg vendor_booking_cal">
				<div class="booking_calendar_dv">
					<div class="booking_calendar" id="mainbodyc">
						<div class="calendar_input" id="calInput"></div>
					</div>
				</div>
			</div>-->
			
			 <div class="row">
				<div class="col-md-12 col-sm-12">
					 <div class="card-box">
						 <div class="card-body ">
							<div class="panel-body">
									<div id="calendar" class="has-toolbar new"> </div>
								</div>
						 </div>
					 </div>
				 </div>
			</div>
					
		</div>
	</div>
	<!-- Booking calendar End -->

	

<script src="<?php echo base_url('front'); ?>/js/croppie.js"></script>
<script src="<?php echo base_url('front');?>/assets/js/plugins/jquery_ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url('front'); ?>/js/moment/moment.min.js" ></script>
<script src="<?php echo base_url('front'); ?>/js/fullcalendar/fullcalendar.min.js" ></script>

<script>
var date_last_clicked = null;
//alert(id);
$('#calendar').fullCalendar({
	validRange: {
		start: '2020-03-11'
	  },
	eventSources: [
    {   
	events: function(start, end, timezone, callback, id) {
            $.ajax({
                url: '<?php echo site_url();?>vendor/get_events',
                dataType: 'json',
                data: {                
                    start: start.unix(),
					end: end.unix()
					
                 },
                success: function(msg) {
					//alert(msg);
					//console.log(msg);
                    var events = msg.events;
                    callback(events);
                }
            });
       }
    },
    ],
   
	dayClick: function(date, view) {
	var c_dates = $(this).data('date');
	//alert(c_dates);
	//var c_dates = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
		$(".calendar_popup").addClass("show").fadeIn(100);
		$(".showdate").text(c_dates);
		$("#showdate").val(c_dates);
		$(".close_modal").on("click", function(){
			$(this).parents(".calendar_popup").removeClass("show").fadeOut(100);
		});
	},
					
});
</script>
    <!-- Common js-->
	



<!-- Calendar modal-->		
<div class="calendar_popup">
	<div class="modal_dialog">
		<div class="modal-content">
			<div class="modal_header">
				<span class="close_modal">&times;</span>
			</div>
			<div>Add unavalible time on <?php echo $this->uri->segment(3);?> calendar at date <span class="showdate"></span></div>
			
			<div class="login_form calendar_form">
				<form>
					<div class="form_group">
						<label>Start time</label>
						<div class="input_group">
							<!--<input type="text" name="start_time"  id="start_time">-->
							    <select name="start_time"  id="start_time">
									<option value="06:00 am">06.00 AM</option>
									<option value="06:30 am">06.30 AM</option>
									<option value="07:00 am">07.00 AM</option>
									<option value="07:30 am">07.30 AM</option>
									<option value="08:00 am">08.00 AM</option>
									<option value="08:30 am">08.30 AM</option>
									<option value="09:00 am">09.00 AM</option>
									<option value="09:30 am">09.30 AM</option>
									<option value="10:00 am">10.00 AM</option>
									<option value="10:30 am">10.30 AM</option>
									<option value="11:00 am">11.00 AM</option>
									<option value="11:30 am">11.30 AM</option>
									<option value="12:00 pm">12.00 PM</option>
									<option value="12:30 pm">12.30 PM</option>
									<option value="01:00 pm">01.00 PM</option>
									<option value="01:30 pm">01.30 PM</option>
									<option value="02:00 pm">02.00 PM</option>
									<option value="02:30 pm">02.30 PM</option>
									<option value="03:00 pm">03.00 PM</option>
									<option value="03:30 pm">03.30 PM</option>
									<option value="04:00 pm">04.00 PM</option>
									<option value="04:30 pm">04.30 PM</option>
									<option value="05:00 pm">05.00 PM</option>
									<option value="05:30 pm">05.30 PM</option>
									<option value="06:00 pm">06.00 PM</option>
								</select>
							<input type="hidden" name="showdate" id="showdate" >
							<input type="hidden" name="occupation_id" id="occupation_id" value="<?php echo $this->uri->segment(4);?>" >
						</div>
					</div>
					<div class="form_group">
						<label>End time</label>
						<div class="input_group">
						 <select name="end_time"  id="end_time">
								<option value="06:00 am">06.00 AM</option>
								<option value="06:30 am">06.30 AM</option>
								<option value="07:00 am">07.00 AM</option>
								<option value="07:30 am">07.30 AM</option>
								<option value="08:00 am">08.00 AM</option>
								<option value="08:30 am">08.30 AM</option>
								<option value="09:00 am">09.00 AM</option>
								<option value="09:30 am">09.30 AM</option>
								<option value="10:00 am">10.00 AM</option>
								<option value="10:30 am">10.30 AM</option>
								<option value="11:00 am">11.00 AM</option>
								<option value="11:30 am">11.30 AM</option>
								<option value="12:00 pm">12.00 PM</option>
								<option value="12:30 pm">12.30 PM</option>
								<option value="01:00 pm">01.00 PM</option>
								<option value="01:30 pm">01.30 PM</option>
								<option value="02:00 pm">02.00 PM</option>
								<option value="02:30 pm">02.30 PM</option>
								<option value="03:00 pm">03.00 PM</option>
								<option value="03:30 pm">03.30 PM</option>
								<option value="04:00 pm">04.00 PM</option>
								<option value="04:30 pm">04.30 PM</option>
								<option value="05:00 pm">05.00 PM</option>
								<option value="05:30 pm">05.30 PM</option>
								<option value="06:00 pm">06.00 PM</option>
							</select>
						</div>
					</div>
					<!--<div class="form_group">
						<label>Comment</label>
						<div class="input_group">
							<textarea placeholder="Add Comment"></textarea>
						</div>
					</div>-->
					<div class="button_group">
						<button type="submit" id="submit" class="site_button cal_submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Calendar modal-->

<script>
	
 $(document).on('click','#submit', function(){
	  
    var date = $('#showdate').val();
    var start_time = $('#start_time').val();
    var end_time = $('#end_time').val();
    var occupation_id = $('#occupation_id').val();
	$.ajax({
		url: "<?php echo site_url();?>vendor/addDate",
		type:'post',
		data:{date: date,start_time: start_time,end_time: end_time,occupation_id: occupation_id},
		success: function(response){
			//console.log(response);
			$('#mainbodyc').html(response);
			$('#confMod').modal('hide');
		}
	});
});

</script>	