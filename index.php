


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <title>Авторизация</title>
  </head>
  <body>

    <div class="container">
      <?php if (empty($_SESSION['logged_user'])) : ?>
      <img src="img/lock.png">
      <form class="" action="index.php" method="post">
        <div class="dws-input">
          <input type="text" name="username" placeholder="Введите логин" value="<?php echo @$_POST['username']; ?>">
        </div>
        <div class="dws-input">
          <input type="password" name="password" placeholder="Введите пароль">
        </div>
        <input class="dws-submit" type="submit" name="submit" value="Войти">
        <br>
        <a href="\sugnup.php">Регистрация</a>
      </form>

    <?php else : ?>
      <div style="padding: 10px;">
        <h1 style="color: white;">Добро пожаловать, <span style="color: #eec30a;"><?php echo $_SESSION['logged_user']->login; ?></span></h1>
      </div>

      <hr>

      <div style="padding: 50px;font-size: 2.4em;">
        <p><a href="\personal.php" style="color: #ee7e0a;">Мой профиль</a></p>
        <p><a href="\exit.php" style="color: #f0f0f0;">Выйти</a></p>
      </div>
    <?php endif; ?>

    </div>
  </body>
</html>
