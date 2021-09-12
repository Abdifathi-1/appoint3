<?php
require_once('db_config.php');
 $error = array();
 $user_id = $_SESSION['user_session'];
if(isset($_POST['appointment_date']) && isset($_POST['appointment_time']) &&
   isset($_POST['service']) && isset($_POST['address']) && isset($_POST['comment']) )
   {

  $appointment_date = $user->testinput($_POST['appointment_date']);
  $appointment_time = $user->testinput($_POST['appointment_time']);
  $service = $user->testinput($_POST['service']);
  $address = $user->testinput($_POST['address']);
  $comment = $user->testinput($_POST['comment']);
  

  $tableName= "appointment";

  $userData = array(
    "patient_id" => $user_id,
    "address" => $address,
    "appointment_date" => $appointment_date,
    "appointment_time" => $appointment_time,
    "service" => $service,
    "short_desc" => $comment
  );
  
  
  if(!empty($appointment_date) && !empty($appointment_time) && !empty($address) &&
   !empty($comment))
  {
   
    
    if(strlen($comment)<7)
    {
      $error[] ="Description Too Short";
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