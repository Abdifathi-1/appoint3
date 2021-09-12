<?php
require_once('db_config.php');
if(isset($_POST['fullname']) && isset($_POST['email'])
 && isset($_POST['phone_number']) && isset($_POST['gender']) &&
 isset($_POST['password']))
 {
    
     $errors = '';
    if(!empty($_POST['fullname']) && !empty($_POST['email'])
    && !empty($_POST['phone_number']) && !empty($_POST['gender']) &&
    !empty($_POST['password']))
    {
        $tableName = "users";
        $name = $user->testinput($_POST['fullname']);
        $email = $user->testinput($_POST['email']);
        $phone_number = $user->testinput($_POST['phone_number']);
        $gender = $user->testinput($_POST['gender']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $userData = array(
            "full_name" => $name,
            "email" => $email,
            "phone_no" => $phone_number,
            "gender" => $gender,
            "role" => "patient",
            "password" => $password
        );
        $conditions = array(
            'email' => $email,
            'phone_no' => $phone_number,
        );
        
        if(!ctype_alpha(str_replace(' ','',$name)))
        {
            $errors = "Name must contain letters and space only";
        }
        else if(!is_numeric($phone_number))
        {
            $errors =  "Phone Number Can Only Contain Numbers";
        }
        else if($user->checkRow($tableName,$conditions)>0)
        {
            $errors = "Account with similar Email or Mobile No Already Exists";
        }
        else
        {
            if($user->insert($tableName,$userData))
            {
                echo "ok";
            }
            else
            {
                $errors = "Error Creating Account Please Try Again";
            }
        }

    }
    else
    {
      $errors='Fill In All The Fields First';
    }

 }
 else
 {
     echo "Not All Fields Are Set";
 }
?>
