<?php
require_once 'db_config.php';

if($_SESSION['user_session']!="")
{
	$user->redirect('appointment.php');
}
if(isset($_GET['logout']) && $_GET['logout']=="true")
{
	$user->logout();
	$user->redirect('admin/pages-login.html');
}
if(!isset($_SESSION['user_session']))
{
	$user->redirect('admin/pages-login.html');
}
?>
