<?php
require_once('db_config.php');
$user_id = $_SESSION['user_session'];
if(isset($_POST['doctor']))
{
    $doctor = $_POST['doctor'];
    $stmt=$DB_con->prepare("SELECT * FROM messages WHERE sent_to=:sent_to 
    AND sent_by=:sent_by ORDER BY message_id DESC");
    $stmt->bindParam(":sent_to",$user_id);
    $stmt->bindParam(":sent_by",$doctor);
    $stmt->execute();
    $received_messages=$stmt->fetchAll();
    $stmt2=$DB_con->prepare("SELECT * FROM messages WHERE sent_to=:sent_to 
    AND sent_by=:sent_by ORDER BY message_id DESC");
    $stmt2->bindParam(":sent_to",$doctor);
    $stmt2->bindParam(":sent_by",$user_id);
    $stmt2->execute();
    $sent_messages=$stmt2->fetchAll();

    echo json_encode($received_messages);
}
else
{
  
    $stmt=$DB_con->prepare("SELECT * FROM messages WHERE sent_by=:sent_by ORDER BY message_id DESC");
    $stmt->bindParam(":sent_by",$doctor);
    $stmt->execute();
    $messages=$stmt->fetchAll();
    echo json_encode($messages);
}
    

?>