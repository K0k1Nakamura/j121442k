<?php
include 'ChromePhp.php';
session_start();
include("header.html"); 
print "<div style='height: 51px'></div>";

$name = $_GET['name'];
$author = $_GET['author'];
$price = $_GET['price'];
$comment = $_GET['comment'];
$pic = $_FILES['pic'];
$class = $_GET['class_name'];
$university = $_GET['university'];
$faculty = $_GET['faculty'];
$department = $_GET['department'];
$grade = $_GET['grade'];
$delivery_method = $_GET['delivery_method'];
$seller = $_SESSION['login_name'];
$stock = 1;
