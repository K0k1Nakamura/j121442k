<?php
include '../ChromePhp.php';
session_start();
if(isset($_SESSION["login_name"])){
	session_destroy();
	header("Location: ../index.php");
}


