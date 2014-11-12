<?php
include 'ChromePhp.php';
session_start();
include("view/topCSS.html");
include("view/header1.html"); 
include("view/header3.html"); 
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">出品済み商品一覧</h1>
		<div id="result"></div>

		<div id="text_list"></div>
	</div>
	<script src="js/jquery-1.11.0.js"></script>
	<script src="js/displayedText.js"></script>
</div>
<?php
include("view/footer2.html");
