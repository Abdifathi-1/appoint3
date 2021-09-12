<?php
require_once('../db_config.php');
if(isset($_POST['id']))
{
	$patient_id = $_POST['id'];
    $stmt2 = $DB_con->prepare("SELECT * FROM appointment WHERE appointment_id=:id");
	$stmt2->bindParam(":id",$patient_id);
	$stmt2->execute();
    $rw=$stmt2->fetch(PDO::FETCH_ASSOC);

	$stmt = $DB_con->prepare("SELECT * FROM users WHERE email=:id");
	$stmt->bindParam(":id",$rw['patient_id']);
	$stmt->execute();
	$object = json_encode($stmt->fetch(PDO::FETCH_ASSOC));
	echo $object;
}
?>