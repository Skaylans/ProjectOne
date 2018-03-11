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
              <input type="text" class="form-control" id="" name="user_email" placeholder="test@mail.ru">
            </div>

            <div class="form-group">
      				<label for="">Фамилия</label>
      				<input type="text" class="form-control" id="" name="user_lastname" placeholder="Иванов" style="width: 650px;">
      			</div>

            <div class="form-group">
      				<label for="">Имя</label>
      				<input type="text" class="form-control" id="" name="user_name" placeholder="Иван" style="width: 650px;">
      			</div>

            <div class="form-group">
              <label for="">Отчество</label>
              <input type="text" class="form-control" id="" name="user_middlename" placeholder="Иванович" style="width: 650px;">
            </div>

            <label><h3>Ваш пол</h3></label>

            <br>

            <div class="form-group" style="float: left;">
              <label for="" style="font-size: 1.4em;">
                <span>
                  <input type="radio" class="control" id="" name="user_gender" value="Man" style="width: 25px;
                height: 25px;"></span>
                Мужчина
              </label>
            </div>

            <div class="form-group"  style="float: left; margin-left: 50px;">
              <label for="" style="font-size: 1.4em;">
                <span><input type="radio" class="control" id="" name="user_gender" value="Woman" style="width: 25px;
                height: 25px;"></span>
                Женщина
              </label>
            </div>

            <br><br><br>

            <div class="form-group">
              <label for="">Дата рождения</label>
              <input type="text" class="form-control" id="date_mask" name="user_birthdate" placeholder="12/02/1995" style="width: 220px;">
            </div>

            <legend><h3>Паспортные данные</h3></legend>

            <div class="form-group">
              <label for="">Серия и номер паспорта</label>
              <input type="text" class="form-control" id="psn" name="user_psn" placeholder="XX XX XXXXXX" style="width: 235px;">
            </div>

            <div class="form-group">
              <label for="">Кем выдан</label>
              <textarea name="user_from" class="" id="" name="user_data" rows="3" cols="42" style="font-size: 26px; color: white;"></textarea>
            </div>

            <div class="form-group">
              <label for="">Дата выдачи</label>
              <input type="text" class="form-control" id="date_mask2" name="user_date" placeholder="12/02/1995" style="width: 220px;">
            </div>

            <legend><h3>Адрес регистрации</h3></legend>

            <div class="form-group">
              <label for="">Город или населенный пункт</label>
              <input type="text" class="form-control" id="" name="user_city" placeholder="Введите город или населенный пункт" style="width: 650px;">
            </div>

            <div class="form-group">
              <label for="">Улица</label>
              <input type="text" class="form-control" id="" name="user_street" placeholder="Введите улицу" style="width: 650px;">
            </div>

            <div class="form-group" style="float: left;">
              <label for="">Дом</label>
              <input type="text" class="form-control" id="" name="user_house" style="text-align: center;">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">Квартира</label>
              <input type="text" class="form-control" id="" name="user_room" style="text-align: center;">
            </div>

            <legend><h3>Адрес проживания</h3></legend>

            <div class="form-group" style="text-align: center;">
              <label for="" >
                <span><input type="checkbox" class="" id="" name="user_address" style="width: 20px;
                height: 20px;"></span>
                Адрес проживания совпадает с адресом регистрации
              </label>
            </div>

            <div class="form-group">
              <label for="">Город или населенный пункт</label>
              <input type="text" class="form-control" id="" name="user_city" placeholder="Введите город или населенный пункт" style="width: 650px;">
            </div>

            <div class="form-group">
              <label for="">Улица</label>
              <input type="text" class="form-control" id="" name="user_street" placeholder="Введите улицу" style="width: 650px;">
            </div>

            <div class="form-group" style="float: left;">
              <label for="">Дом</label>
              <input type="text" class="form-control" id="" name="user_house" style="text-align: center;">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">Квартира</label>
              <input type="text" class="form-control" id="" name="user_room" style="text-align: center;">
            </div>

            <legend><h1>Застрахованный</h1></legend>

            <div class="form-group" style="text-align: center;">
              <label for="" >
                <span><input type="checkbox" class="" id="" name="user_include"  style="width: 20px; height: 20px;"></span>
                Включить страхователя в список застрахованных
              </label>
            </div>

            <div class="form-group">
      				<label for="">Фамилия</label>
      				<input type="text" class="form-control" id="" name="user_lastname" placeholder="Иванов" style="width: 650px;">
      			</div>

            <div class="form-group">
      				<label for="">Имя</label>
      				<input type="text" class="form-control" id="" name="user_name" placeholder="Иван" style="width: 650px;">
      			</div>

            <div class="form-group">
              <label for="">Отчество</label>
              <input type="text" class="form-control" id="" name="user_middlename" placeholder="Иванович" style="width: 650px;">
            </div>

            <div class="form-group">
              <label for="">Дата рождения</label>
              <input type="text" class="form-control" id="date_mask3" name="user_birthdate" placeholder="12/02/1995" style="width: 220px;">
            </div>

            <hr>

      			<button type="submit" class="btn">Оплатить полис</button>

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
