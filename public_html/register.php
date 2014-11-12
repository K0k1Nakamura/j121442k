<?php
session_start();
if(isset($_SESSION["login_name"])){
	header("Location: index.php");
}else{
	$message ="";
	if (isset($_POST["message"])) {
		$message = $_POST["message"];
	}
	include 'ChromePhp.php';
	include("topCSS.html");
	include("header1.html");
	print "<div style='height: 51px'></div>";
	?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" align="center">新規登録</h1>
			<h5 align="center" style="color:red;"><?php print $message?></h5>
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
						<form role="form" enctype="multipart/form-data" method="post" action="register2.php">
							<div class="col-lg-12">
								<div class="form-group">
									<label>ユーザー名</label>
									<input name="login_name" class="form-control" required>
									<p class="help-block">※半角英数字で入力してください。</p>
								</div>

								<div class="form-group">
									<label>メアド</label>
									<input name="address" class="form-control" type="email">
								</div>

								<div class="form-group">
									<label>パスワード</label>
									<input name="pwd" class="form-control" type="password" required>
									<p class="help-block">※半角英数字で6文字以上で入力してください。</p>
									<input name="pwd2" class="form-control" type="password" required>
									<p class="help-block">※確認のため再入力。</p>
								</div>

								<div class="form-group">
									<label>学年</label>
									<select name="grade" class="form-control">
										<option value="">指定なし</option>
										<option>大学1年</option>
										<option>大学2年</option>
										<option>大学3年</option>
										<option>大学4年</option>
										<option>大学5年</option>
										<option>大学6年</option>
										<option>その他</option>
									</select>
								</div>
								<div class="form-group">
									<label>大学</label>
									<select name="university" class="form-control university_list">
									</select>
								</div>
								<div class="form-group">
									<label>学部等</label>
									<select name="faculty" class="form-control faculty_list" disabled="disable">
									</select>
								</div>

								<div class="form-group">
									<label>学科等</label>
									<select name="department" class="form-control department_list" disabled="disable">
									</select>
								</div>
							</div>

							<!-- /.col-lg-6 (nested) -->
							<div align="center">
								<button type="submit" class="btn btn-default">登録</button>
								<button type="reset" class="btn btn-default">リセット</button>
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
	include("footer1.html");
	include("js.html");
}
