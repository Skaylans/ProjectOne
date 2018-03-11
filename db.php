<?php
//require_once('rb.php');

$dsn = "sqlsrv:server = tcp:safelife.database.windows.net,1433; Database = Insurance";
$login = "Romanow";
$pass = "Qwerty123456";

R::setup($dsn, $login, $pass);

session_start();
 ?>
