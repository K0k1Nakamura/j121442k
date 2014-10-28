<?php
include 'ChromePhp.php';
session_start();

if(!isset($_SESSION["login_name"])){

$login_name = $_POST["login_name"];
$pwd = $_POST["pwd"];
$md5pwd = md5($pwd);

$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");

$query_name = "SELECT * FROM member WHERE login_name=$1";
$result_name = pg_prepare($conn, "my_query", $query_name);
$result_name = pg_execute($conn, "my_query", array($login_name));

if(pg_num_rows($result_name) != 0){

	print "すでにそのログイン名は使われています。<br>";	
	print "<a href=\"top.php\">TOPへ</a>";

}else{
	// TODO: パスワードの空値にたいしてのなんらか
	//　現状、暗号化のせいで空値もパスワードとして合法になっている。		
	$query_regist = "INSERT INTO member (login_name,pwd) VALUES ($1,$2)";
	$result = pg_prepare($conn, "query_regist", $query_regist);
	$result = pg_execute($conn, "query_regist", array($login_name, $md5pwd));

	$_SESSION["login_name"] = $login_name;

	print "登録完了！".htmlspecialchars($_SESSION["login_name"])."さん！<br>";
	print "<a href=\"top.php\">TOPへ</a>";

}
}else{
	print "ログインしてるで<br>";
	print "<a href=\"top.php\">TOPへ</a>";
}
ChromePhp::log('セッション');
ChromePhp::log($_SESSION);
