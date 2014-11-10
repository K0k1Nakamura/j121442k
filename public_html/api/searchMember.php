<?
include '../ChromePhp.php';

$login_name = $_GET['login_name'];

$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
$query_text = "SELECT * FROM member WHERE login_name = $1";
$result_text = pg_prepare($conn, "", $query_text);
$result_text = pg_execute($conn, "", array("$login_name"));

$res=null;

$row = pg_fetch_assoc($result_text, 0);
$res[] = array(
	'login_name'=>htmlspecialchars($row['login_name']),
	'university'=>htmlspecialchars($row['university']),
	'faculty'=>htmlspecialchars($row['faculty']),
	'department'=>htmlspecialchars($row['department']),
	'grade'=>htmlspecialchars($row['grade']),
	'address'=>htmlspecialchars($row['address']),
	);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($res);
