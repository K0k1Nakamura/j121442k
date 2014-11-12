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
		<h2>出品</h2>
		<form method="POST" action="display.php">
			教科書名<input type="text" name="name"><br>
			価格<input type="text" name="price"><br>
			<input type="submit" value="出品">	
		</form>
		<?php
	}
	ChromePhp::log('セッション');
	ChromePhp::log($_SESSION);
	?>		
	<h2>検索</h2>
	<h6>教科書名</h6><input type="text" name="textbook" id="textbook_name"><br>
	<input type="submit" id="search" value="検索"><br>
	<div id="result"></div>


</body>
</html>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
	$(function(){
		$('#search').click(function() {
			$.get('search.php', {
				name: $('#textbook_name').val()
			})
			.done(function(res) {
				document.getElementById("result").innerHTML="";
				
				if(res == null) {
					document.getElementById("result").innerHTML="There is no textbook.";
				}else{
					$('#result').append('<table id="text_table"></table>');
					$('#text_table').append('<tr><th>id</th><th>名前</th></tr>');
					for (i = 0; i < res.length; i++) {
						$('#text_table').append('<tr><td>'+res[i].id+'</td><td>'+res[i].name+'</td></tr>');	
					}
				}
			})
			.fail(function(res) {
				console.log(error);
			});
		});
	});

</script>

