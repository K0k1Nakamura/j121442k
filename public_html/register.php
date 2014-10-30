<?php
include 'ChromePhp.php';
session_start();
include("header.html");
print "<div style='height: 51px'></div>";
?>
<?php
if(!isset($_SESSION["login_name"])){
	?>

	<h2>登録</h2>
	<form method="POST" action="registerCheck.php">
		ログイン名<input type="text" name="login_name"><br>
		password<input type="text" name="pwd"><br>
		<input type="submit" value="登録">
	</form>
	<?php
}else{
	?>
	<h2>ろぐいんしてますよ</h2>	
	<?php
}
?>
<?php
include("footer.html");
ChromePhp::log($_SESSION);
