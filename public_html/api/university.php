<?
include '../ChromePhp.php';

$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
$query_university = "SELECT * FROM university";
$result_university = pg_query($conn,$query_university);

$res="";

for($i=0; $i < pg_num_rows($result_university); $i++) {
	$row = pg_fetch_assoc($result_university, $i);
	$res[] = array(
		'id'=>htmlspecialchars($row['id']),
		'name'=>htmlspecialchars($row['name']),
		);
}

ChromePhp::log($res);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($res);
