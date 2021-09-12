<?php
require_once('../db_config.php');
 $error = array();
if(isset($_POST['doctor_name']) && isset($_POST['doctor_id_no']) &&
   isset($_POST['doctor_phone']))
{
  $doctor_name = $user->testinput($_POST['doctor_name']);
  $doctor_id_no = $user->testinput($_POST['doctor_id_no']);
  $doctor_phone = $user->testinput($_POST['doctor_phone']);
  $doctor_email = $user->testinput($_POST['doctor_email']);
  $doctor_gender = $user->testinput($_POST['doctor_gender']);
  $specialization = $user->testinput($_POST['specialization']);

  $tableName= "users";
$db_pass = password_hash($doctor_id_no, PASSWORD_DEFAULT);
  $userData = array(
    "full_name" => $doctor_name,
    "id_no" => $doctor_id_no,
    "phone_no" => $doctor_phone,
    "email" => $doctor_email,
    "gender" => $doctor_gender,
    "specialization" => $specialization,
    "role" => "doctor",
    "password" => $db_pass
  );
  $conditions = array(
    "id_no" => $doctor_id_no,
    "phone_no" => $doctor_phone,
    "email" => $doctor_email
  );
  
  if(!empty($doctor_name) && !empty($doctor_id_no) &&
   !empty($doctor_phone) && !empty($doctor_email) &&
   !empty($doctor_gender) && !empty($specialization) )
  {
   
    
    if(!ctype_alpha(str_replace(' ','',$doctor_name)))
    {
        $error[]="Invalid doctor Name,can only contain alphabetic characters";
    }
    else if(!is_numeric($doctor_id_no))
    {
      $error[] = "Invalid ID NO";
    }
    else if(strlen($doctor_id_no)>8)
    {
      $error[] = "doctor ID Number Length Should Not Exceed 8";
    }
    else if(strlen($doctor_id_no)<8)
    {
      $error[] = "doctor ID Number Length too short";
    }
    else if(!is_numeric($doctor_phone))
    {
      $error[] = "Invalid Phone No";
    }
    else if(strlen($doctor_phone)>10)
    {
      $error[] ="Phone Number Length Should Not Exceed 10";
    }
    else if($user->checkRow($tableName,$conditions))
    {
      $errors[] = "ID Number,Phone Number OR Email Already Exists";
    }
    else if($user->insert($tableName,$userData))
    {
      echo "ok";
    }
    
    
    
    
  }
  else
  {
     $error[]="Fill in All The Fields First";
  }
}
else
{
    ?>
    <div class="alert alert-danger w3-padding-16 w3-win-phone-red alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong class="w3-text-red ">Not All Fields Are Set Set Them First!</strong> 
</div>
    <?php
}
    foreach($error as $err)
      {
        ?>
         <div class="alert alert-danger  w3-padding-16 w3-win-phone-red alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?php echo $err ;?></strong> 
</div>
        <?php
      
    }
?>