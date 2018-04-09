<?php

try {
    $conn = new PDO($dsn, $login, $pass);
    $conn->exec("set names utf8");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE TABLE insur(
          insurer_id INT NOT NULL IDENTITY(1,1),
          PRIMARY KEY(insurer_id),
          appellation VARCHAR(50),
          TIN VARCHAR(50),
          checkAccount VARCHAR(50),
          BIC VARCHAR(50),
          corAccount VARCHAR(50),
          postcode VARCHAR(10),
          insurer_city VARCHAR(50),
          insurer_street VARCHAR(30),
          insurer_house VARCHAR(5),
          sumIns DECIMAL(15,2))";
          $conn->query($sql);
  echo '<div style = "color: red; text-align: center;">Таблица Страховщики создана!</div><hr>';
}
catch (PDOException $e) {
    print("Ошибка подключения к SQL Server.");
    die(print_r($e));
}

?>


