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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <title>Выбор страховщика</title>
  </head>
  <style media="screen">
  .filfix {
    font-size: 22px;
    padding-left: 100px;
  }
  </style>
  <body>
    <div class="content">
      <form class="" action="send.php" method="post">
        <div class="insurer-box">Прикрепите пакет документов</div>
        <div class="select-insurer">
          <input name="fileAttach" type="file" class="filfix" required>
          <input class="btn" type="submit" name="create" value="Отправить">
        </div>
      </form>
    </div>
  </body>
</html>>
