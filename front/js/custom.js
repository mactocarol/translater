(function($) {
	"use strict";
  //Responsive menu show js
  $(".navbar_toggle").on("click", function(){
    $(".navigation_wrap").slideToggle(300);
  });
  $(document).ready(function(){
         $('.cat_check_list label').on('click', function(){
            if($(this).children("input").prop("checked") == true){
                $(this).parents(".cat_check_list").addClass("checked_d");
            }
            else if($(this).children("input").prop("checked") == false){
                $(this).parents(".cat_check_list").removeClass("checked_d");
            }
        });
    });
  
  //location modal show
  $(window).load(function(){
   $('#location').modal('show');
  });
  //location modal Hide
  $(document).ready(function(){        
    $('#manually').click(function(){        
      $('#location').modal('hide');
    }); 
  });
  //file upload drag $ drop code
  $('#file_upload').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#file_upload')[0].files[0].name;
    $(this).prev('label').html(file);
  });
  //service tab menu
  //show data on click
  $('.tab_menu li').on('click',function(){
    $('.tab_menu li').removeClass("active");
    $(this).addClass("active");
    var content= $(this).attr('data-show');
    $(".tab_content").removeClass("active");
    $("#"+content).addClass("active");
  });
  //quantity spiner
  if($(".quant_spinner").length > 0){
  	$(".quant_spinner").spinner({
  	  min: 1
  	});  
  }
  //accordion js
  $(".panel_content").hide();
  $(".panel_heading").on('click',function(){
  	$(this).next(".panel_content").slideToggle(300);
  	$(this).toggleClass("active");
  	if($(".panel_heading").hasClass("active")){
  		$(this).find("i").attr("class","fas fa-minus")
  	}
  	else{
  		$(this).find("i").attr("class","fas fa-plus")
  	}
  });
  //number counter js
  $(".number_counter").append('<div class="inc_btn c_button">+</div><div class="dec_btn c_button">-</div>');
  $(".c_button").on("click", function() {
    var $button = $(this);
    var oldValue = $button.parent().find(".show_number").val();

    if ($button.text() == "+") {
  	  var newVal = parseFloat(oldValue) + 1;
  	} else {
	   // Don't allow decrementing below zero
      if (oldValue > 1) {
        var newVal = parseFloat(oldValue) - 1;
	    } else {
        newVal = 1;
      }
	  }
    $button.parent().find(".show_number").val(newVal);

  });
  //selectpicker
  $('.selectpicker').selectpicker();
  $(".bootstrap-select .dropdown-toggle").on("click", function(e){
	$(this).next(".dropdown-menu").toggleClass("show");
	$(".bootstrap-select .dropdown-toggle").not(this).next().slideUp("slow").removeClass("show");
	e.stopPropagation();
  });
  $("body").on("click", function(){
	$(".bootstrap-select .dropdown-menu").removeClass("show");
  });
  //Jqeury ui Datepicker
  if($(".datepicker").length > 0){
    $('.datepicker').datepicker({ 
      dateFormat: 'dd-mm-yy' 
    });
  }
})(jQuery);
