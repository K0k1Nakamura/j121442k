<?php
include 'ChromePhp.php';
session_start();

$id = $_GET['id'];

$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
$query = "SELECT * FROM textbook WHERE id=$1";
$result = pg_prepare($conn, "", $query);
$result = pg_execute($conn, "", array("$id"));

if(pg_num_rows($result) == 0){
	header("Location: index.php");
}else{
	include("view/topCSS.html"); 
	include("view/header1.html"); 
	print "<div style='height: 51px'></div>";

	$row = pg_fetch_assoc($result, 0);
	?>
	<div style="background-color: white;">

		<div class="container">
			<!-- Portfolio Item Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><?php print $row['name'] ?>
						<small><?php print $row['author'] ?></small>
					</h1>
				</div>
			</div>
			<!-- /.row -->

			<!-- Portfolio Item Row -->
			<div class="row">

				<div class="col-md-8">
					<div style="height:500px;width:750px;">
						<img src="<?php print "pic/".$row['pic'] ?>" style="max-height: 500px; width: 750px;">
					</div>
				</div>

				<div class="col-md-4">
					<?php
					if ($row['class']) {
						print "<h4 class=page-header>授業名</h4>";
						print "<p>".$row['class']."</p>";
					}
					?>
					<?php
					if ($row['university']) {
						print "<h4 class=page-header>大学</h4>";
						print "<p>".$row['university']."</p>";
					}
					?>
					<?php
					if ($row['faculty']) {
						print "<p>".$row['faculty']."</p>";
					}
					?>
					<?php
					if ($row['department']) {
						print "<p>".$row['department']."</p>";
					}
					?>
					<?php
					if ($row['seller']) {
						print "<h4 class=page-header>出品者</h4>";
						print "<p>".$row['seller']."さん</p>";
					}
					?>
					<?php
					if ($row['delivery_method']) {
						print "<h4 class=page-header>配送方法</h4>";
						print "<p>".$row['delivery_method']."</p>";
					}
					?>


				</div>

			</div>
			<!-- /.row -->

			<!-- Related Projects Row -->
			<div class="row">

				<div class="col-lg-12">
					<h3 class="page-header">商品説明</h3>
				</div>

				<p><?php print $row['comment'] ?></p>

			</div>
			<!-- /.row -->
			<div align="center">
				<input type="button" class="btn btn_default" value="購入">
			</div>
			<!-- Footer -->


		</div>
	</div>
		<?php 
		include("view/footer1.html");
		include("view/js.html");
	}

