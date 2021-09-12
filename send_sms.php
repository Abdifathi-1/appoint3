<?php
use AfricasTalking\SDK\AfricasTalking;
require '../vendor/autoload.php';
require_once('../db_config.php');
$user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
    $username = 'first'; // use 'sandbox' for development in the test environment
    $apiKey   = '8418597fc7bbd6a1238ae0ce49819ac18669bd2ee5e0e46c6392912e5e1aac24'; // use your sandbox app API key for development in the test environment
    $AT       = new AfricasTalking($username, $apiKey);

    // Get one of the services
    $sms      = $AT->sms();
    if(isset($_POST['hidden_sms_user_id']) && isset($_POST['message_sms']))
{
    $error = array();
    $user_sms_id=$user->testinput($_POST['hidden_sms_user_id']);
    $user_sms_name=$user->testinput($_POST['hidden_sms_user_name']);
    $user_sms_phone=$user->testinput($_POST['hidden_sms_user_phone']);
    $message = $user->testinput($_POST['message_sms']);
 
    $hidden = "false";
    if(empty($message) && empty($user_sms_name) &&
       empty($user_sms_phone))
    {
        $error[]="You must Provide All Fields First";
        
    }
    else
    {
        if(strlen($message) < 3)
        {
            $error[] = "Message Name Too Short";
        }  
		else if(strlen($message) > 3) 
		{
            $number = "+254" . "727428723";
            $result   = $sms->send([
                'to'      => $number,
                'message' => $message
            ]);
            print_r($result);
			
		}
		else
		{
			?>
			 <div class="animated swing alert alert-danger alert-dismissal">
<?php
echo "Error Sending Sms Try Again Please";
?>
</div>
			 <?php
		}
	
             
        
		
         
    }
}
else
{
    $error[]="Not All Fields Are Set Try Again Please";
    
}
foreach($error as $err)
{
    ?>
    <div class="row">
        <div class="col-sm-12 col-lg-12 col-md-12">
    <div style="width: auto;" class="alert alert-danger alert-dismissal">
        <?php echo $err ; ?>
    </div>
    </div>
    </div>
    <?php
}
?>