<?php
include 'ChromePhp.php';
session_start();

$login_name = $_POST["login_name"];
$address = $_POST["address"];
$pwd = $_POST["pwd"];
$pwd2 = $_POST["pwd2"];
$grade = $_POST["grade"];
$university = $_POST["university"];
$faculty = $department = "";
$link = $_POST['facebook_link'];

if (isset($_POST['faculty'])) {
	$faculty = $_POST['faculty'];
}
if (isset($_POST['department'])) {
	$department = $_POST['department'];
}
if ($login_name == "" || $pwd == "" || $pwd2 == "" || $pwd != $pwd2 || !preg_match( "/[\@-\~]/" , $pwd) || mb_strlen($pwd) < 6) {
	?>
	<form action="register.php" method="post" name="postForm">
		<input type="hidden" name="message" value="入力内容を確認して下さい">
	</form>
	<script>
	window.onload = function(){
		document.postForm.submit();
	}
	</script>
	<?php 
} else {
	include("view/topCSS.html");
	include("view/header1.html");
	print "<div style='height: 51px'></div>";
	?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" align="center">新規登録</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-3 col-md-2"></div>
		<div class="col-lg-6 col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					Please input.	
				</div>
				<div class="panel-body">
					<div class="row">
						<form role="form" enctype="multipart/form-data" method="post" action="api/saveUser.php">
							<div class="col-lg-12">
								<div class="form-group">
									<label>ユーザー名</label>
									<p name="login_name"><?php print $login_name ?></p>
								</div>

								<div class="form-group">
									<label>メアド</label>
									<p name="address"><?php print $address ?></p>
								</div>

								<div class="form-group">
									<label>パスワード</label>
									<p>非表示</p>
								</div>

								<div class="form-group">
									<label>学年</label>	
									<p name="grade"><?php print $grade ?></p>
								</div>
								<div class="form-group">
									<label>大学</label>
									<p><?php print $university ?></p>
								</div>
								<div class="form-group">
									<label>学部等</label>
									<p><?php print $faculty ?></p>
								</div>

								<div class="form-group">
									<label>学科等</label>
									<p><?php print $department ?></p>
								</div>
							</div>
							<input type="hidden" name="login_name" value=<?php print $login_name ?>>
							<input type="hidden" name="address" value=<?php print $address ?>>
							<input type="hidden" name="pwd" value=<?php print $pwd ?>>
							<input type="hidden" name="grade" value=<?php print $grade ?>>
							<input type="hidden" name="university" value=<?php print $university ?>>
							<input type="hidden" name="faculty" value=<?php print $faculty ?>>
							<input type="hidden" name="department" value=<?php print $department ?>>
							<input type="hidden" name="facebook_link" value=<?php print $link ?>>


							<!-- /.col-lg-6 (nested) -->
							<div align="center">
								<p>以上の情報で登録します。</p>
								<button type="submit" class="btn btn-default">登録</button>
							</div>
						</form>
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>


	<?php
include("view/footer1.html");
include("view/js.html");
}
