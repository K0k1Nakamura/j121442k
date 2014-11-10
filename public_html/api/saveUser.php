<?php 
session_start();

$login_name = $_POST["login_name"];
$address = $_POST["address"];
$pwd = $_POST["pwd"];
$grade = $_POST["grade"];
$university = $_POST["university"];
$faculty = $_POST["faculty"];
$department = $_POST["department"];

$pwd = md5($pwd);

$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");

$query_regist = "INSERT INTO member (login_name,address,pwd,grade,university,faculty,department) VALUES ($1,$2,$3,$4,$5,$6,$7)";
$result_name = pg_prepare($conn, "", $query_regist);
$result_name = pg_execute($conn, "", array($login_name,$address,$pwd,$grade,$university,$faculty,$department));

$_SESSION["login_name"] = $login_name;

header("Location: ../resisterLanding.php");