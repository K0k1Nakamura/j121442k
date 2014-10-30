<?php
include 'ChromePhp.php';
session_start();
include("header.html");
print "<div style='height: 51px'></div>";


if(!isset($_SESSION["login_name"])){


	$login_name = $_POST["login_name"];
	$pwd = $_POST["pwd"];
	$md5pwd = md5($pwd);


	$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
	$query_name = "SELECT * FROM member WHERE login_name=$1";
	$result_name = pg_prepare($conn, "my_query_na", $query_name);
	$result_name = pg_execute($conn, "my_query_na", array("$login_name"));

	$query_pwd = "SELECT * FROM member WHERE login_name=$1 AND pwd=$2";
	$result_pwd = pg_prepare($conn, "my_query_pwd", $query_pwd);
	$result_pwd = pg_execute($conn, "my_query_pwd", array("$login_name", "$md5pwd"));

	ChromePhp::log($result_pwd);

	if(pg_num_rows($result_name) == 0){
		print "そんなゆーざーいない<br>";
		print "<a href=\"index.php\">TOPへ</a>";
	}else if(pg_num_rows($result_pwd) == 0){
		print "passがちがう<br>";
		print "<a href=\"index.php\">TOPへ</a>";
	}else{
		$row = pg_fetch_assoc($result_pwd, 0);
		print htmlspecialchars($row["login_name"])."さん、ようこそ<br>";
		print "<a href=\"index.php\">TOPへ</a>";
		$_SESSION["login_name"] = $row['login_name'];
	}


}else{


	print "ログインしてるで<br>";
}



ChromePhp::log('セッション');
ChromePhp::log($_SESSION);

include("footer.html");
ChromePhp::log($_SESSION);
