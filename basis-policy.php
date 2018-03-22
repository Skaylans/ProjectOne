<?php      
require_once('db.php');

if (isset($_POST['payment'])) {
  if(!empty($_POST)) {
    try {
      $phonenum            = $_POST['user_phone'];
      $insurant_email      = $_POST['insurant_email'];
      $insurant_lastname   = $_POST['insurant_lastname'];
      $insurant_name       = $_POST['insurant_name'];
      $insurant_middlename = $_POST['insurant_middlename'];
      $gender              = $_POST['gender'];
      $insurant_birthdate  = $_POST['insurant_birthdate'];
      $insurant_psn        = $_POST['insurant_psn'];
      $issued_by           = $_POST['issued_by'];
      $date_issue          = $_POST['date_issue'];
      $insurant_city_reg   = $_POST['insurant_city_reg'];
      $insurant_street_reg = $_POST['insurant_street_reg'];
      $insurant_house_reg  = $_POST['insurant_house_reg'];
      $insurant_room_reg   = $_POST['insurant_room_reg'];
      $insurant_city_res   = $_POST['insurant_city_res'];
      $insurant_street_res = $_POST['insurant_street_res'];
      $insurant_house_res  = $_POST['insurant_house_res'];
      $insurant_room_res   = $_POST['insurant_room_res'];
    }
    catch(Exception $e) {
      die(var_dump($e));
    }
  /*    $sql_insert ="INSERT INTO insurant (
        phone_number,
        insurant_email
        insurant_last_name,
        insurant_first_name,
        insurant_middle_name,
        gender,
        insurant_birthdate,
        series_number,
        issuedBy,
        dateIssue,
        insurant_city_reg,
        insurant_street_reg,
        insurant_house_reg,
        insurant_apartment_reg,
        insurant_city_res,
        insurant_street_res,
        insurant_house_res,
        insurant_apartment_res,
        cardNumber,
        transferAmount
      ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $conn->prepare($sql_insert);
      $stmt->bindValue(1, $phonenum);
      $stmt->bindValue(2, $insurant_email);
      $stmt->bindValue(3, $insurant_lastname);
      $stmt->bindValue(4, $insurant_name);
      $stmt->bindValue(5, $insurant_middlename);
      $stmt->bindValue(6, $gender);
      $stmt->bindValue(7, $insurant_birthdate);
      $stmt->bindValue(8, $insurant_psn);
      $stmt->bindValue(9, $issued_by);
      $stmt->bindValue(10, $date_issue);
      $stmt->bindValue(11, $insurant_city_reg);
      $stmt->bindValue(12, $insurant_street_reg);
      $stmt->bindValue(13, $insurant_house_reg);
      $stmt->bindValue(14, $insurant_room_reg);
      $stmt->bindValue(15, $insurant_city_res);
      $stmt->bindValue(16, $insurant_street_res);
      $stmt->bindValue(17, $insurant_house_res);
      $stmt->bindValue(18, $insurant_room_res);
      $stmt->execute();

      echo '<div style = "color: blue; text-align: center;">Страхователь записан в базу!</div><hr>';
    }
    catch(Exception $e) {
      die(var_dump($e));
    }

    try {
      $insured_lastname   = $_POST['insured_lastname'];
      $insured_name       = $_POST['insured_name'];
      $insured_middlename = $_POST['insured_middlename'];
      $insured_birthdate  = $_POST['insured_birthdate'];

      $sql_insert ="INSERT INTO insured (insured_first_name, insured_last_name, insured_middle_name,insured_birthdate) VALUES (?,?,?,?)";
      $stmt = $conn->prepare($sql_insert);
      $stmt->bindValue(1, $insured_lastname);
      $stmt->bindValue(2, $insured_name);
      $stmt->bindValue(3, $insured_middlename);
      $stmt->bindValue(4, $insured_birthdate);
      $stmt->execute();

      echo '<div style = "color: blue; text-align: center;">Застрахованный записан в базу!</div><hr>';
    }
    catch(Exception $e) {
      die(var_dump($e));
    }
  }     
}






?>









<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style-form.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <title>Оформление полиса</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
      	<div class="col-sm-4">
      		<form action="payment.php" method="POST">

            <legend><h1>Страхователь</h1></legend>

            <div class="form-group" style="float: left;">
              <label for="">Мобильнй телефон</label>
              <input type="text" class="form-control" id="phone" name="user_phone" placeholder="+7 (999) 99 99 999">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">E-mail</label>
              <input type="text" class="form-control" id="" name="insurant_email" placeholder="test@mail.ru">
            </div>

            <div class="form-group">
      				<label for="">Фамилия</label>
      				<input type="text" class="form-control" id="" name="insurant_lastname" placeholder="Иванов" style="width: 650px;">
      			</div>

            <div class="form-group">
      				<label for="">Имя</label>
      				<input type="text" class="form-control" id="" name="insurant_name" placeholder="Иван" style="width: 650px;">
      			</div>

            <div class="form-group">
              <label for="">Отчество</label>
              <input type="text" class="form-control" id="" name="insurant_middlename" placeholder="Иванович" style="width: 650px;">
            </div>

            <label><h3>Ваш пол</h3></label>

            <br>

            <div class="form-group" style="float: left;">
              <label for="" style="font-size: 1.4em;">
                <span>
                  <input type="radio" class="control" id="" name="gender" value="Man" style="width: 25px;
                height: 25px;"></span>
                Мужчина
              </label>
            </div>

            <div class="form-group"  style="float: left; margin-left: 50px;">
              <label for="" style="font-size: 1.4em;">
                <span><input type="radio" class="control" id="" name="gender" value="Woman" style="width: 25px;
                height: 25px;"></span>
                Женщина
              </label>
            </div>

            <br><br><br>

            <div class="form-group">
              <label for="">Дата рождения</label>
              <input type="text" class="form-control" id="date_mask" name="insurant_birthdate" placeholder="12/02/1995" style="width: 220px;">
            </div>

            <legend><h3>Паспортные данные</h3></legend>

            <div class="form-group">
              <label for="">Серия и номер паспорта</label>
              <input type="text" class="form-control" id="psn" name="insurant_psn" placeholder="XX XX XXXXXX" style="width: 235px;">
            </div>

            <div class="form-group">
              <label for="">Кем выдан</label>
              <textarea name="user_from" class="" id="" name="issued_by" rows="3" cols="42" style="font-size: 26px; color: white;"></textarea>
            </div>

            <div class="form-group">
              <label for="">Дата выдачи</label>
              <input type="text" class="form-control" id="date_mask2" name="date_issue" placeholder="12/02/1995" style="width: 220px;">
            </div>

            <legend><h3>Адрес регистрации</h3></legend>

            <div class="form-group">
              <label for="">Город или населенный пункт</label>
              <input type="text" class="form-control" id="" name="insurant_city_reg" placeholder="Введите город или населенный пункт" style="width: 650px;">
            </div>

            <div class="form-group">
              <label for="">Улица</label>
              <input type="text" class="form-control" id="" name="insurant_street_reg" placeholder="Введите улицу" style="width: 650px;">
            </div>

            <div class="form-group" style="float: left;">
              <label for="">Дом</label>
              <input type="text" class="form-control" id="" name="insurant_house_reg" style="text-align: center;">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">Квартира</label>
              <input type="text" class="form-control" id="" name="insurant_room_reg" style="text-align: center;">
            </div>

            <legend><h3>Адрес проживания</h3></legend>

            <div class="form-group" style="text-align: center;">
              <label for="" >
                <span><input type="checkbox" class="" id="" name="insurant_address_res" style="width: 20px;
                height: 20px;"></span>
                Адрес проживания совпадает с адресом регистрации
              </label>
            </div>

            <div class="form-group">
              <label for="">Город или населенный пункт</label>
              <input type="text" class="form-control" id="" name="insurant_city_res" placeholder="Введите город или населенный пункт" style="width: 650px;">
            </div>

            <div class="form-group">
              <label for="">Улица</label>
              <input type="text" class="form-control" id="" name="insurant_street_res" placeholder="Введите улицу" style="width: 650px;">
            </div>

            <div class="form-group" style="float: left;">
              <label for="">Дом</label>
              <input type="text" class="form-control" id="" name="insurant_house_res" style="text-align: center;">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">Квартира</label>
              <input type="text" class="form-control" id="" name="insurant_room_res" style="text-align: center;">
            </div>

            <legend><h1>Застрахованный</h1></legend>

            <div class="form-group" style="text-align: center;">
              <label for="" >
                <span><input type="checkbox" class="" id="" name="insured_include"  style="width: 20px; height: 20px;"></span>
                Включить страхователя в список застрахованных
              </label>
            </div>

            <div class="form-group">
      				<label for="">Фамилия</label>
      				<input type="text" class="form-control" id="" name="insured_lastname" placeholder="Иванов" style="width: 650px;">
      			</div>

            <div class="form-group">
      				<label for="">Имя</label>
      				<input type="text" class="form-control" id="" name="insured_name" placeholder="Иван" style="width: 650px;">
      			</div>

            <div class="form-group">
              <label for="">Отчество</label>
              <input type="text" class="form-control" id="" name="insured_middlename" placeholder="Иванович" style="width: 650px;">
            </div>

            <div class="form-group">
              <label for="">Дата рождения</label>
              <input type="text" class="form-control" id="date_mask3" name="insured_birthdate" placeholder="12/02/1995" style="width: 220px;">
            </div>

            <hr>

      			<button type="submit" class="btn" name="payment">Оплатить полис</button>

      		</form>
      	</div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#phone").mask("+7 (999) 99-99-999");
        $("#date_mask").mask("99/99/9999");
        $("#date_mask2").mask("99/99/9999");
        $("#date_mask3").mask("99/99/9999");
        $('#psn').mask("99 99 999999");
      });
    </script>
  </body>
</html>
