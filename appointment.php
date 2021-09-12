<?php
require_once('db_config.php');
//echo password_hash("password", PASSWORD_DEFAULT) . "<br>";
if($user->is_loggedin()!="")
{
	$user_id = $_SESSION['user_session'];
	
}
else
{
	$user->redirect('index.html');
}
?>

<!DOCTYPE html>
<html lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>MADINA | HOSPITAL</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="" />
  
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/slider.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
    <!-- //Fonts -->
    <style>
        label
        {
            color: black;
        }
 .chat-box{
	
	bottom: 0px;
	background: white;
	width: 100%;
	border-radius: 5px 5px 0px 0px;
}
.chat-head{
	width: inherit;
	height: 45px;
	background: #2c3e50;
	border-radius: 5px 5px 0px 0px;
}
.chat-head h2{
	color: white;
	padding: 8px;
	display: inline-block;
}
.chat-head img{
	cursor: pointer;
	float: right;
	width: 25px;
	margin: 10px;
}
.chat-body{
	height: 355px;
	width: inherit;
	overflow: auto;
	margin-bottom: 45px;
}
.chat-text{
	
	padding-top:270px;
	height: 45px;
	width: inherit;
}
.chat-text textarea{
	width: inherit;
	height: inherit; 
	box-sizing: border-box;
	border: 1px solid #bdc3c7;
	padding: 10px;
	resize: none;
}
.chat-text textarea:active, .chat-text textarea:focus, .chat-text textarea:hover{
	border-color: royalblue;
}
.msg-send{
	background: #2ecc71;
}
.msg-receive{
	background: #3498db;
}
.msg-send, .msg-receive{
	width: 200px;
	height: 35px;
	padding: 5px 5px 5px 10px;
	margin: 10px auto;
	border-radius: 3px;
	line-height: 30px;
	position: relative;
	color: white;
}
.msg-receive:before{
	content: '';
	width: 0px;
	height: 0px;
	position: absolute;
	border: 15px solid;
	border-color: transparent #3498db transparent transparent;
	left: -29px;
	top: 7px;
}
.msg-send:after{
	content: '';
	width: 0px;
	height: 0px;
	position: absolute;
	border: 15px solid;
	border-color: transparent transparent transparent #2ecc71;
	right: -29px;
	top: 7px;
}
.msg-receive:hover, .msg-send:hover{
	opacity: .9;
}

    </style>
</head>

<body>


<meta name="robots" content="noindex">
<body>
  
		
		<!-- //modal -->
        <!-- register -->
		<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-2">
					<div class="modal-header text-center">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="login px-4 mx-auto mw-100">
							<h5 class="text-center mb-4">Register Now</h5>
						
							<div id="userErrors" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;">
								<a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
								<ul class="w3-ul" style="list-style:none;">
								
								</ul>
								</div>
								
							<form id="formUser" method="post">
								<div class="form-group">
									<label>Your Name</label>
									<input type="text" class="form-control" name="name" placeholder="" required="">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" name="email" placeholder="" required="">
								</div>
								<div class="form-group">
									<label class="mb-2">Mobile No</label>
									<input type="number" class="form-control" name="mobile_no" id="mobile_no" placeholder="" required="">
								</div>
								
								<button type="submit" id="btnUser" class="btn btn-primary submit mb-4">CREATE ACCOUNT</button>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //register -->
		<!-- //modal -->

    <!-- mian-content -->
    <div class="main-w3layouts-header-sec">

        <!-- header -->
        <header>
            <div class="container">
                <div class="header d-lg-flex justify-content-between align-items-center">
                    <div class="header-section">
                        <h1>
                            <a class="navbar-brand logo editContent" href="index.html">
                                <span class="fa fa-meetup"></span>MADINA
                            </a>
                        </h1>
                    </div>
                    <div class="nav_section">
                        <nav>
                            <label for="drop" class="toggle mt-lg-0 mt-1"><span class="fa fa-bars" aria-hidden="true"></span></label>
                            <input type="checkbox" id="drop" />
                            <ul class="menu">
                                <li class="active"><a href="index.html">Home</a></li>
                                <li><a class="scroll" href="#chat"  style="color:#2222e5;"><i class="fa fa-comments"></i>Chat</a></li>

                                <li><a class="active pull-right"  style="color:#2222e5;" href="logout.php?logout=true"><i class="fa fa-sign-out-alt"></i> &nbsp LOGOUT</a></li>
                            
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </header>
        <!-- //header -->
       


    </div>
    <!-- //header -->
    
    <!-- /breadcrumb -->
    <ol class="breadcrumb" style="padding-top:200px;">
        <li class="breadcrumb-item">
            <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Appointment</li>
    </ol>
    <!-- //breadcrumb -->
    <!--/banner-bottom -->
    <!-- /last-content -->
    <section class="last-content">
        <div class="overlay-last">
            <div class="container text-center">
                <div class="last-w3pvt-inner-content row">

                    <div class="col-md-12 col-lg-12 col-sm-12">

                        <form id="formAppointment" class="booking" method="post">
                            <h3 class="mb-4">Book Appointment</h3>
                           <div id="errorAppointment">

                           </div>
                           <div class="row">
                           <div class="form-group col-md-6 col-lg-6 col-m-6">
                               <label for="" style="color: #000000;">Address</label>
                            <input placeholder="Address" name="address" type="text" required="">
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-m-6">
                                <label for="appointment_date" style="color: #000000;">Appointment Date</label>
                            <input placeholder="Date Time" class="form-control" type="date" name="appointment_date" id="appointment_date" required="">
                            </div>
                           </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-m-6">
                                    <label for="appointment_time" style="color: #000000;">Appointment Time</label>
                                     <input placeholder="Time" class="form-control" type="text" name="appointment_time" id="appointment_time" required="">
                                     </div>
                                    
                                    
                                   
                                     <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                         <label for="service" style="color: #000000;">Service </label>
                                      <select name="service" class="form-control-lg" id="service">
                                          <option value="" disabled></option>
                                          <option value="cardiology">Cardiology</option>
                                          <option value="therapist">Therapist</option>
                                          <option value="dentist">Dentist</option>
                                          <option value="optician">Optician</option>
                                      </select>
         
                                     </div>
                            </div>
                           
                            <div class="row">
                            <div class="form-group col-md-12 col-lg-12 col-sm-12">
                                <label for="comment" style="color: #000000;">Short Description</label>
                              <textarea name="comment" class="form-control-lg" id="" cols="30" rows="5"></textarea>
                            </div>
                            </div>

                           </div>
                           
                            <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                            <button type="submit" class="book-appo btn mt-3" id="appointmentButton">Quick Appointment </button>
                            </div>
                            </div>
                        </form> 
                        <!-- <div style="height:100px;"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
     
    <!-- //last-content -->
    <!-- //banner-bottom -->
    <!-- /last-content -->
    <!-- <section class="last-content">
        <div class="overlay-last">
            <div class="container text-center">
                <div class="last-w3pvt-inner-content row">

                    <div class="col-md-6 offset-md-6">

                        <form action="#" class="booking" method="post">
                            <h3 class="mb-4">Book Appointment</h3>
                            <div class="form-group">
                                <input placeholder="Your Name" name="name" type="text" required="">
                                <input placeholder="Contact Number" name="number" type="text" required="">
                                <input placeholder="Address" type="text" required="">
                                <input placeholder="Timing" type="text" required="">
                                <button class="book-appo btn mt-3">Quick Appointment </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- //last-content -->
   
    <!-- /tabs -->
   
               
    <div style="height:100px;"> </div>
     <!-- /last-content -->
     <section class="" id="chat">
        <div class="">
            <div class="container text-center">
                <div class="last-w3pvt-inner-content row">
                    <h3 class="text-center">Chat With A Doctor Here</h3>
                    <hr>
                    <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                        <label for="">Select Doctor</label>
                            <div class="form-group">
                             <select name="doctor_name" id="doctor_name" class="form-control input-lg">
                                 <option value="" disabled>Select Doctor</option>
                                 
                             </select>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="chat-box">
			<div class="chat-head">
            <h2>Chat Box</h2>
            <img src="https://maxcdn.icons8.com/windows10/PNG/16/Arrows/angle_down-16.png" title="Expand Arrow" width="16">
            </div>
            <div class="chat-body" style="overflow-y:auto;">
            <div class="msg-insert">
            <!-- <div class="msg-send"> Send message </div>
            <div class="msg-receive"> Received message </div> -->
            </div>
            <div class="chat-text">
            <textarea placeholder="Send"></textarea>
            </div>
            </div>
		   </div>
                        </div>


                    </div>
                       
                        <!-- <div style="height:100px;"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="height:100px;"> </div>
    <!-- footer -->
    <footer id="contact">
        <div class="container">
            <div class="row footer-top">
                <div class="col-lg-4 footer-grid_section_w3layouts">
                    <h2 class="logo-2 mb-lg-4 mb-3">
                        <a href="index.html"><span class="fa fa-meetup"></span>MADINA HOSPITAL </a>
                    </h2>
                  
                    <h4 class="sub-con-fo ad-info my-4">Catch on Social</h4>
                    <ul class="w3layouts_social_list list-unstyled">
                        <li>
                            <a href="#" class="w3pvt_facebook">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#" class="w3pvt_twitter">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="w3pvt_dribble">
                                <span class="fa fa-dribbble"></span>
                            </a>
                        </li>
                        <li class="ml-2">
                            <a href="#" class="w3pvt_google">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 footer-right">
                   
                    <div class="row mt-lg-4 bottom-w3layouts-sec-nav mx-0">
                        <div class="col-md-4 footer-grid_section_w3layouts">
                            <h3 class="footer-title mb-lg-4 mb-3">Information</h3>
                            <ul class="list-unstyled w3layouts-icons">
                                <li>
                                    <a class="scroll" href="#home">Home</a>
                                </li>
                                <li class="mt-3">
                                    <a class="scroll" href="#about">About Us</a>
                                </li>
                                <li class="mt-3">
                                    <a class="scroll" href="#services">Services</a>
                                </li>
                                <li class="mt-3">
                                    <a class="scroll" href="#reviews">Reviews</a>
                                </li>
                               
                                <li class="mt-3">
                                    <a class="scroll" href="#contact">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                 
                        <div class="col-md-4 footer-grid_section_w3layouts my-md-0 my-5">
                            <h3 class="footer-title mb-lg-4 mb-3">Contact Info</h3>
                            <div class="contact-info">
                                <div class="footer-address-inf">
                                    <h4 class="ad-info mb-2">Phone</h4>
                                    <p>+254 721 000 000</p>
                                </div>
                                <div class="footer-address-inf my-4">
                                    <h4 class="ad-info mb-2">Email </h4>
                                    <p><a href="#">info@madinahospital.com</a></p>
                                </div>
                                <div class="footer-address-inf">
                                    <h4 class="ad-info mb-2">Location</h4>
                                    <p>Easteleigh, Nairobi</p>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->
    <div class="cpy-right py-3">
        <div class="container">
            <div class="row">
                <p class="col-md-10 text-left">© MADINA HOSPITAL. All rights reserved | Designed & Developed by
                    <a href="#">ABDIFATHI MOHAMED</a>
                </p>
                <!-- move top icon -->
                <a href="#home" class="move-top text-lg-right text-center col-md-2"><span class="fa fa-angle-double-up" aria-hidden="true"></span></a>
                <!-- //move top icon -->
            </div>
        </div>

    </div>


    </div>
</body>
	<!-- jquery & sweetalert -->
	<script src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script> -->
    <script src="js/bootstrap.js"></script>
    <!-- <script src="js/bootstrap-datetimepicker.min.js"></script> -->

	<!-- //jquery -->
	<!-- // smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
    <!-- // //smoothscroll -->
    <script>
        $(function(){
	var arrow = $('.chat-head img');
	var textarea = $('.chat-text textarea');

	arrow.on('click', function(){
		var src = arrow.attr('src');

		$('.chat-body').slideToggle('fast');
		if(src == 'https://maxcdn.icons8.com/windows10/PNG/16/Arrows/angle_down-16.png'){
			arrow.attr('src', 'https://maxcdn.icons8.com/windows10/PNG/16/Arrows/angle_up-16.png');
		}
		else{
			arrow.attr('src', 'https://maxcdn.icons8.com/windows10/PNG/16/Arrows/angle_down-16.png');
		}
	});

	textarea.keypress(function(event) {
		var $this = $(this);

		if(event.keyCode == 13){
            // alert("Hi");
			var msg = $this.val();
			$this.val('');
			
            var doctor_id=$('#doctor_name').val();
            
            $.post("send_chat_message.php", {
            msg:msg,
            doctor_id:doctor_id
        },
        function (data, status) {
            $('.msg-insert').append("<div class='msg-send'>"+msg+"</div>");
          
        } 
    );
			}
	});

});
function fetchDoctors()
      {
        $.ajax({
          url:"fetch_doctors.php",
          method:"GET",
          dataType:"json",
          success:function(data)
          {
           //alert(data);
          
            $.each(data,function(index,val){
                //alert(val.name);
               
                $('#doctor_name').append('<option value=' + val.email +'>' + val.full_name +  '</option>');

             
            });
          }
        })
      }
    //   fetchPatientMessages()
    //   {
    //     $.ajax({
    //       url:"fetch_doctor_messages.php",
    //       method:"GET",
    //       dataType:"json",
    //       success:function(data)
    //       {
    //        //alert(data);
          
    //         $.each(data,function(index,val){
    //             //alert(val.name);
    //             $('.msg-insert').append("<div class='msg-send'>"+val.message+"</div>");
    //         //   $('#doctor_name').append('<option value=' + val.email +'>' + val.full_name +  '</option>');
    //         });
    //       }
    //     });
    //   }
            $(document).ready(function(){

               fetchDoctors();
            
            // Fetch Doctor Reply Messages
            $('#doctor_name').change(function(){
              var doctor = $(this).val();
              $.ajax({
          url:"fetch_doctor_messages.php",
          method:"POST",
          data:{doctor:doctor},
          dataType:"json",
          success:function(data)
          {
           //alert(data);
          
            $.each(data,function(index,val){
                //alert(val.name);
                $('.msg-insert').append("<div class='msg-receive'>"+val.message+"</div>");
            //   $('#doctor_name').append('<option value=' + val.email +'>' + val.full_name +  '</option>');
            });
          }
        });
            })
                    
				 $("#formAppointment").on('submit',(function(e)
				{
					//alert("You Are Good To Go");
					e.preventDefault();
					$.ajax({
						url:"make_appointment.php",
						type:"POST",
						data:new FormData(this),
						contentType:false,
						cache:false,
						processData:false,
						beforeSend: function(){	
				$("#errorAppointment").fadeOut();
				$("#appointmentButton").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Making Appointment ...');
			},
		success : function(response){						
				if(response=="ok"){									
				 swal("Appointment,Successfully Placed ", {
                              button: "OK",
                            });
				 $("#appointmentButton").html('Make Appointment');
                 document.getElementById("formAppointment").reset();
                 
				}				
				else {									
					$("#errorAppointment").fadeIn(1000, function(){						
						$("#errorAppointment").html('&nbsp; '+response+' !');
						$("#appointmentButton").html('Make Appointment');
					});
				}
			}
				});
				}));
            })
        </script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
 
</script>
<!-- // //end-smooth-scrolling -->
</html>
