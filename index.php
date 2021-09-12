<?php
require_once('../db_config.php');
if($user->is_loggedin()!="")
{
    $user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);

	
}
else
{
	$user->redirect('pages-login.html');
}
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Madina - Hospital Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="MADINA HOSPITAL" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

         <!-- third party css -->
         <link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
         <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
         <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/css/sweetalert.css">
        <style>
            .profile 
            {
                display:none;
            }
        </style>

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Add Record Modal -->

       <!-- <div class="modal fade w3-padding-16 w3-card-4 w3-padding-right w3-padding-left" id="patient_modal"  role="dialog" aria-labelledby="myModalLabel"> -->
       <div id="patient_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content ">
                <!-- <button type="button" class="close w3-circle w3-padding-right" data-dismiss="modal" aria-label="Close"><span class="w3-xxlarge w3-text-white" aria-hidden="true">&times;</span></button> -->
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="modal-header w3-card-4 w3-padding-8 w3-theme-d2 w3-padding-left">
                
                <h4 class="modal-title w3-bottombar w3-slim" id="myModalLabel" style="color: #000;font-family: cursive;text-align:center;font-size:2vw;">Add New Record For <b id="patient-name"></b></h4>
            </div>
            <div class="modal-body">
           
             								
                     <div id="succu"></div>
             <div id="error-data1u">

             </div>
              <form method="POST" id="formRecord" class="w3-padding-left">
								<div class="w3-padding-16">
								
								</div>
<div id="return-hostel-detailsU">

</div>
				
            
							<div class="row w3-padding-16">
       <div class="col-sm-6 col-md-6 col-lg-6">
       <div class="form-group">
     <label class="label-control">
         Signs and Symptoms
     </label>
     <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-flag"></i> </span>
    <textarea class="form-control input-lg" name="signs" id="signs" rows="3" cols="40">
      
    </textarea>
     </div>
 </div>
       </div>
       <div class="col-sm-6 col-md-6 col-lg-6">
       <div class="form-group">
     <label class="label-control">
         Lab Results
     </label>
     <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-stethoscope"></i> </span>
    <textarea class="form-control input-lg"  name="lab-results" id="lab-results" rows="3" cols="40">
      
    </textarea>
     </div>
 </div>
       </div>
      </div>
       
        	<div class="row w3-padding-16">
       <div class="col-sm-6 col-md-6 col-lg-6">
       <div class="form-group">
     <label class="label-control">
         Prescriptions(Medication,Quantity,Frequency)
     </label>
     <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-stethoscope"></i> </span>
    <textarea class="form-control input-lg" name="presp" id="presp" rows="3" cols="40">
      
    </textarea>
     </div>
 </div>
       </div>
       <div class="col-sm-6 col-md-6 col-lg-6">
       <div class="form-group">
     <label class="label-control">
         Disease
     </label>
     <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-medkit"></i> </span>
    <input type="text" name="disease" class="form-control input-lg" name="disease">
     </div>
 </div>
       </div>
      </div>
       <input type="hidden" name="hidden_user_id" id="hidden_user_id">
							
					<button type="submit" class="btn btn-primary btn-lg btn-block" onclick="" id="buttonRecord" >Add Record</button>
     	</form>
        </div>
    </div>
</div>
    </div>
<!-- // Modal -->
            <!-- End -->
            <!-- Add Record Modal -->

       <!-- <div class="modal fade w3-padding-16 w3-card-4 w3-padding-right w3-padding-left" id="sms_modal"  role="dialog" aria-labelledby="myModalLabel"> -->
       <div id="sms_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content ">
                <!-- <button type="button" class="close w3-circle w3-padding-right" data-dismiss="modal" aria-label="Close"><span class="w3-xxlarge w3-text-white" aria-hidden="true">&times;</span></button> -->
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="modal-header w3-card-4 w3-padding-8 w3-theme-d2 w3-padding-left">
                
                <h4 class="modal-title w3-bottombar w3-slim" id="myModalLabel" style="color: #000;font-family: cursive;text-align:center;font-size:2vw;">
                Send Notification Sms To <b id="patient-sms-name"></b></h4>
            </div>
            <div class="modal-body">
           
             								
                     <div id="succu"></div>
             <div id="error-sms">

             </div>
              <form method="POST" id="formSms" class="w3-padding-left">
								<div class="w3-padding-16">
								
								</div>

				
            
		<div class="row w3-padding-16">
       <div class="col-sm-12 col-md-12 col-lg-12">
       <div class="form-group">
     <label class="label-control">
        Type Message Here
     </label>
     <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-flag"></i> </span>
    <textarea class="form-control input-lg" name="message_sms" id="message_sms" rows="3" cols="40">
      
    </textarea>
     </div>
 </div>
       </div>
       
      </div>
       
       <input type="hidden" name="hidden_sms_user_id" id="hidden_sms_user_id">
       <input type="hidden" name="hidden_sms_user_name" id="hidden_sms_user_name">
       <input type="hidden" name="hidden_sms_user_phone" id="hidden_sms_user_phone">			
					<button type="submit" class="btn btn-primary btn-lg btn-block" onclick="" id="buttonSms" >Send Message</button>
     	</form>
        </div>
    </div>
</div>
    </div>
<!-- // Modal -->
            <!-- End -->

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    

        
                   

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="assets/images/users/img_avatar14.png" alt="user-image" class="rounded-circle">
                            <span class="ml-1"><?php echo $user_id ?> <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                           

                            

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="../logout.php?logout=true" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>

                  


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;color:antiquewhite;font-weight: bolder;letter-spacing: 0.5em;">
                            MADINA
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            MADINA
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
        
                   

                </ul>
            </div>
            <!-- end Topbar -->

            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="index.html">
                                    <i class="fe-airplay"></i>
                                    
                                    <span> Dashboard </span>
                                </a>
                            </li>

                           <?php
                            if($results['role']== "admin")
                            {
                                ?>
                                 <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-briefcase"></i>
                                    <span> Doctors</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="#" data-id="new-doctor">New Dcotor</a></li>
                                    <li><a href="#" data-id="doctors-list">Doctors List</a></li>
                                 
                                </ul>
                            </li>
                                <?php
                            }
                           ?>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-box"></i>
                                    <span> Patients </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="#" data-id="patients-list">Patient List</a></li>
                                   
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-box"></i>
                                    <span> Records </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="#" data-id="records-list">Records List</a></li>
                                   
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-bar-chart-2"></i>
                                    <span> Appointments</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="#" data-id="appointments-list">Appointment List</a></li>
                                       
                                </ul>
                            </li>


                            <li>
                                <a href="../logout.php?logout=true">
                                    <i class="fe-disc"></i>
                                    <span class="badge badge-warning badge-pill float-right"></span>
                                    <span> Logout </span>
                                </a>
                               
                            </li>
            
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">MADINA</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div id="dashboard" class="row profile">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xl-3">
                                    <div class="card-box tilebox-one">
                                        <i class="fe-box float-right"></i>
                                        <h5 class="text-muted text-uppercase mb-3 mt-0">Doctors</h5>
                                        <h3 class="mb-3" data-plugin="counterup">10</h3>
                                    </div>
                                </div>
    
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xl-3">
                                    <div class="card-box tilebox-one">
                                        <i class="fe-layers float-right"></i>
                                        <h5 class="text-muted text-uppercase mb-3 mt-0">Patients</h5>
                                        <h3 class="mb-3">$<span data-plugin="counterup">7</span></h3>
                                    </div>
                                </div>
    
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xl-3">
                                    <div class="card-box tilebox-one">
                                        <i class="fe-tag float-right"></i>
                                        <h5 class="text-muted text-uppercase mb-3 mt-0">Records</h5>
                                        <h3 class="mb-3"><span data-plugin="counterup">10</span></h3>
                                    </div>
                                </div>
    
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xl-3">
                                    <div class="card-box tilebox-one">
                                        <i class="fe-briefcase float-right"></i>
                                        <h5 class="text-muted text-uppercase mb-3 mt-0">Appointments</h5>
                                        <h3 class="mb-3" data-plugin="counterup">3</h3>
                                    </div>
                                </div>
                            </div>
    
    
                            <div id="new-doctor" class="row profile">
                                <div class="col-sm-12 col-md-12 col-lg-12 card-box">
                                    <h4 class="header-title"><b>Doctor Registration Form</b></h4>
                                    <p class="sub-header">
                                      
                                    </p>

                                    <form id="formDoctor" method="POST">
                                        <div>
                                            <div id="errorDoctor">

                                            </div>
                                            <section>
                                                <div class="form-group-lg clearfix">
                                                    <label class="control-label " for="userName">Full name *</label>
                                                    <div class="">
                                                        <input class="form-control required" id="doctor_name" name="doctor_name" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="control-label " for="password"> Email *</label>
                                                    <div class="">
                                                        <input id="doctor_email" name="doctor_email" type="text" class="required form-control" required>

                                                    </div>
                                                </div>

                                                <div class="form-group clearfix">
                                                    <label class="control-label " for="confirm">Phone Number *</label>
                                                    <div class="">
                                                        <input id="doctor_phone" name="doctor_phone" type="number" class="required form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">

                                                    <label class="control-label" for="name"> ID No *</label>
                                                    <div class="">
                                                        <input id="doctor_id_no" name="doctor_id_no" type="text" class="required form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="gender">Gender</label>
                                                    <br>
                                                    <br>
                                                    <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                    <label class="radio-inline" style="color:#000;">
                                                     <input type="radio" name="doctor_gender" value="male" checked>  Male
                                                     </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <label class="radio-inline" style="color:#000;">
                                                     <input type="radio" value="female" name="doctor_gender">  Female
                                                     </label>
                                                    </div>
                                                    </div>
                                                     </div>
                                                </div>

                                                <div class="form-group clearfix">
                                                    <label class="control-label " for="email">Specialization *</label>
                                                    <div class="">
                                                        <input id="specialization" name="specialization" type="text" class="required form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-0 text-center">
                                                    <button class="btn btn-gradient btn-block" type="submit" id="dcotorButton"> Create Account  </button>
                                                </div> 
                                                   
                                            </section>
                                           
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- end row -->
                              <!-- Doctor's List -->
                            <div id="doctors-list" class="row profile">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                        <h4 class="header-title"><b>Doctor's List</b></h4>
                                        <p class="sub-header">
                                        </p>
    
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>ID No</th>
                                                <th>Gender</th>
                                                <th>Specialization</th>
                                               
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            
                            </div>
                            <!-- End  -->
     <!-- Doctor's List -->
     <div id="patients-list" class="row profile">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="header-title"><b>Patient's List</b></h4>
                <p class="sub-header">
                </p>

                <table id="patients-datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                   
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>
    <!-- End  -->

    <!-- Appointment's List -->
    <div id="appointments-list" class="row profile">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="header-title"><b>Appointments List</b></h4>
                <p class="sub-header">
                </p>

                <table id="appointments-datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient</th>
                        <th>Date </th>
                        <th>Time </th>
                        <th>Service</th>
                        <th>Description</th>
                        <th>Action</th>
                        
                    </tr>
                    </thead>


                    <tbody>
                   
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>
    <!-- End  -->

     <!-- Appointment's List -->
     <div id="records-list" class="row profile">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="header-title"><b>Records List</b></h4>
                <p class="sub-header">
                </p>

                <table id="records-datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient</th>
                        <th>Signs </th>
                        <th>Lab Results </th>
                        <th>Precriptions</th>
                        <th>Disease</th>
                    </tr>
                    </thead>


                    <tbody>
                   
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>
    <!-- End  -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                               2021 &copy; Designed & Developed By <a href="#">ABDIFATHI</a>
                            </div>
            
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h5 class="m-0 text-white">Settings</h5>
            </div>
            <div class="slimscroll-menu">
                <hr class="mt-0">
                <h5 class="pl-3">Basic Settings</h5>
                <hr class="mb-0" />


                <div class="p-3">
                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                        <label class="custom-control-label" for="customCheck1">Notifications</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="customCheck2" checked>
                        <label class="custom-control-label" for="customCheck2">API Access</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3">Auto Updates</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="customCheck4" checked>
                        <label class="custom-control-label" for="customCheck4">Online Status</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck5">
                        <label class="custom-control-label" for="customCheck5">Auto Payout</label>
                    </div>
                </div>

                <!-- Messages -->
                <hr class="mt-0" />
                <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">24</span></h5>
                <hr class="mb-0" />
                <div class="p-3">
                    <div class="inbox-widget">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-1.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);">Chadengle</a></p>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                            <p class="inbox-item-date">13:40 PM</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);">Tomaslau</a></p>
                            <p class="inbox-item-text">I've finished it! See you so...</p>
                            <p class="inbox-item-date">13:34 PM</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);">Stillnotdavid</a></p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                            <p class="inbox-item-date">13:17 PM</p>
                        </div>

                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);">Kurafire</a></p>
                            <p class="inbox-item-text">Nice to meet you</p>
                            <p class="inbox-item-date">12:20 PM</p>

                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);">Shahedk</a></p>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                            <p class="inbox-item-date">10:15 AM</p>

                        </div>
                    </div> <!-- end inbox-widget -->
                </div> <!-- end .p-3-->

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
<!-- Jquery  -->
<script src="../js/jquery-2.1.4.min.js"> </script>
<!-- End -->
 <!-- Vendor js -->
 <script src="assets/js/vendor.min.js"></script>
  <!-- Required datatable js -->
  <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Buttons examples -->
  <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
  <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
  <script src="assets/libs/jszip/jszip.min.js"></script>
  <script src="assets/libs/pdfmake/pdfmake.min.js"></script>
  <script src="assets/libs/pdfmake/vfs_fonts.js"></script>
  <script src="assets/libs/datatables/buttons.html5.min.js"></script>
  <script src="assets/libs/datatables/buttons.print.min.js"></script>

  <!-- Responsive examples -->
  <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
  <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>

  <!-- Datatables init -->
  <script src="assets/js/pages/datatables.init.js"></script>
<script src="../js/sweetalert.min.js"></script>
       

         <!-- Chart JS -->
         <script src="assets/libs/chart-js/Chart.bundle.min.js"></script>

          <!-- Init js -->
        <!-- <script src="assets/js/pages/dashboard.init.js"></script> -->

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        <script>
             function GetPatientDetails(id) {
    // Add User ID to the hidden field
    //alert(id);
   
    $("#hidden_user_id").val(id);
    $.post("patient_details.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assign existing values to the modal popup fields
            $("#patient-name").html(user.full_name);
            // $("#ref_noU").val(user.user_id);
            //$("#genderU").append(" : "+user.gender);
          
             //alert("YOU ARE GOOD TO GO");
              // Open modal popup
    $("#patient_modal").modal("show");
        } 
    );
   
}

function GetPatientSms(id) {
   
    $.post("fetch_patient.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            $("#patient-sms-name").html(user.full_name);
            $("#hidden_sms_user_id").val(user.user_id);
            $("#hidden_sms_user_name").val(user.full_name);
            $("#hidden_sms_user_phone").val(user.phone_no);
            $("#sms_modal").modal("show");
        } 
    );
   
}



            $(document).ready(function(){
                $("#dashboard").fadeIn();
                $('#side-menu li ul li  a').click(function(e){
                      //  alert("You Are Good To Go");
                        //$('#img').fadeIn(1000);
                      e.preventDefault();
                      //remove the active state from all links
                      $('#side-menu li ul li  a').removeClass("active");
                      //add the active state to the clicked link
                      $(this).addClass("active");
                      //fade out the current container
                      $('.profile').fadeOut(600,function(){
                        //fade in the clicked container
                        $('#' + profileID).fadeIn(600);
                        //$('#img').fadeOut(1000);
                      });
                      var profileID = $(this).attr("data-id");
                      
                    });

                    
				 $("#formDoctor").on('submit',(function(e)
				{
					//alert("You Are Good To Go");
					e.preventDefault();
					$.ajax({
						url:"add_doctor.php",
						type:"POST",
						data:new FormData(this),
						contentType:false,
						cache:false,
						processData:false,
						beforeSend: function(){	
				$("#errorDoctor").fadeOut();
				$("#doctorButton").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Adding Doctor ...');
			},
		success : function(response){						
				if(response=="ok"){									
				 swal("Doctor,Successfully Added", {
                              button: "OK",
                            });
				 $("#doctorButton").html('Create Account');
                 document.getElementById("formDoctor").reset();
                 $('#datatable-buttons').DataTable().ajax.reload();
				}				
				else {									
					$("#errorDoctor").fadeIn(1000, function(){						
						$("#errorDoctor").html('&nbsp; '+response+' !');
						$("#driverButton").html('Create Account');
					});
				}
			}
				});
				}));


                //Add New Record

                $("#formRecord").on('submit',(function(e)
                {
                //alert("You Are Good To Go");
                e.preventDefault();
                $.ajax({
                url:"add_record.php",
                type:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                beforeSend: function(){	
                $("#error-data1u").fadeOut();
                $("#buttonRecord").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Adding Record ...');
                },
                success : function(response){						
                if(response=="ok"){									
                swal({
                title:"Great",
                text: "Record Successfully Added",
                icon:"success",
                buuton:"OK",
                });

                $("#formRecord").trigger('reset');
                $("#patient_modal").modal('hide');

                $("#buttonRecord").html('ADD RECORD');
                }				
                else {									
                $("#error-data1u").fadeIn(1000, function(){						
                $("#error-data1u").html('&nbsp; '+response+' !');
                $("#buttonRecord").html('ADD RECORD');
                });
                }
                }
                });
                }));
                                //Add New Record

                $("#formSms").on('submit',(function(e)
                {
                //alert("You Are Good To Go");
                e.preventDefault();
                $.ajax({
                url:"send_sms.php",
                type:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                beforeSend: function(){	
                $("#error-sms").fadeOut();
                $("#buttonSms").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Sending Message ...');
                },
                success : function(response){						
                if(response=="ok"){									
                swal({
                title:"Success",
                text: "Sms Successfully Sent",
                icon:"success",
                buuton:"OK",
                });

                $("#formSms").trigger('reset');
                $("#sms_modal").modal('hide');

                $("#buttonSms").html('Send Sms');
                }				
                else {									
                $("#error-sms").fadeIn(1000, function(){						
                $("#error-sms").html('&nbsp; '+response+' !');
                $("#buttonSms").html('Send Sms');
                });
                }
                }
                });
                }));
            })
        </script>
        
    </body>

</html>