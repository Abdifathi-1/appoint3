<?php
require('../db_config.php');
$sql = $DB_con->prepare("SELECT records_history.*,users.* FROM records_history
JOIN users ON users.user_id = records_history.ref ORDER BY records_history.record_id DESC");
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
    $sub_array[] = $row['signs'];
    $sub_array[] = $row['lab_results'];
    $sub_array[] = $row['prescriptions'];
    $sub_array[] = $row['disease'];

  
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