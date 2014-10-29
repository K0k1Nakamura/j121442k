<?
include 'ChromePhp.php';
session_start();

if(isset($_SESSION["login_name"])){
	$name = $_POST["name"];
	$price = $_POST["price"];

	if($name == "" || $price == "") {

		print "教科書名、価格を入力してください。<br>";
		print "<a href=\"top.php\">TOPへ</a>";
	
	}else if(!is_numeric($price)){
		
		print "価格は数値を入力してください<br>";
		print "<a href=\"top.php\">TOPへ</a>";

	}else{ 
		$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
		$query_display = "INSERT INTO textbook (name,price) VALUES ($1,$2)";
		$result = pg_prepare($conn, "query_display", $query_display);
		$result = pg_execute($conn, "query_display", array($name, $price));

		print "登録完了！".htmlspecialchars($_SESSION["login_name"])."さん！<br>";
		print "<a href=\"top.php\">TOPへ</a>";
	}

}else{
	print "ログインしてください<br>";
	print "<a href=\"top.php\">TOPへ</a>";
}