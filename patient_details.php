<?php
require_once('../db_config.php');
if(isset($_POST['id']))
{
	$patient_id = $_POST['id'];
	$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:id");
	$stmt->bindParam(":id",$patient_id);
	$stmt->execute();
	$object = json_encode($stmt->fetch(PDO::FETCH_ASSOC));
	echo $object;
}
?>