<?php $months = array('1','2','3','4','5','6','7','8','9','10','11','12'); ?>
<?php $years = array('2018','2019','2020','2021','2022','2023','2024','2025','2026','2027','2028'); ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/pay.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <title>Оплата полиса</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
      	<div class="col-sm-4">
      		<form action="payment.php" method="POST">

            <legend><h1>Оплата с банковской карты</h1></legend>

            <div class="form-group">
              <label for="">Номер карты</label>
              <input type="text" class="form-control" id="card_number" name="user_number" placeholder="XXXX XXXX XXXX XXXX" style="width: 450px;">
            </div>

            <label for="" style="float: left; margin-right: 10px; margin-top: 15px;">Действует до</label>

            <div class="form-group" style="float: left; margin-right: 5px;">
              <select class="form-group" name="owner_month" style="font-size: 1.4em;color: white;">
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
              <select class="form-group" name="owner_year" style="font-size: 1.4em;color: white;">
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
      				<input type="text" class="form-control" id="" name="owner_name" placeholder="IVAN IVANOV" style="width: 450px;text-transform: uppercase;">
      			</div>

            <label for="" style="float: left; margin-right: 10px; margin-top: 15px;">Код CVV</label>

            <div class="form-group">
      				<input type="text" class="form-control" id="kod-CVV" name="user_kod" placeholder="123" style="width: 120px;">
      			</div>

            <div class="form-group">
              <label for="">E-mail</label>
              <input type="text" class="form-control" id="" name="user_email" placeholder="test@mail.ru" style="width: 450px;">
            </div>

            <hr>

            <button type="submit" class="btn">Заплатить</button>

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
        $("#card_number").mask("9999 9999 9999 9999");
        $("#kod-CVV").mask("999");
      });
    </script>

  </body>
</html>
