<?php
require_once("db_config.php");
if(isset($_POST['username']) && isset($_POST['pass']))
{
    $error = array();
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    if(empty($username) && empty($pass))
    {
        $error[]="You must Provide both email and  Password";

    }
    else
    {
        if(strlen($username) < 3)
        {
            $error[] = "Email/Username Too Short";
        }
        else if(is_numeric($username))
        {
            $error[] = "Invalid Email/Username";
        }
        else if($user->login($username,$pass))
        {
            echo "OK";
        }
        else
        {
            $error[] = "Wrong Username OR Password";
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
 
        <?php echo $err ; ?>
    
    </div>
    </div>
    <?php
}
?>
