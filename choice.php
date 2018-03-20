<?php require_once('db.php'); ?>
<?php if (!empty($_SESSION)) : ?>
<div style="color: #fefeff;write;font-size: 1.6em;">
  <p style="text-align: center;"> <a href="/personal.php"><img src="img/left207.png" style="width: 25px;height: 25px; float: left;"></a>
    Сейчас авторизован пользователь:
    <span style="color: #eec30a;">
      <?php echo $_SESSION['logged_user']; ?>
    </span>
  </p>

</div>
<?php endif; ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/un-form.css">
    <title>Выбор страховщика</title>
  </head>
  <body>
    <div class="content">
      <form class="" action="basis-policy.php" method="post">
        <div class="insurer-box">Выберите страховщика</div>
        <div class="select-insurer">
          <select class="dws-insurer" name="insurer">
            <option value=""></option>
            <option value="Тинькофф Страхование">Тинькофф Страхование</option>
            <option value="БИНБАНК">БИНБАНК</option>
          </select>
          <input class="btn" type="submit" name="create" value="Оформить полис">
        </div>
      </form>
    </div>
  </body>
</html>
