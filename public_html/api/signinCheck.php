<?php
include '../ChromePhp.php';
session_start();

if(isset($_SESSION["login_name"])){
	header("Location: index.php");
}else{
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

	if(pg_num_rows($result_name) == 0){
		?>
		<form action="../signin.php" method="post" name="postForm">
			<input type="hidden" name="message" value="ユーザー名が違います。">
		</form>
		<script>
			window.onload = function(){
				document.postForm.submit();
			}
		</script>
		<?php  
	}else if(pg_num_rows($result_pwd) == 0){
		?>
		<form action="../signin.php" method="post" name="postForm">
			<input type="hidden" name="message" value="パスワードが違います。">
		</form>
		<script>
			window.onload = function(){
				document.postForm.submit();
			}
		</script>
		<?php  
	}else{
		$row = pg_fetch_assoc($result_pwd, 0);
		$_SESSION["login_name"] = $row['login_name'];
		header("Location: ../mypage.php");
	}
}
