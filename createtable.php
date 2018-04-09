


<?php

$dsn = "sqlsrv:server = tcp:safelife.database.windows.net,1433; Database = Insurance";
$login = "Romanow";
$pass = "Qwerty123456";

try {
      $conn = new PDO($dsn, $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql1 = "DELETE FROM insurer";
        $conn->query($sql1);
    echo '<div style = "color: red; text-align: center;">Таблица удалена!</div><hr>';
      }
    }
    catch (PDOException $e) {
      print("Ошибка подключения к SQL Server.");
      die(print_r($e));
    }
/*
try {
    $conn = new PDO($dsn, $login, $pass);
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
*/
?> 


