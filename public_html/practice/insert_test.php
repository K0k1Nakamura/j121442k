<?php

$conn = pg_connect("host=localhost dbname=j121442k user=j121442k");
$query = "INSERT INTO member (login_name,pwd) VALUES ($1,$2)";

$result = pg_prepare($conn, "my_query", $query);
$result = pg_execute($conn, "my_query", array("fujii", "hogehoge"));