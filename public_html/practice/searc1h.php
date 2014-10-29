<?
include 'ChromePhp.php';
session_start();

$name = $_GET['name'];

$res[] = array(
	'id'=>0,
	'name'=>'kjjiji',
	);
$res[] = array(
	'id'=>1,
	'name'=>'<script>alert();</script>',
	);


header('Content-Type: application/json; charset=utf-8');
echo json_encode($res);