<?php
include 'ChromePhp.php';
session_destroy();
include("header.html");
print "<div style='height: 51px'></div>";

?>
<h2>ログアウトしたった<br></h2>
<a href="index.php">home</a>

<?php
include("footer.html");
ChromePhp::log($_SESSION);
