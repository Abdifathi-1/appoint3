<?php
require_once('db_config.php');

    $stmt=$DB_con->prepare("SELECT * FROM users WHERE role='doctor'");
    $stmt->execute();
    $cases=$stmt->fetchAll();
    echo json_encode($cases);

?>