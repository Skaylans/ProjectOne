<?php require_once('db.php'); ?>
<?php if (!empty($_SESSION)) : ?>
<div style="color: #fefeff;font-size: 1.6em;">
  <p style="text-align: center;">
    Сейчас авторизован пользователь:
    <span style="color: #eec30a;">
      <?php echo $_SESSION['logged_user']; ?>
    </span>
  </p>
</div>
<a href="\myDogovor.php" title="Мои договоры"><div class="btnOne">Мои договоры</div></a>
<?php endif; ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/buttons.css">
    <title>Личный кабинет</title>
  </head>
  <body>
    <div class="prime-box">
      <div id="reg_auth">
        <a href="\choice.php" title="Оформить полис"><div class="btn">Страхование</div></a>
        <a href="\exit.php" title="Выйти из личного кабинета"><div class="btn">Выйти</div></a>
       </div>
    </div>
  </body>
</html>
