<?php
include 'ChromePhp.php';
session_start();
include("header.html");
?>

<?php
session_destroy();
?>
<h2>ログアウトしたった<br></h2>
<a href="index.php">home</a>

<?php
include("footer.html");
ChromePhp::log($_SESSION);
?>