<?php
require_once('db_config.php');
 $error = array();
 $user_id = $_SESSION['user_session'];
if(isset($_POST['doctor_id']) && isset($_POST['msg']))
   {

  $doctor_id = $user->testinput($_POST['doctor_id']);
  $msg = $user->testinput($_POST['msg']);
 
  

  $tableName= "messages";

  $userData = array(
    "sent_to" => $doctor_id,
    "sent_by" => $user_id,
    "message" => $msg,
  );
  
  
  if(!empty($doctor_id) && !empty($msg))
  {
   
    
    if(strlen($msg)<2)
    {
      $error[] ="Message Too Short";
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