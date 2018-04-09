<?php
require_once('db.php');
if (isset($_POST['submit'])) {
      $appellation = $_POST['to_appellation'];
      $TIN = $_POST['to_inn'];
      $checkAccount  = $_POST['to_checx'];
      $BIC = $_POST['to_bic'];
      $corAccount = $_POST['to_checx2'];
      $postcode = $_POST['to_index'];
      $insurer_city  = $_POST['to_city'];
      $insurer_street = $_POST['to_street'];
      $insurer_house = $_POST['to_house'];
      $sumIns = $_POST['sumOne'];


      $sql_select = "SELECT * FROM insureres";
      $stmt = $conn->query($sql_select);
      $stmt->execute();
      $data = $stmt->fetchAll();
      if(count($data) == 0) {
        $sql_insert ="INSERT INTO insureres (appellation, TIN, checkAccount, BIC, corAccount, postcode, insurer_city, insurer_street, insurer_house, sumIns
        ) VALUES (?,?,?,?,?,?,?,?,?,?)";
      $stmt = $conn->prepare($sql_insert);
      $stmt->bindValue(1, $appellation);
      $stmt->bindValue(2, $TIN);
      $stmt->bindValue(3, $checkAccount);
      $stmt->bindValue(4, $BIC);
      $stmt->bindValue(5, $corAccount);
      $stmt->bindValue(6, $postcode);
      $stmt->bindValue(7, $insurer_city);
      $stmt->bindValue(8, $insurer_street);
      $stmt->bindValue(9, $insurer_house);
      $stmt->bindValue(10, $sumIns);
      $stmt->execute();

      echo '<div style = "color: blue; text-align: center;">Страховщик записан в базу!</div><hr>';
  }
}
  ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
     <form action="createtable.php" method="POST" name="prime">
    <div class="form-group">
      <label for="">Наименование</label>
      <input type="text" class="form-control"  id="to_appellation" name="to_appellation" style="width: 650px;">
    </div>

    <legend><h3>Адрес местоположения</h3></legend>

    <div class="form-group">
      <label for="">Почтовый индекс</label>
      <input type="text" class="form-control"  id="to_index" name="to_index"style="width: 650px;">
    </div>

    <div class="form-group">
      <label for="">Город или населенный пункт</label>
      <input type="text" class="form-control"  id="to_city" name="to_city"style="width: 650px;">
    </div>

    <div class="form-group">
      <label for="">Улица</label>
      <input type="text" class="form-control"  id="to_street" name="to_street"style="width: 650px;">
    </div>

    <div class="form-group">
      <label for="">Дом</label>
      <input type="text" class="form-control"  id="to_house" name="to_house" style="width: 120px; text-align: center; padding-left: 10px;">
    </div>

    <hr>

    <div class="form-group"  style="float: left;">
      <label for="">Расчетный счет</label>
      <input type="text" class="form-control"  id="to_checx" name="to_checx" style="font-size: 18px;" >
    </div>

    <div class="form-group" style="float: left; margin-left: 50px;">
      <label for="">ИНН</label>
      <input type="text" class="form-control" id="to_inn" name="to_inn" style="font-size: 18px;">
    </div>

    <div class="form-group" style="float: left;">
      <label for="">БИК</label>
      <input type="text" class="form-control"  id="to_bic" name="to_bic" style="font-size: 18px;">
    </div>

    <div class="form-group" style="float: left; margin-left: 50px;" >
      <label for="">Корреспонденский счет</label>
      <input type="text" class="form-control"  id="to_checx2" name="to_checx2" style="font-size: 18px;">
    </div>

    <div class="form-group" style="float: left; margin-left: 50px;" >
      <label for="">Страховая сумма</label>
      <input type="text" class="form-control"  id="sumOne" name="sumOne" style="font-size: 18px;">
    </div>

<input type="submit" name="submit" value="submit">
        </form>
  </body>
</html>






