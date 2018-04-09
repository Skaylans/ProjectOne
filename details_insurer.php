<?php
require_once('db.php');

$insurer_appellation = $_GET['insurer_appellation'];

$query = "SELECT * FROM insurer WHERE appellation = '$insurer_appellation'";
$stmt = $conn->prepare($query);
$stmt->execute(array(
  'postcode' => $underwriter['postcode'],
  'insurer_city' => $underwriter['insurer_city'],
  'insurer_street' => $underwriter['insurer_street'],
  'insurer_house' => $underwriter['insurer_house'],
  'checkAccount' => $underwriter['checkAccount'],
  'TIN' => $underwriter['TIN'],
  'BIC' => $underwriter['BIC'],
  'corAccount' => $underwriter['corAccount'],
  'sumIns' => $underwriter['sumIns']
));
$data = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($data);
 ?>
