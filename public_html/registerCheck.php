<?php
include 'ChromePhp.php';
session_start();
include("header.html");
print "<div style='height: 51px'></div>";

if(!isset($_SESSION["login_name"])){

	$login_name = $_POST["login_name"];
	$address = $_POST["address"];
	$pwd = $_POST["pwd"];
	$pwd2 = $_POST["pwd2"];
	$grade = $_POST["grade"];
	$university = $_POST["university"];
	$faculty = $_POST["faculty"];
	$department = $_POST["department"];

	$md5pwd = md5($pwd);

	$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");

	$query_name = "SELECT * FROM member WHERE login_name=$1";
	$result_name = pg_prepare($conn, "", $query_name);
	$result_name = pg_execute($conn, "", array($login_name,$address,$pwd,$grade,$university,$faculty,$department));

	if(pg_num_rows($result_name) != 0){

		print "すでにそのログイン名は使われています。<br>";	
		print "<a href=\"index.php\">TOPへ</a>";

	}else{
	
	// TODO: パスワードの空値にたいしてのなんらか
	//　現状、暗号化のせいで空値もパスワードとして合法になっている.
	// あと、メンバーの空値もsqlがnot　nullじゃないから通る

		$query_regist = "INSERT INTO member (login_name,pwd) VALUES ($1,$2)";
		$result = pg_prepare($conn, "query_regist", $query_regist);
		$result = pg_execute($conn, "query_regist", array($login_name, $md5pwd));

		$_SESSION["login_name"] = $login_name;

		print "登録完了！".htmlspecialchars($_SESSION["login_name"])."さん！<br>";
		print "<a href=\"index.php\">TOPへ</a>";
	}
}else{
	print "ログインしてるで<br>";
	print "<a href=\"index.php\">TOPへ</a>";
}
?>
<?php
ChromePhp::log('セッション');
ChromePhp::log($_SESSION);
include("footer.html");
ChromePhp::log($_SESSION);
