<?php require_once('db.php'); ?>

<?php $valueTwo = $_POST['gender']; ?>

<?php $appellation = $_POST['app']; ?>
<?php $index = $_POST['ex']; ?>
<?php $city =  $_POST['c']; ?>
<?php $street = $_POST['st']; ?>
<?php $house =  $_POST['h']; ?>
<?php $checx =  $_POST['ch']; ?>
<?php $kin =  $_POST['k']; ?>
<?php $bic =  $_POST['b']; ?>
<?php $checx2 =  $_POST['ch2']; ?>
<?php $text = $_POST['issued_by']; ?>
<?php $set = $_POST['sumTow']; ?>

<?php

$protoTo = '';

if (isset($_POST['conclude'])) {
  $nameInsurer = $_POST['to_appellation'];

  $lastnameInsurant = $_POST['to_insurant_lastname'];
  $nameInsurant = $_POST['to_insurant_name'];
  $middlenameInsurant = $_POST['to_insurant_middlename'];

  $lastnameInsured = $_POST['to_insured_lastname'];
  $nameInsured = $_POST['to_insured_name'];
  $middlenameInsured = $_POST['to_insured_middlename'];

  $sql_select_insurer = "SELECT insurer_id FROM insureres WHERE appellation = '$nameInsurer'";
  $stmt = $conn->query($sql_select_insurer);
  $stmt->execute();
  $boxOnes = $stmt->fetchAll();
  foreach ($boxOnes as $boxOne) {
    $insurerID .= $boxOne['insurer_id'];
  }

  $sql_select_insurant = "SELECT insurant_id FROM insurants WHERE insurant_first_name = '$nameInsurant' AND insurant_last_name = '$lastnameInsurant' AND insurant_middle_name = '$middlenameInsurant'";
  $stmt = $conn->query($sql_select_insurant);
  $stmt->execute();
  $boxTwos = $stmt->fetchAll();
  foreach ($boxTwos as $boxTwo) {
    $insurantID .= $boxTwo['insurant_id'];
  }

  $sql_select_insured = "SELECT insured_id FROM insured WHERE insured_first_name = '$lastnameInsured' AND insured_last_name = '$nameInsured' AND insured_middle_name = '$middlenameInsured'";
  $stmt = $conn->query($sql_select_insured);
  $stmt->execute();
  $boxThrees = $stmt->fetchAll();
  foreach ($boxThrees as $boxThree) {
    $insuredID .= $boxThree['insured_id'];
  }

  $s = $_POST['get_started'];
  $e = $_POST['end_action'];
  $ev = $_POST['user_sl'];
  $d = $_POST['dog_date'];
  $insAm = $_POST['in_sum'];

  $sql_select_contract = "SELECT * FROM contract WHERE insurancePeriod = '$d'";
  $stmt = $conn->query($sql_select_contract);
  $stmt->execute();
  $dateDog = $stmt->fetchAll();
  if(count($dateDog) == 0) {
    $sql_insert_contract ="INSERT INTO contract (
      insurer_id,
      insurant_id,
      insured_id,
      start_date,
      end_date,
      insuranceEvent,
      insurancePeriod,
      insuranceAmount
    ) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql_insert_contract);
    $stmt->bindValue(1, $insurerID);
    $stmt->bindValue(2, $insurantID);
    $stmt->bindValue(3, $insuredID);
    $stmt->bindValue(4, $s);
    $stmt->bindValue(5, $e);
    $stmt->bindValue(6, $ev);
    $stmt->bindValue(7, $d);
    $stmt->bindValue(8, $insAm);
    $stmt->execute();

  echo '<div style = "color: blue; text-align: center;">Договор записан!</div><hr>';
}
$protoTo = '1';
}

 ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <title>Заключение договора</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
      	<div class="col-sm-4">


          <?php if (empty($protoTo)) : ?>

                <link rel="stylesheet" href="/css/dogovor.css">

      		<form action="contract.php" method="POST" name="hidden">

            <legend><h1>Страховщик</h1></legend>

            <div class="form-group">
              <label for="">Наименование</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_appellation" name="to_appellation" style="width: 650px;" value="<?php echo $appellation; ?>">
            </div>

            <legend><h3>Адрес местоположения</h3></legend>

            <div class="form-group">
              <label for="">Почтовый индекс</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_index" name="to_index"style="width: 650px;" value="<?php echo $index; ?>">
            </div>

            <div class="form-group">
              <label for="">Город или населенный пункт</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_city" name="to_city"style="width: 650px;" value="<?php echo $city; ?>">
            </div>

            <div class="form-group">
              <label for="">Улица</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_street" name="to_street"style="width: 650px;" value="<?php echo $street; ?>">
            </div>

            <div class="form-group">
              <label for="">Дом</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_house" name="to_house" style="width: 120px; text-align: center; padding-left: 10px;" value="<?php echo $house; ?>">
            </div>

            <hr>

            <div class="form-group"  style="float: left;">
              <label for="">Расчетный счет</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_checx" name="to_checx" style="font-size: 18px;"  value="<?php echo $checx; ?>">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">ИНН</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_inn" name="to_inn" style="font-size: 18px;"  value="<?php echo $kin; ?>">
            </div>

            <div class="form-group" style="float: left;">
              <label for="">БИК</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_bic" name="to_bic" style="font-size: 18px;"  value="<?php echo $bic; ?>">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;" >
              <label for="">Корреспонденский счет</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_checx2" name="to_checx2" style="font-size: 18px;"  value="<?php echo $checx2; ?>">
            </div>

            <legend><h1>Страхователь</h1></legend>

            <div class="form-group" style="float: left;">
              <label for="">Мобильнй телефон</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_phone" name="to_phone" value="<?php echo $_POST['1']; ?>">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">E-mail</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_email" name="to_email" value="<?php echo $_POST['2']; ?>">
            </div>



            <div class="form-group">
      				<label for="">Фамилия</label>
      				<input type="text" class="form-control" onkeydown="return false" id="to_insurant_lastname" name="to_insurant_lastname" style="width: 650px;" value="<?php echo $_POST['3']; ?>">
      			</div>

            <div class="form-group">
      				<label for="">Имя</label>
      				<input type="text" class="form-control" onkeydown="return false" id="to_insurant_name" name="to_insurant_name" style="width: 650px;" value="<?php echo $_POST['4']; ?>">
      			</div>

            <div class="form-group">
              <label for="">Отчество</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_insurant_middlename" name="to_insurant_middlename" style="width: 650px;" value="<?php echo $_POST['5']; ?>">
            </div>

            <label><h3>Ваш пол</h3></label>

            <br>

            <div class="form-group" style="float: left;">
              <label for="" style="font-size: 1.4em;">
                <span>
                  <input type="radio" class="control" id="to_gender" name="to_gender"  style="width: 25px; height: 25px;" value="<?php echo $valueTwo ?>">
                </span>
                  Мужчина
              </label>
            </div>

            <div class="form-group"  style="float: left; margin-left: 50px;">
              <label for="" style="font-size: 1.4em;">
                <span>
                  <input type="radio" class="control" id="to_gender" name="to_gender" style="width: 25px; height: 25px;" value="<?php echo $valueTwo ?>">
                </span>
                Женщина
              </label>
            </div>

            <br><br><br>

            <div class="form-group">
              <label for="">Дата рождения</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_insurant_birthdate" name="to_insurant_birthdate" style="width: 220px; padding-left: 55px;" value="<?php echo $_POST['6']; ?>">
            </div>

            <legend><h3>Паспортные данные</h3></legend>

            <div class="form-group">
              <label for="">Серия и номер паспорта</label>
              <input type="text" class="form-control"  onkeydown="return false" id="to_insurant_psn" name="to_insurant_psn" style="width: 235px; padding-left: 55px;" value="<?php echo $_POST['7']; ?>">
            </div>


            <div class="form-group">
              <label for="">Кем выдан</label>
              <textarea class="" id="to_issued_by" onkeydown="return false" name="to_issued_by" rows="3" cols="42" style="font-size: 26px; color: white;"  value="<?php echo $_POST['tooeed']; ?>"></textarea>
            </div>


            <div class="form-group">
              <label for="">Дата выдачи</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_date_issue" name="to_date_issue" style="width: 220px; padding-left: 55px;" value="<?php echo $_POST['8']; ?>">
            </div>

            <legend><h3>Адрес регистрации</h3></legend>

            <div class="form-group">
              <label for="">Город или населенный пункт</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_insurant_city_reg" name="to_insurant_city_reg"  style="width: 650px;" value="<?php echo $_POST['9']; ?>">
            </div>

            <div class="form-group">
              <label for="">Улица</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_insurant_street_reg" name="to_insurant_street_reg"  style="width: 650px;" value="<?php echo $_POST['10']; ?>">
            </div>

            <div class="form-group" style="float: left;">
              <label for="">Дом</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_insurant_house_reg" name="to_insurant_house_reg" style="width: 120px; text-align: center; padding-left: 10px;" value="<?php echo $_POST['11']; ?>">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">Квартира</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_insurant_room_reg" name="to_insurant_room_reg" style="width: 120px; text-align: center; padding-left: 10px;" value="<?php echo $_POST['12']; ?>">
            </div>

            <legend><h3>Адрес проживания</h3></legend>

            <div class="form-group">
              <label for="">Город или населенный пункт</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_insurant_city_res" name="to_insurant_city_res"  style="width: 650px;" value="<?php echo $_POST['13']; ?>">
            </div>

            <div class="form-group">
              <label for="">Улица</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_insurant_street_res" name="to_insurant_street_res"  style="width: 650px;" value="<?php echo $_POST['14']; ?>">
            </div>

            <div class="form-group" style="float: left;">
              <label for="">Дом</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_insurant_house_res" name="to_insurant_house_res" style="width: 120px; text-align: center; padding-left: 10px;" value="<?php echo $_POST['15']; ?>">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">Квартира</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_insurant_room_res" name="to_insurant_room_res" style="width: 120px; text-align: center; padding-left: 10px;" value="<?php echo $_POST['16']; ?>">
            </div>

            <legend><h1>Застрахованный</h1></legend>

            <div class="form-group">
      				<label for="">Фамилия</label>
      				<input type="text" class="form-control" onkeydown="return false" id="" name="to_insured_lastname"  style="width: 650px;" value="<?php echo $_POST['17']; ?>">
      			</div>

            <div class="form-group">
      				<label for="">Имя</label>
      				<input type="text" class="form-control" onkeydown="return false" id="" name="to_insured_name"  style="width: 650px;" value="<?php echo $_POST['18']; ?>">
      			</div>

            <div class="form-group">
              <label for="">Отчество</label>
              <input type="text" class="form-control" onkeydown="return false" id="" name="to_insured_middlename"  style="width: 650px;" value="<?php echo $_POST['19']; ?>">
            </div>

            <div class="form-group">
              <label for="">Дата рождения</label>
              <input type="text" class="form-control" onkeydown="return false" id="to_insured_birthdate" name="to_insured_birthdate"  style="width: 220px; padding-left: 55px;" value="<?php echo $_POST['20']; ?>">
            </div>

            <hr>

            <div class="form-group">
              <label for="">Страховой случай</label>
              <select class="form-control" name="user_sl" style="max-width: 650px; height: 50px;font-size: 22px; margin-bottom: 25px;border-radius: 14px;padding-left: 40px; background-color: rgba(230, 143, 87, 0.52); border : 2px solid white; color: rgb(11, 10, 8);">
                <option value=""></option>
                <option value="Срочное страхование жизни на случай смерти">Срочное страхование жизни на случай смерти</option>
                <option value="Страхование на дожитие">Страхование на дожитие</option>
                <option value="Пожизнениое страхование">Пожизненое страхование</option>
              </select>
            </div>

            <legend><h3>Срок страхования</h3></legend>

            <div class="form-group" style="float: left;">
              <label for="">Начало</label>
              <input type="text" class="form-control" id="get_started" name="get_started" placeholder="12/02/1995" style="padding-left: 95px;">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">Окончание</label>
              <input type="text" class="form-control" id="end_action" name="end_action" placeholder="12/02/1995" style="padding-left: 95px;">
            </div>

            <div class="form-group" style="float: left;">
              <label for="">Страховая сумма</label>
              <input type="text" class="form-control" id="in_sum" name="in_sum" style="text-align: center; padding-left: 16px;" value="<?php echo $set; ?>">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">Дата заключения договора</label>
              <input type="text" class="form-control" id="datamaskOne" name="dog_date" placeholder="12/02/1995" style="padding-left: 95px;">
            </div>

            <br><br><br><br><br><br><br><br><br><br><br><br>

            <hr>

            <input type="submit" class="btn" name="conclude" value="Заключить">

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
        $("#datamaskOne").mask("99/99/9999");
        $("#get_started").mask("99/99/9999");
        $("#end_action").mask("99/99/9999");
      });
    </script>
    <script type="text/javascript">
        setTimeout('location.replace("/personal.php")', 3000);
        миллисекунд)
    </script>
  </body>


<?php else : ?>

  <style media="screen">
  @import URL('https://fonts.googleapis.com/css?family=Roboto+Slab|Suez+One');

  body {
  background: url("/img/luka.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
  }



  h1, h2 {
    text-align: center;
  }
  </style>

  <div class="container">
    <h2 class="text-center">Договор заключен. Можите перейти в личный кабинет
      <a href="\personal.php">Мой профиль</a>
    </h2>
  </div>


<?php endif; ?>



</html>
