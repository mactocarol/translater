
<!-- footer Section End -->
	<div class="section footer_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-12">
					<div class="footer_widget">
						<div class="footer_logo">
							<a href="index.html">
								<img src="<?php echo base_url('front');?>/assets/images/site_logo.png" class="img-fluid" alt="">
							</a>
						</div>
						<div class="copyright_txt">
							<p>Copyright all Rights Reserved</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-12">
					<div class="footer_widget">
						<h5 class="footer_title">Quick Links</h5>
						<div class="footer_menus">
							<ul>
								<li><a href="<?php echo base_url('about');?>">about us</a></li>
								<li><a href="<?php echo base_url('contact');?>">contact us</a></li>
								<li><a href="<?php echo base_url('faq');?>">Faq</a></li>
								<li><a href="#">our feed</a></li>
								<li><a href="#">terms and conditions</a></li>
								<li><a href="<?php echo base_url('privacy_policy');?>">our privacy</a></li>
								<li><a href="#">join us</a></li>
								<li><a href="#">live support</a></li>
								<?php if(empty($this->session->userdata('user_group_id'))){ ?>
								<li><a href="<?php echo base_url('vendor-signup');?>">Become Translater</a></li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-12">
					<div class="footer_widget">
						<h5 class="footer_title">Payment Methods</h5>
						<div class="payment_img">
							<img src="<?php echo base_url('front');?>/assets/images/payment_images.png" alt="" class="img-fluid">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- footer Section End -->
	<!-- jquery library js -->

	<!-- jquery library js -->
	<!-- bootstrap js file-->
	<script src="<?php echo base_url('assets');?>/bootstrap/dist/js/tether.min.js"></script>
	<script src="<?php echo base_url('front');?>/assets/js/popper.min.js"></script>
	<script src="<?php echo base_url('front');?>/assets/js/bootstrap.js"></script>
	
	<!-- bootstrap js file-->
	<!-- owl-carousel js file-->
	<script src="<?php echo base_url('front');?>/assets/js/plugins/owl_carousel/owl.carousel.min.js"></script>
    <!-- owl-carousel js file-->
    <!-- gallery js file-->
	<script src="<?php echo base_url('front');?>/assets/js/plugins/gallery/jquery.magnific-popup.js"></script>
    <!-- gallery js file-->
    <!-- jquery ui js file-->
	
    <!-- jquery ui js file-->
		<script src="<?php echo base_url('front');?>/assets/js/plugins/jquery_ui/jquery-ui-timepicker-addon.js"></script>
	<!-- bootstrap selectpicker -->
    <script src="<?php echo base_url('front');?>/assets/js/plugins/selectpicker/bootstrap-select.js"></script>
    <!-- bootstrap selectpicker -->
	<script src="<?php echo base_url('front');?>/assets/js/custom_script.js"></script>
	
	<script src="<?php echo base_url('front');?>/js/bootstrapValidator.min.js"></script>
	   <!-- Register page End -->
   <script>
        $(document).ready(function() {        
        $('#vendorregisterform').bootstrapValidator({
            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                fname: {
                    validators: {
                        notEmpty: {
                            message : 'The First name Field is required'
                        },
                        stringLength: {
                            min: 3 ,
                            max: 15,
                            message: 'The First name length min 3 and max 15 character Long'
                        },
                         callback: {
                            message: 'please enter only letters and numbers',
                            callback: function(value, validator, $field) {
                                if (!isUsernameValid(value)) {
                                  return {
                                    valid: false,
                                  };
                                }
                                else
                                {
                                  return {
                                    valid: true,
                                  };    
                                }
    
                            }
                        },
                        
                    },
                }, 
				lname: {
                    validators: {
                        notEmpty: {
                            message : 'The Last name Field is required'
                        },
                       
                         callback: {
                            message: 'please enter only letters and numbers',
                            callback: function(value, validator, $field) {
                                if (!isUsernameValid(value)) {
                                  return {
                                    valid: false,
                                  };
                                }
                                else
                                {
                                  return {
                                    valid: true,
                                  };    
                                }
    
                            }
                        },
                        stringLength: {
                            min: 3 ,
                            max: 15,
                            message: 'The Last name length min 3 and max 15 character Long'
                        }
                    },
                }, 				
               
                 email: {
                    validators: {
                        notEmpty: {
                            message : 'The email Field is required'
                        },
                         remote: {  
                         type: 'POST',
                         url: "<?php echo site_url();?>vendor/check_email_exists",
                         data: function(validator) {
                             return {
                                 //email: $('#email').val()
                                 email: validator.getFieldElements('email').val()
                                 };
                            },
                         message: 'This email is already in use.'     
                         }
                    },
                },  
                
                password: {
                    validators: {
                        notEmpty: {
                            message : 'The password Field is required'
                        },
                        identical: {
                            field: 'repassword',
                            message: 'The password and its confirm are not the same'
                        },
                        stringLength: {
                            min: 6 ,
                            max: 15,
                            message: 'The password length min 6 and max 15 character Long'
                        }
                    }
                },
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message : 'The password Field is required'
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                        
                    }
                },
				price: {
                    validators: {
                        notEmpty: {
                            message : 'The Price Field is required'
                        },
                       
                        
                    },
                }, 
				lang: {
                    validators: {
                        notEmpty: {
                            message : 'Please select Language'
                        },
                       
                        
                    },
                },
             city: {
                    validators: {
                        notEmpty: {
                            message : 'Please select City'
                        },
                       
                        
                    },
                }, 				
               	
				
            }
        });
    
    });
    

 $(document).ready(function() {        
        $('#registerform').bootstrapValidator({
            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                fname: {
                    validators: {
                        notEmpty: {
                            message : 'The First name Field is required'
                        },
                       
                         callback: {
                            message: 'please enter only letters and numbers',
                            callback: function(value, validator, $field) {
                                if (!isUsernameValid(value)) {
                                  return {
                                    valid: false,
                                  };
                                }
                                else
                                {
                                  return {
                                    valid: true,
                                  };    
                                }
    
                            }
                        },
                        stringLength: {
                            min: 3 ,
                            max: 15,
                            message: 'The First name length min 3 and max 15 character Long'
                        }
                    },
                }, 
				lname: {
                    validators: {
                        notEmpty: {
                            message : 'The Last name Field is required'
                        },
                       
                         callback: {
                            message: 'please enter only letters and numbers',
                            callback: function(value, validator, $field) {
                                if (!isUsernameValid(value)) {
                                  return {
                                    valid: false,
                                  };
                                }
                                else
                                {
                                  return {
                                    valid: true,
                                  };    
                                }
    
                            }
                        },
                        stringLength: {
                            min: 3 ,
                            max: 15,
                            message: 'The Last name length min 3 and max 15 character Long'
                        }
                    },
                }, 				
               
                /* email: {
                    validators: {
                        notEmpty: {
                            message : 'The email Field is required'
                        },
                         remote: {  
                         type: 'POST',
                         url: "<?php echo site_url();?>user/check_email_exists",
                         data: function(validator) {
                             return {
                                 //email: $('#email').val()
                                 email: validator.getFieldElements('email').val()
                                 };
                            },
                         message: 'This email is already in use.'     
                         }
                    },
                },   */  
                
                password: {
                    validators: {
                        notEmpty: {
                            message : 'The password Field is required'
                        },
                        identical: {
                            field: 'repassword',
                            message: 'The password and its confirm are not the same'
                        },
                        stringLength: {
                            min: 6 ,
                            max: 15,
                            message: 'The password length min 6 and max 15 character Long'
                        }
                    }
                },
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message : 'The password Field is required'
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                        
                    }
                },
            }
        });
    
    });
        
		
	 $(document).ready(function() {        
        $('#registerformuser').bootstrapValidator({
            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                f_name: {
                    validators: {
                        notEmpty: {
                            message : 'The First name Field is required'
                        },
                       
                         callback: {
                            message: 'please enter only letters and numbers',
                            callback: function(value, validator, $field) {
                                if (!isUsernameValid(value)) {
                                  return {
                                    valid: false,
                                  };
                                }
                                else
                                {
                                  return {
                                    valid: true,
                                  };    
                                }
    
                            }
                        },
                        stringLength: {
                            min: 3 ,
                            max: 15,
                            message: 'The First name length min 3 and max 15 character Long'
                        }
                    },
                }, 
				l_name: {
                    validators: {
                        notEmpty: {
                            message : 'The Last name Field is required'
                        },
                       
                         callback: {
                            message: 'please enter only letters and numbers',
                            callback: function(value, validator, $field) {
                                if (!isUsernameValid(value)) {
                                  return {
                                    valid: false,
                                  };
                                }
                                else
                                {
                                  return {
                                    valid: true,
                                  };    
                                }
    
                            }
                        },
                        stringLength: {
                            min: 3 ,
                            max: 15,
                            message: 'The Last name length min 3 and max 15 character Long'
                        }
                    },
                }, 	
             genderu: {
                    validators: {
                        notEmpty: {
                            message : 'The gender Field is required'
                        }
			         },
					 },                      
				
               
                 email: {
                    validators: {
                        notEmpty: {
                            message : 'The email Field is required'
                        },
                         remote: {  
                         type: 'POST',
                         url: "<?php echo site_url();?>user/check_email_exists",
                         data: function(validator) {
                             return {
                                 //email: $('#email').val()
                                 email: validator.getFieldElements('email').val()
                                 };
                            },
                         message: 'This email is already in use.'     
                         }
                    },
                },   
                
                password: {
                    validators: {
                        notEmpty: {
                            message : 'The password Field is required'
                        },
                        identical: {
                            field: 'repassword',
                            message: 'The password and its confirm are not the same'
                        },
                        stringLength: {
                            min: 6 ,
                            max: 15,
                            message: 'The password length min 6 and max 15 character Long'
                        }
                    }
                },
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message : 'The password Field is required'
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                        
                    }
                },
            }
        });
    
    });
        	

			
    function isUsernameValid(value)
    {
      var fieldNum = /^[a-z0-9]+$/i;
    
      if ((value.match(fieldNum))) {
          return true
      }
      else
      {
          return false
      }
    
    }
    </script>
	
	<script>

$(document).ready(function () {
  setInterval(function() {
       var url = '<?php echo site_url();?>';
       //alert(url);
      
       $.ajax({
           url: url+'vendor/notification',
           type: "POST",
           success: function(response){
           var obj = JSON.parse(response);
          // alert(obj.length);
           $('#notify').text(obj.length);
          }
       }); 
    }, 10000);   
});
   
   
</script>

	</body>
</html>
