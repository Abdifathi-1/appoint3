<?php
require('../db_config.php');
$sql = $DB_con->prepare("SELECT appointment.*,users.* FROM appointment
JOIN users ON users.email = appointment.patient_id ORDER BY appointment.appointment_id DESC");
$sql->execute();
$total_rows = $sql->rowCount();
$results = $sql->fetchAll();
$output = array();
$data = array();
$number = 1;
foreach($results as $row)
{
   
    $sub_array = array();
    $sub_array[] = $number;
    $sub_array[] = "Name :  " .  $row['full_name'] . "<br> " . "Email :  " .  $row['email'] . "<br> " . "Phone :  " .  $row['phone_no'] ;
    $sub_array[] = $row['appointment_date'];
    $sub_array[] = $row['appointment_time'];
    $sub_array[] = $row['service'];
    $sub_array[] = $row['short_desc'];
    $sub_array[] = '<a href="#" onclick="GetPatientSms('. $row['user_id'] .')">
    <i class="fa fa-paper-plane"></i></a>';
     // <a href="#" onclick="RemoveUser('. $row['user_id'] .')">
    // <i class="fa fa-trash"></i></a>
  
    $data[] = $sub_array;
    $number++;
}
$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => intval($total_rows),
    "recordsFiltered" => intval($total_rows),
    "data" => $data
);
echo json_encode($output);
?>