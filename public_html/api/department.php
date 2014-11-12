<?
include '../ChromePhp.php';
$university = $_GET['university'];
$faculty = $_GET['faculty'];

$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
$query_university = "SELECT * FROM university WHERE name = $1";
$result_university = pg_prepare($conn, "", $query_university);
$result_university = pg_execute($conn, "", array($university));
$arr_university = pg_fetch_assoc($result_university, 0);
$id_university = $arr_university['id']; 

$query_faculty = "SELECT * FROM faculty WHERE parent = $1 AND name = $2";
$result_faculty = pg_prepare($conn, "", $query_faculty);
$result_faculty = pg_execute($conn, "", array($id_university, $faculty));
$arr_faculty = pg_fetch_assoc($result_faculty, 0);
$id_faculty = $arr_faculty['id']; 

$query_department = "SELECT * FROM department WHERE parent = $1";
$result_department = pg_prepare($conn, "", $query_department);
$result_department = pg_execute($conn, "", array($id_faculty));

$res = [];

for($i=0; $i < pg_num_rows($result_department); $i++) {
	$row = pg_fetch_assoc($result_department, $i);
	$res[] = array(
		'id'=>htmlspecialchars($row['id']),
		'name'=>htmlspecialchars($row['name']),
		);
}

ChromePhp::log($res);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($res);
