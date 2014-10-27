<?php
session_start();
$login_name = $_POST["login_name"];
$pwd = $_POST["pwd"];

$md5pwd = md5($pwd);

$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
$query = "SELECT * FROM member WHERE login_name=$1 AND pwd=$2";
$result = pg_prepare($conn, "my_query", $query);

$result = pg_execute($conn, "my_query", array("$login_name", "$md5pwd"));

if(pg_num_rows($result) == 1){
	$row = pg_fetch_assoc($result, 0);
	print $row["login_name"]."さん、ようこそ<br>";
	print "<a href=\"top.php\">TOPへ</a>";

	$_SESSION["login_name"] = $row['login_name'];
}else{
	print "error";
}
