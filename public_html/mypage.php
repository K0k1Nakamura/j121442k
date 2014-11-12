<?php
include 'ChromePhp.php';
session_start();
include("view/topCSS.html");
include("view/header1.html"); 
include("view/header3.html"); 
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">登録情報</h1>
	</div>
	<div class="col-lg-2 col-md-2"></div>
	<div class="col-lg-8 col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				現在登録されている情報です。	
			</div>
			<div class="panel-body">
				<div class="row">
					<form role="form" enctype="multipart/form-data" method="post" action="api/saveUser.php">
						<div class="col-lg-12">
							<div class="form-group">
								<label>ユーザー名</label>
								<p name="login_name"></p>
							</div>

							<div class="form-group">
								<label>メアド</label>
								<p name="address"></p>
							</div>

							<div class="form-group">
								<label>パスワード</label>
								<p>非表示</p>
							</div>

							<div class="form-group">
								<label>学年</label>	
								<p name="grade"></p>
							</div>
							<div class="form-group">
								<label>大学</label>
								<p name="university"></p>
							</div>
							<div class="form-group">
								<label>学部等</label>
								<p name="faculty"></p>
							</div>

							<div class="form-group">
								<label>学科等</label>
								<p name="department"></p>
							</div>
							<input type="hidden" id="login_name" value="<?php print $_SESSION['login_name']?>">
							<script src="js/jquery-1.11.0.js"></script>
							<script>
								$(function(){
									$.get('api/searchMember.php',{
										login_name: $('#login_name').val()
									})
									.done(function(res) {
										$('p[name=login_name]').html(res[0].login_name);
										$('p[name=university]').html(res[0].university);
										$('p[name=faculty]').html(res[0].faculty);
										$('p[name=department]').html(res[0].department);
										$('p[name=grade]').html(res[0].grade);
										$('p[name=address]').html(res[0].address);
									}).fail(function(res) {
										console.log('error');
									});
								});
							</script>
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
include("view/footer2.html");
