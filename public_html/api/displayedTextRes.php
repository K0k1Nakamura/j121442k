<?php
include '../ChromePhp.php';
session_start();

$seller = $_SESSION['login_name'];

$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
$query_text = "SELECT * FROM textbook WHERE seller = $1";
$result_text = pg_prepare($conn, "", $query_text);
$result_text = pg_execute($conn, "", array("$seller"));

$res=null;

for($i=0; $i < pg_num_rows($result_text); $i++) {
	$row = pg_fetch_assoc($result_text, $i);
	$res[] = array(
		'id'=>htmlspecialchars($row['id']),
		'name'=>htmlspecialchars($row['name']),
		'author'=>htmlspecialchars($row['author']),
		'price'=>htmlspecialchars($row['price']),
		'comment'=>htmlspecialchars($row['comment']),
		'pic'=>htmlspecialchars($row['pic']),
		'class'=>htmlspecialchars($row['class']),
		'university'=>htmlspecialchars($row['university']),
		'faculty'=>htmlspecialchars($row['faculty']),
		'department'=>htmlspecialchars($row['department']),
		'grade'=>htmlspecialchars($row['grade']),
		'delivery_method'=>htmlspecialchars($row['delivery_method']),
		'seller'=>htmlspecialchars($row['seller']),
		'stock'=>htmlspecialchars($row['stock']),
		);
}

ChromePhp::log($res);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($res);