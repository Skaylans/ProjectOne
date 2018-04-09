<?php
require_once('db.php');

$proto = '';
$user_name = $_SESSION['logged_user'];

  $query = "SELECT appellation FROM insurers ORDER BY appellation";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $insurers = $stmt->fetchAll();
  foreach ($insurers as $row) {
    $insurer .= '<option>'.$row["appellation"].'</option >';
  }

  $sql_select_usersID = "SELECT id FROM users WHERE login = '$user_name'";
  $stmt = $conn->query($sql_select_usersID);
  $stmt->execute();
  $users = $stmt->fetchAll();
  foreach ($users as $user) {
    $userID .= $user['id'];
  }

if (isset($_POST['payment'])) {
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


      $sql_select_insurant = "SELECT * FROM insurants WHERE insurant_email = '$insurant_email'";
      $stmt = $conn->query($sql_select_insurant);
      $stmt->execute();
      $data1 = $stmt->fetchAll();
      if(count($data1) == 0) {
        $sql_insert_insurant ="INSERT INTO insurant (
          phone_number,
          insurant_email,
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
          user_id
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $conn->prepare($sql_insert_insurant);
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
      $stmt->bindValue(19, $userID);
      $stmt->execute();

      echo '<div style = "color: blue; text-align: center;">Страхователь записан в базу!</div><hr>';
    }
      $insured_lastname   = $_POST['insured_lastname'];
      $insured_name       = $_POST['insured_name'];
      $insured_middlename = $_POST['insured_middlename'];
      $insured_birthdate  = $_POST['insured_birthdate'];

      $sql_select_insured = "SELECT * FROM insured WHERE insured_first_name = '$insured_lastname' AND insured_last_name = '$insured_name' AND insured_middle_name = '$insured_middlename'";
      $stmt = $conn->query($sql_select_insured);
      $stmt->execute();
      $data2 = $stmt->fetchAll();
      if(count($data2) == 0) {
        $sql_insert ="INSERT INTO insured (insured_first_name, insured_last_name, insured_middle_name,insured_birthdate) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $insured_lastname);
        $stmt->bindValue(2, $insured_name);
        $stmt->bindValue(3, $insured_middlename);
        $stmt->bindValue(4, $insured_birthdate);
        $stmt->execute();

      echo '<div style = "color: blue; text-align: center;">Застрахованный записан в базу!</div><hr>';
    }
    $proto = '1';
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <title>Оформление полиса</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
      	<div class="col-sm-4">

        <?php if (empty($proto)) : ?>

          <link rel="stylesheet" href="/css/style-form.css">

      		<form action="basis-policy.php" method="POST" name="prime">

            <legend><h1>Страховщик</h1></legend>
            <div class="form-group">
              <label for="">Наименование</label>
              <input type="text" list="cocktail" required placeholder="Выберите страховщика" class="form-control" name="insurer_appellation"  id="insurer_appellation"  onchange='autofill();' onkeydown='autofill();' onkeyup="autofill();" style="width: 650px; height: 50px; font-size: 22px; background-color: rgba(218, 35, 57, 0.52); border : 2px solid white; color: white; border-radius: 14px;" >
              <datalist id="cocktail" >
               <?php echo $insurer; ?>
              </datalist>
            </div>

            <div class="hidden">
              <input type="text" name="sumOne" id="sumOne">
            </div>

            <legend><h3>Адрес местоположения</h3></legend>

            <div class="form-group">
              <label for="">Почтовый индекс</label>
              <input type="text" class="form-control" id="insurer_index" name="insurer_index" required>
            </div>

            <div class="form-group">
              <label for="">Город или населенный пункт</label>
              <input type="text" class="form-control" id="insurer_city" name="insurer_city" style="width: 650px;" required>
            </div>

            <div class="form-group">
              <label for="">Улица</label>
              <input type="text" class="form-control" id="insurer_street" name="insurer_street" style="width: 650px;" required>
            </div>

            <div class="form-group">
              <label for="">Дом</label>
              <input type="text" class="form-control" id="insurer_house" name="insurer_house" style="text-align: left; width: 120px; " >
            </div>

            <hr>

            <div class="form-group"  style="float: left;">
              <label for="">Расчетный счет</label>
              <input type="text" class="form-control" id="insurer_checx" name="insurer_checx" style="font-size: 18px;" required>
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">ИНН</label>
              <input type="text" class="form-control" id="insurer_inn" name="insurer_inn" style="font-size: 18px;" required>
            </div>

            <div class="form-group" style="float: left;">
              <label for="">БИК</label>
              <input type="text" class="form-control" id="insurer_bic" name="insurer_bic" style="font-size: 18px;" required>
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">Корреспонденский счет</label>
              <input type="text" class="form-control" id="insurer_checx2" name="insurer_checx2" style="font-size: 18px;" required>
            </div>

            <legend><h1>Страхователь</h1></legend>

            <div class="form-group" style="float: left;">
              <label for="">Мобильнй телефон</label>
              <input type="text" class="form-control" id="phone" name="user_phone" placeholder="+7 (999) 99 99 999" required>
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">E-mail</label>
              <input type="text" class="form-control" id="" name="insurant_email" placeholder="test@mail.ru" required>
            </div>

            <div class="form-group">
      				<label for="">Фамилия</label>
      				<input type="text" class="form-control" id="insurant_lastname" name="insurant_lastname" placeholder="Иванов" style="width: 650px;" required>
      			</div>

            <div class="form-group">
      				<label for="">Имя</label>
      				<input type="text" class="form-control" id="insurant_name" name="insurant_name" placeholder="Иван" style="width: 650px;" required>
      			</div>

            <div class="form-group">
              <label for="">Отчество</label>
              <input type="text" class="form-control" id="insurant_middlename" name="insurant_middlename" placeholder="Иванович" style="width: 650px;" required>
            </div>

            <label><h3>Ваш пол</h3></label>

            <br>

            <div class="form-group" style="float: left;">
              <label for="" style="font-size: 1.4em;">
                <span>
                  <input type="radio" class="control" id="gender" name="gender" value="Man" style="width: 25px; height: 25px;" checked>
                </span>
                Мужчина
              </label>
            </div>

            <div class="form-group"  style="float: left; margin-left: 50px;">
              <label for="" style="font-size: 1.4em;">
                <span>
                  <input type="radio" class="control" id="gender" name="gender" value="Woman" style="width: 25px; height: 25px;" >
                </span>
                Женщина
              </label>
            </div>

            <br><br><br>

            <div class="form-group">
              <label for="">Дата рождения</label>
              <input type="text" class="form-control" id="date_mask" name="insurant_birthdate" placeholder="12/02/1995" style="width: 220px;" required>
            </div>

            <legend><h3>Паспортные данные</h3></legend>

            <div class="form-group">
              <label for="">Серия и номер паспорта</label>
              <input type="text" class="form-control" id="psn" name="insurant_psn" placeholder="XX XX XXXXXX" style="width: 235px;" required>
            </div>

            <div class="form-group">
              <label for="">Кем выдан</label>
              <textarea class="" id="" name="issued_by" rows="3" cols="42" style="font-size: 26px; color: white;" required></textarea>
            </div>


            <div class="form-group">
              <label for="">Дата выдачи</label>
              <input type="text" class="form-control" id="date_mask2" name="date_issue" placeholder="12/02/1995" style="width: 220px;" required>
            </div>

            <legend><h3>Адрес регистрации</h3></legend>

            <div class="form-group">
              <label for="">Город или населенный пункт</label>
              <input type="text" class="form-control" id="insurant_city_reg" name="insurant_city_reg" placeholder="Введите город или населенный пункт" style="width: 650px;" required>
            </div>

            <div class="form-group">
              <label for="">Улица</label>
              <input type="text" class="form-control" id="insurant_street_reg" name="insurant_street_reg" placeholder="Введите улицу" style="width: 650px;" required>
            </div>

            <div class="form-group" style="float: left;">
              <label for="">Дом</label>
              <input type="text" class="form-control" id="insurant_house_reg" name="insurant_house_reg" style="text-align: left; width: 120px;" >
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">Квартира</label>
              <input type="text" class="form-control" id="insurant_room_reg" name="insurant_room_reg" style="text-align: left; width: 120px;" >
            </div>

            <legend><h3>Адрес проживания</h3></legend>

            <div class="form-group" style="text-align: center;">
              <label for="" >
                <span>
                  <input type="checkbox" id="checkOne" name="insurant_address_res" style="width: 20px; height: 20px;">
              </span>
                Адрес проживания совпадает с адресом регистрации
              </label>
            </div>

            <div class="form-group">
              <label for="">Город или населенный пункт</label>
              <input type="text" class="form-control" id="insurant_city_res" name="insurant_city_res" placeholder="Введите город или населенный пункт" style="width: 650px;" required>
            </div>

            <div class="form-group">
              <label for="">Улица</label>
              <input type="text" class="form-control" id="insurant_street_res" name="insurant_street_res" placeholder="Введите улицу" style="width: 650px;" required>
            </div>

            <div class="form-group" style="float: left;">
              <label for="">Дом</label>
              <input type="text" class="form-control" id="insurant_house_res" name="insurant_house_res" style="text-align: left; width: 120px;" >
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">Квартира</label>
              <input type="text" class="form-control" id="insurant_room_res" name="insurant_room_res" style="text-align: left; width: 120px;" >
            </div>

            <legend><h1>Застрахованный</h1></legend>

            <div class="form-group" style="text-align: center;">
              <label for="" >
                <span><input type="checkbox" class="" id="insured_include" name="insured_include"  style="width: 20px; height: 20px;"></span>
                Включить страхователя в список застрахованных
              </label>
            </div>

            <div class="form-group">
      				<label for="">Фамилия</label>
      				<input type="text" class="form-control" id="insured_lastname" name="insured_lastname" placeholder="Иванов" style="width: 650px;" required>
      			</div>

            <div class="form-group">
      				<label for="">Имя</label>
      				<input type="text" class="form-control" id="insured_name" name="insured_name" placeholder="Иван" style="width: 650px;" required>
      			</div>

            <div class="form-group">
              <label for="">Отчество</label>
              <input type="text" class="form-control" id="insured_middlename" name="insured_middlename" placeholder="Иванович" style="width: 650px;" required>
            </div>

            <div class="form-group">
              <label for="">Дата рождения</label>
              <input type="text" class="form-control" id="date_mask3" name="insured_birthdate" placeholder="12/02/1995" style="width: 220px;" required>
            </div>

            <hr>

              <input type="submit" class="btn" id="btn" name="payment" value="Оплатить" style="margin: auto; border-radius: 12px; ">


              <div class="" style="float: right; margin-top: 24px; font-size: 2em; color: white;">Cтоимость полиса: <?php echo "12399"; ?> руб.</div>


      		</form>

        <?php else : ?>

          <?php $months = array('01','02','03','04','05','06','07','08','09','10','11','12'); ?>
          <?php $years = array('2018','2019','2020','2021','2022','2023','2024','2025','2026','2027','2028'); ?>

          <?php $app = $_POST['insurer_appellation']; ?>
          <?php $ex = $_POST['insurer_index']; ?>
          <?php $c =  $_POST['insurer_city']; ?>
          <?php $st = $_POST['insurer_street']; ?>
          <?php $h =  $_POST['insurer_house']; ?>
          <?php $ch =  $_POST['insurer_checx']; ?>
          <?php $k =  $_POST['insurer_inn']; ?>
          <?php $b =  $_POST['insurer_bic']; ?>
          <?php $ch2 =  $_POST['insurer_checx2']; ?>
          <?php $sUm =  $_POST['sumOne']; ?>

          <link rel="stylesheet" href="/css/pay.css">

          <form action="contract.php" method="POST">

            <legend><h1>Оплата с банковской карты</h1></legend>

            <div class="form-group">
              <label for="">Номер карты</label>
              <input type="text" class="form-control" id="card_number" name="user_number" placeholder="XXXX XXXX XXXX XXXX" style="width: 450px;" required>
            </div>

            <label for="" style="float: left; margin-right: 10px; margin-top: 15px;">Действует до</label>

            <div class="form-group" style="float: left; margin-right: 5px;">
              <select class="form-group" name="owner_month" style="font-size: 1.4em;color: white;" required>
                <option value=""></option>
                <?php
                foreach ($months as $month) {
                  echo "<option value=$month>$month</option>";
                }
                 ?>
              </select>
            </div>

            <div class="form-group" style="float: left; margin-right: 5px;font-size: 2.2em; color: white;">/</div>

            <div class="form-group" >
              <select class="form-group" name="owner_year" style="font-size: 1.4em;color: white;" required>
                <option value=""></option>
                <?php
                foreach ($years as $year) {
                  echo "<option value=$year>$year</option>";
                }
                 ?>
               </select>
            </div>

            <div class="form-group">
      				<label for="">Имя и фамилия владельца</label>
      				<input type="text" class="form-control" id="" name="owner_name" placeholder="IVAN IVANOV" style="width: 450px;text-transform: uppercase;" required>
      			</div>

            <label for="" style="float: left; margin-right: 10px; margin-top: 15px;">Код CVV</label>

            <div class="form-group">
      				<input type="text" class="form-control" id="kod-CVV" name="user_kod" placeholder="123" style="width: 120px;" required>
      			</div>

            <div class="form-group">
              <label for="">E-mail</label>
              <input type="text" class="form-control" id="" name="user_email" placeholder="test@mail.ru" style="width: 450px;" required>
            </div>

            <hr>

            <button type="submit" class="btn">Заплатить</button>
            <div class="" style="float: right; margin-top: 20px; font-size: 1.4em; color: rgba(11, 5, 1, 0.65);">Сумма к оплате: <?php echo "12399"; ?> руб.</div>

            <div class="hidden">
              <input type="text" name="app" value="<?php echo $app; ?>">
              <input type="text" name="ex" value="<?php echo $ex; ?>">
              <input type="text" name="c" value="<?php echo $c; ?>">
              <input type="text" name="st" value="<?php echo $st; ?>">
              <input type="text" name="h" value="<?php echo $h; ?>">
              <input type="text" name="ch" value="<?php echo $ch; ?>">
              <input type="text" name="k" value="<?php echo $k; ?>">
              <input type="text" name="b" value="<?php echo $b; ?>">
              <input type="text" name="ch2" value="<?php echo $ch2; ?>">
              <input type="text" name="sumTow" value="<?php echo $sUm; ?>">

              <input type="text" name="1" value="<?php echo $_POST['user_phone']; ?>">
              <input type="text" name="2" value="<?php echo $_POST['insurant_email']; ?>">
              <input type="text" name="3" value="<?php echo $_POST['insurant_lastname']; ?>">
              <input type="text" name="4" value="<?php echo $_POST['insurant_name']; ?>">
              <input type="text" name="5" value="<?php echo $_POST['insurant_middlename']; ?>">
              <input type="text" name="6" value="<?php echo $_POST['insurant_birthdate']; ?>">
              <input type="text" name="7" value="<?php echo $_POST['insurant_psn']; ?>">
              <input type="text" name="8" value="<?php echo $_POST['date_issue']; ?>">
              <input type="text" name="9" value="<?php echo $_POST['insurant_city_reg']; ?>">
              <input type="text" name="10" value="<?php echo $_POST['insurant_street_reg']; ?>">
              <input type="text" name="11" value="<?php echo $_POST['insurant_house_reg']; ?>">
              <input type="text" name="12" value="<?php echo $_POST['insurant_room_reg']; ?>">
              <input type="text" name="13" value="<?php echo $_POST['insurant_city_res']; ?>">
              <input type="text" name="14" value="<?php echo $_POST['insurant_street_res']; ?>">
              <input type="text" name="15" value="<?php echo $_POST['insurant_house_res']; ?>">
              <input type="text" name="16" value="<?php echo $_POST['insurant_room_res']; ?>">

              <input type="radio" name="px" value="<?php echo $_POST['gender']; ?>">

              <input type="text" name="17" value="<?php echo $_POST['insured_lastname']; ?>">
              <input type="text" name="18" value="<?php echo $_POST['insured_name']; ?>">
              <input type="text" name="19" value="<?php echo $_POST['insured_middlename']; ?>">
              <input type="text" name="20" value="<?php echo $_POST['insured_birthdate']; ?>">



            </div>

          </form>

        <?php endif; ?>

      	</div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="libs/jquery.magnific-popup.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#card_number").mask("9999 9999 9999 9999");
        $("#kod-CVV").mask("999");
      });
    </script>
    <script>
        $("#checkOne").change(function() {
          var city = $("#insurant_city_reg").val();
          var street = $("#insurant_street_reg").val();
          var house = $("#insurant_house_reg").val();
          var room = $("#insurant_room_reg").val();
          if($("#checkOne").prop("checked") == true) {
            $("#insurant_city_res").val(city);
            $("#insurant_street_res").val(street);
            $("#insurant_house_res").val(house);
            $("#insurant_room_res").val(room);
          }
          else {
            $("#insurant_city_res").val('');
            $("#insurant_street_res").val('');
            $("#insurant_house_res").val('');
            $("#insurant_room_res").val('');
          }
        });
        $("#insured_include").change(function() {
          var lastname = $("#insurant_lastname").val();
          var name = $("#insurant_name").val();
          var middlename = $("#insurant_middlename").val();
          var birthdate = $("#date_mask").val();
          if($("#insured_include").prop("checked") == true) {
            $("#insured_lastname").val(lastname);
            $("#insured_name").val(name);
            $("#insured_middlename").val(middlename);
            $("#insured_birthdate").val(birthdate);
          }
          else {
            $("#insured_lastname").val('');
            $("#insured_name").val('');
            $("#insured_middlename").val('');
            $("#insured_birthdate").val('');
          }
        });
</script>
    <script>
      $(document).ready(function() {
        $("#phone").mask("+7 (999) 99-99-999");
        $("#date_mask").mask("99/99/9999");
        $("#date_mask2").mask("99/99/9999");
        $('#psn').mask("99 99 999999");
        $("#date_mask3").mask("99/99/9999");
      });
    </script>
    <script type="text/javascript">
      function autofill() {
        var insurer_appellation = $("#insurer_appellation").val();
        $.ajax({
          url: 'details_insurer.php',
          data: 'insurer_appellation='+insurer_appellation,
        }).success(function(data) {
          var json = data,
          obj = JSON.parse(json);
          $("#insurer_index").val(obj.postcode);
          $("#insurer_city").val(obj.insurer_city);
          $("#insurer_street").val(obj.insurer_street);
          $("#insurer_house").val(obj.insurer_house);
          $("#insurer_checx").val(obj.checkAccount);
          $("#insurer_inn").val(obj.TIN);
          $("#insurer_bic").val(obj.BIC);
          $("#insurer_checx2").val(obj.corAccount);
          $("#sumOne").val(obj.sumIns)
        });
    }
    </script>
  </body>
</html>
