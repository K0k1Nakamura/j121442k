<?php
include 'ChromePhp.php';
session_start();
include("header.html"); 
print "<div style='height: 51px'></div>";

$id = $_GET['id'];

$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
$query = "SELECT * FROM textbook WHERE id=$1";
$result = pg_prepare($conn, "", $query);
$result = pg_execute($conn, "", array("$id"));

if(pg_num_rows($result) == 0){
	print "へんなことしないでください<br>";
	print "<a href=\"index.php\">TOPへ</a>";
}else{
	$row = pg_fetch_assoc($result, 0);
	print htmlspecialchars($row["id"])."<br>";
	print "<a href=\"index.php\">TOPへ</a>";

}
