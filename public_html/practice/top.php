<?php
include 'ChromePhp.php';
session_start();
?>

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	</head>
	<body>

<?php
if(!isset($_SESSION["login_name"])){
?>

		<h2>登録</h2>
		<form method="POST" action="regist.php">
			ログイン名<input type="text" name="login_name"><br>
			password<input type="text" name="pwd"><br>
			<input type="submit" value="登録">
		</form>
		<h2>ログイン</h2>
		<form method="POST" action="login.php">
			ログイン名<input type="text" name="login_name"><br>
			password<input type="text" name="pwd"><br>
			<input type="submit" value="ログイン">
		</form>

<?php
}else{
?>
		<h2>ようこそ！</h2>
		<a href="logout.php">ログアウト</a>
<?php
}
ChromePhp::log('セッション');
ChromePhp::log($_SESSION);
?>		
	</body>
</html>

