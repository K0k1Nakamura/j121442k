<?
include '../ChromePhp.php';
session_start();

$name = $_GET['name'];
$class = $_GET['class_name'];
$university = $_GET['university'];
$faculty = $_GET['faculty'];
$department = $_GET['department'];


$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
$query_text = "SELECT * FROM textbook WHERE name LIKE $1 AND class LIKE $2
AND university LIKE $3 AND faculty LIKE $4 AND department LIKE $5";
$result_text = pg_prepare($conn, "query_text", $query_text);
$result_text = pg_execute($conn, "query_text", array("%$name%", "%$class%", "%$university%", "%$faculty%", "%$department%"));

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
		'delivery_method'=>htmlspecialchars($row['delivery_method']),
		'seller'=>htmlspecialchars($row['seller']),
		);
}

ChromePhp::log($res);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($res);
