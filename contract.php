<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/dogovor.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <title>Заключение договора</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
      	<div class="col-sm-4">
      		<form action="form.php" method="POST">

            <legend><h1>Страховщик</h1></legend>

            <div class="form-group">
              <label for="">Наименование</label>
              <input type="text" class="form-control" id="" name="user_name" style="width: 650px;">
            </div>

            <legend><h3>Адрес местоположения</h3></legend>

            <div class="form-group">
              <label for="">Почтовый индекс</label>
              <input type="text" class="form-control" id="" name="user_index"style="width: 650px;">
            </div>

            <div class="form-group">
              <label for="">Город или населенный пункт</label>
              <input type="text" class="form-control" id="" name="user_city"style="width: 650px;">
            </div>

            <div class="form-group">
              <label for="">Улица</label>
              <input type="text" class="form-control" id="" name="user_street"style="width: 650px;">
            </div>

            <div class="form-group">
              <label for="">Дом</label>
              <input type="text" class="form-control" id="" name="user_house" style="text-align: center;">
            </div>

            <hr>

            <div class="form-group"  style="float: left;">
              <label for="">Расчетный счет</label>
              <input type="text" class="form-control" id="" name="user_checx">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">ИНН</label>
              <input type="text" class="form-control" id="" name="user_inn">
            </div>

            <br><br><br><br><br><br><br>

            <div class="form-group" style="float: left;">
              <label for="">БИК</label>
              <input type="text" class="form-control" id="" name="user_bic">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">Корреспонденский счет</label>
              <input type="text" class="form-control" id="" name="user_checx2">
            </div>



            <legend><h1>Страхователь</h1></legend>

            <div class="form-group" style="float: left;">
              <label for="">Мобильнй телефон</label>
              <input type="text" class="form-control" id="phone" name="user_phone">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">E-mail</label>
              <input type="text" class="form-control" id="" name="user_email">
            </div>

            <br><br><br><br><br><br><br>

            <div class="form-group">
      				<label for="">Фамилия</label>
      				<input type="text" class="form-control" id="" name="user_lastname" style="width: 650px;">
      			</div>

            <div class="form-group">
      				<label for="">Имя</label>
      				<input type="text" class="form-control" id="" name="user_name" style="width: 650px;">
      			</div>

            <div class="form-group">
              <label for="">Отчество</label>
              <input type="text" class="form-control" id="" name="user_middlename" style="width: 650px;">
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
              <input type="text" class="form-control" id="date_mask" name="user_birthdate" style="width: 220px;">
            </div>

            <legend><h3>Паспортные данные</h3></legend>

            <div class="form-group">
              <label for="">Серия и номер паспорта</label>
              <input type="text" class="form-control" id="psn" name="user_psn" style="width: 235px;">
            </div>


            <div class="form-group">
              <label for="">Кем выдан</label>
              <textarea name="user_from" class="" id="" name="user_data" rows="3" cols="60" style="font-size: 26px; color: white;"></textarea>
            </div>


            <div class="form-group">
              <label for="">Дата выдачи</label>
              <input type="text" class="form-control" id="date_mask2" name="user_date" style="width: 220px;">
            </div>

            <legend><h3>Адрес регистрации</h3></legend>

            <div class="form-group">
              <label for="">Город или населенный пункт</label>
              <input type="text" class="form-control" id="" name="user_city"  style="width: 650px;">
            </div>

            <div class="form-group">
              <label for="">Улица</label>
              <input type="text" class="form-control" id="" name="user_street"  style="width: 650px;">
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

            <div class="form-group">
              <label for="">Город или населенный пункт</label>
              <input type="text" class="form-control" id="" name="user_city"  style="width: 650px;">
            </div>

            <div class="form-group">
              <label for="">Улица</label>
              <input type="text" class="form-control" id="" name="user_street"  style="width: 650px;">
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

            <div class="form-group">
      				<label for="">Фамилия</label>
      				<input type="text" class="form-control" id="" name="user_lastname"  style="width: 650px;">
      			</div>

            <div class="form-group">
      				<label for="">Имя</label>
      				<input type="text" class="form-control" id="" name="user_name"  style="width: 650px;">
      			</div>

            <div class="form-group">
              <label for="">Отчество</label>
              <input type="text" class="form-control" id="" name="user_middlename"  style="width: 650px;">
            </div>

            <div class="form-group">
              <label for="">Дата рождения</label>
              <input type="text" class="form-control" id="date_mask3" name="user_birthdate"  style="width: 220px;">
            </div>

            <legend><h1>Срок страхования</h1></legend>

            <div class="form-group" style="float: left;">
              <label for="">Начало</label>
              <input type="text" class="form-control" id="" name="user_date1" placeholder="12/02/1995" style="text-align: center;">
            </div>

            <div class="form-group" style="float: left; margin-left: 50px;">
              <label for="">Окончание</label>
              <input type="text" class="form-control" id="" name="user_date2" placeholder="12/02/1995" style="text-align: center;">
            </div>

            <legend><h1>Страховая сумма</h1></legend>

            <div class="form-group">
              <input type="text" class="form-control" id="" name="user_sum" style="text-align: center;">
            </div>

            <legend><h1>Страховой случай</h1></legend>

            <div class="form-group">
              <select class="form-group" name="">
                <option value=""></option>
              </select>
            </div>

            <div class="form-group">
              <label for="">Дата заключения договора</label>
              <input type="text" class="form-control" id="" name="user_date3" placeholder="12/02/1995">
            </div>

            <hr>

      			<button type="submit" class="btn">Заключить</button>

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
        $("#").mask("");
      });
    </script>
  </body>
</html>
