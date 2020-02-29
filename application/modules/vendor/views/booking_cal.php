<?php if(!empty($unavalibaleDate)){
		 $dates1 = $unavalibaleDate;
	}
	else{
		 $dates1 = date("Y/m/d");
	}
?>

<div class="calendar_input" id="calInput">
</div>
<script>
var holidays= [<?php echo $dates1; ?>];
 //alert(holidays);
 $('.calendar_input').datepicker({
	dateFormat: "yy/mm/dd",
	//defaultDate: "+1w",
	 minDate:0,
	 firstDay: 1,

	 beforeShowDay: function (date) {
		
	   
	   for (var i = -1; i < holidays.length; i++) {
			if (new Date(holidays[i]).toString() == date.toString()) {
			}
			 var string = jQuery.datepicker.formatDate("yy/mm/dd", date);
			 return [ holidays.indexOf(string) == -1 ];
			 
		}
	  /*  return[date.getDay()== 0 || date.getDay()== 6? false:true]; */
	 return [true,''];
	   
	},
	
   });
</script>
			