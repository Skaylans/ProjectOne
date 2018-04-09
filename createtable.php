<?php 
$dsn = "sqlsrv:server = tcp:safelife.database.windows.net,1433; Database = Insurance";
$login = "Romanow";
$pass = "Qwerty123456";

try {
    $conn = new PDO($dsn, $login, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")) or die ( 'error' );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
}
catch (PDOException $e) {
    print("Ошибка подключения к SQL Server.");
    die(print_r($e));
}

if (isset($_POST['submit'])) {
  
  $appellation = $_POST['app'];
  $tin = $_POST['in_fo'];
  $checkAccount  = $_POST['check_fo'];
  $bic = $_POST['bic_fo'];
  $corAccount = $_POST['check_ko'];
  $postcode = $_POST['index_fo'];
  $insurer_city  = $_POST['city_fo'];
  $insurer_street = $_POST['street_fo'];
  $insurer_house = $_POST['house_fo'];
  $sumIns = $_POST['sumln'];
    $sql_select = "SELECT * FROM insurerOne";
    $stmt = $conn->query($sql_select);
    $stmt->execute();
    $date = $stmt->fetchAll();
    if(count($date) == 0) {
        $insert = "INSERT INTO insurerOne (appellation, TIN, checkAccount, BIC, corAccount, postcode, insurer_city, insurer_street, insurer_house, sumIns) VALUES()";
        $stmt = $conn->prepare($insert);
        $stmt->bindValue(1, $appellation);
        $stmt->bindValue(2, $tin);
        $stmt->bindValue(3, $checkAccount);
        $stmt->bindValue(4, $bic);
        $stmt->bindValue(5, $corAccount);
        $stmt->bindValue(6, $postcode);
        $stmt->bindValue(7, $insurer_city);
        $stmt->bindValue(8, $insurer_street);
        $stmt->bindValue(9, $insurer_house);
        $stmt->bindValue(10, $sumIns);   
        $stmt->execute();
        echo '<div style = "color: red; text-align: center;">Данные записаны!</div><hr>';
    }
}   

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="index.html" method="post">
       <input type="text" name="app" placeholder="Название">
      <input type="text" name="index_fo" placeholder="индекс">
      <input type="text" name="city_fo" placeholder="город">
      <input type="text" name="street_fo" placeholder="улица">
      <input type="text" name="home_fo" placeholder="дом">
      <input type="text" name="in_fo" placeholder="инн">
      <input type="text" name="bic_fo" placeholder="бик">
      <input type="text" name="check_fo" placeholder="расч.счет">
      <input type="text" name="check_ko" placeholder="корр.счет">
      <input type="text" name="sumln" placeholder="Сумма">
      <br>
      <input type="submit" name="submit" value="submit">
    </form>
  </body>
</html>


