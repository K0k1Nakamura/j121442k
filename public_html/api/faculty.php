<?
include '../ChromePhp.php';
$university = $_GET['university'];

$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
$query_university = "SELECT * FROM university WHERE name = $1";
$result_university = pg_prepare($conn, "", $query_university);
$result_university = pg_execute($conn, "", array($university));
$arr_university = pg_fetch_assoc($result_university, 0);
$id_university = $arr_university['id']; 

$query_faculty = "SELECT * FROM faculty WHERE parent = $1";
$result_faculty = pg_prepare($conn, "", $query_faculty);
$result_faculty = pg_execute($conn, "", array($id_university));

$res = [];

for($i=0; $i < pg_num_rows($result_faculty); $i++) {
	$row = pg_fetch_assoc($result_faculty, $i);
	$res[] = array(
		'id'=>htmlspecialchars($row['id']),
		'name'=>htmlspecialchars($row['name']),
		);
}

ChromePhp::log($res);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($res);
