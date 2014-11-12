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
	include("view/topCSS.html");
	include("view/header1.html");
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
					Welcome!	
				</div>
				<div id="facebook">
					<h3 class="page-header" align="center" >Facebookログイン機能をご利用ください。</h3>

					<script src="js/jquery-1.11.0.js"></script>

					<script src="js/facebook.js"></script>
					<div align="center" style="padding: 30px;">
						<fb:login-button scope="public_profile,email" data-size="xlarge" onlogin="checkLoginState();">
					</fb:login-button>
				</div>
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
