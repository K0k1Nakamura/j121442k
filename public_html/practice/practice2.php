<?php
	print <<< EOF
	<htnl>
	<head>
		<title>PHP practice</title>
		<meta http-equiv="Content-type"
		content="text/html; charset=utf-8">
	</head>
	<body>
		<h1>PHPの練習</h1>
EOF;
	for($i = 1; $i<=6; $i++) {
		print "<h$i> $i 週目のループ</h$i>";
	}
	print <<< HOGE
</body></htnl>
HOGE;

