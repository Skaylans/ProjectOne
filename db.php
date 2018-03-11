<?php
require_once('rb.php');
$dsn = "sqlsrv:server = tcp:safelife.database.windows.net,1433; Database = Insurance";
$login = "Romanow";
$pass = "Qwerty123456";
try {
  R::setup($dsn, $login, $pass);
}
catch (Exception $ex) {
  echo 'Не связанный '.$ex->getMessage();
}

session_start();
 ?>
