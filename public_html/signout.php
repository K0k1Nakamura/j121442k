<?php
include 'ChromePhp.php';
session_start();
if(isset($_SESSION["login_name"])){
	session_destroy();
}
include("header.html");
print "<div style='height: 51px'></div>";

?>
<h2>ログアウトしたった<br></h2>
<a href="index.php">home</a>

<?php
include("footer.html");
