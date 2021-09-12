<?php
require_once('../db_config.php');
$user_id = $_SESSION['user_session'];
    $stmt=$DB_con->prepare("SELECT * FROM users WHERE email =:ema");
    $stmt->bindParam(":ema",$user_id);
    $stmt->execute();
    $results=$stmt->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['signs'])
   && isset($_POST['lab-results']) && isset($_POST['presp']) &&
   isset($_POST['disease']))
{
    $error = array();
    $ref_no=$user->testinput($_POST['hidden_user_id']);
    
    
    $signs = $user->testinput($_POST['signs']);
    $result = $user->testinput($_POST['lab-results']);
    $presp = $user->testinput($_POST['presp']);
    $disease = $user->testinput($_POST['disease']);
    $hidden = "false";
    if(empty($signs) && empty($result) &&
       empty($presp) && empty($disease))
    {
        $error[]="You must Provide All Fields First";
        
    }
    else
    {
        if(strlen($disease) < 3)
        {
            $error[] = "Disease Name Too Short";
        }
        elseif(strlen($signs)<3)
        {
           $error[] ="Sign and Symptoms Too Short";     
        }
        elseif(strlen($result)<3)
        {
           $error[] ="Sign and Symptoms Too Short";     
        }
        elseif(strlen($presp)<3)
        {
           $error[] ="Sign and Symptoms Too Short";     
        }
        
		else if($user->add_record($ref_no,$signs,$result,$presp,$disease,$results['id_no'],$hidden))
		{
			echo "ok";
			
		}
		else
		{
			?>
			 <div class="animated swing alert alert-danger alert-dismissal">
<?php
echo "Error Adding Records Try Again Please";
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