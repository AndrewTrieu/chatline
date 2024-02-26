<?php
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$hostname = $cleardb_url["host"];
$username = $cleardb_url["user"];
$password = $cleardb_url["pass"];
$dbname = substr($cleardb_url["path"], 1);

$active_group = 'default';
$query_builder = TRUE;

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
  echo "Database connection error" . mysqli_connect_error();
}
?>