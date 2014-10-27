<?php
$login_name = $_POST["login_name"];
$pwd = $_POST["pwd"];

$md5pwd = md5($pwd);

$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
$query = "SELECT * FROM member WHERE login_name=$1 AND pwd=$2";
$result = pg_prepare($conn, "my_query", $query);
$result = pg_execute($conn, "my_query", array("$login_name", "$md5pwd"));

if(pg_num_rows($result) == 0){
	$query_regist = "INSERT INTO member (login_name,pwd) VALUES ($1,$2)";

	$result = pg_prepare($conn, "query_regist", $query_regist);
	$result = pg_execute($conn, "query_regist", array($login_name, $md5pwd));

	print "登録完了！<br>";
}else{
	print "すでにそのログイン名は使われています。<br>";	
}
