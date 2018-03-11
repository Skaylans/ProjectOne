<?php
require_once('rb.php');
$dsn = 'mysql:host=localhost;dbname=insurance';
$login = 'root';
$pass = null;
try {
  R::setup($dsn, $login, $pass);
}
catch (Exception $ex) {
  echo 'Не связанный '.$ex->getMessage();
}

session_start();
 ?>
