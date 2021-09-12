<?php
require('../db_config.php');
$sql = $DB_con->prepare("SELECT * FROM users WHERE role='doctor' ORDER BY user_id DESC");
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
    $sub_array[] = $row['full_name'];
    $sub_array[] = $row['email'];
    $sub_array[] = $row['phone_no'];
    $sub_array[] = $row['id_no'];
    $sub_array[] = $row['gender'];
    $sub_array[] = $row['specialization'];
    // $sub_array[] = '<a href="#" onclick="GetUser('. $row['user_id'] .')">
    // <i class="fa fa-pencil-alt"></i></a>
    // <a href="#" onclick="RemoveUser('. $row['user_id'] .')">
    // <i class="fa fa-trash"></i></a>';
  
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