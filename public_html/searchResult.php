<?
include 'ChromePhp.php';
session_start();

$name = $_GET['name'];

$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
$query_text = "SELECT * FROM textbook WHERE name=$1";
$result_text = pg_prepare($conn, "query_text", $query_text);
$result_text = pg_execute($conn, "query_text", array("$name"));

$res=null;

for($i=0; $i < pg_num_rows($result_text); $i++) {
	$row = pg_fetch_assoc($result_text, $i);
	$res[] = array(
		'id'=>htmlspecialchars($row['id']),
		'name'=>htmlspecialchars($row['name']),
		);
}

ChromePhp::log($res);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($res);
