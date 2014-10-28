<?php
include 'ChromePhp.php';
session_start();
session_destroy();
ChromePhp::log('セッション');
ChromePhp::log($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	おつかれっす<br>
	<a href="top.php">とっぷ</a>
</body>
</html>