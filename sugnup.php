<?php

require_once('db.php');

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_2 = $_POST['password-2'];

    $err = array();
    if (trim($username) == '') {
      $err[] = 'Поле логин незаполенно!';
    }
    else if (trim($email) == '') {
      $err[] = "Поле email незаполненно!";
    }
    else if ($password == '') {
      $err[] = "Поле пароль незаполненно!";
    }
    else if ($password != $password_2) {
      $err[] = "Пароль введен не верно!";
    }
    else if (R::count('users', "login = ?", array($username)) > 0)  {
      $err[] = "Пользователь с таким логином уже существует!";
    }
    else if (R::count('users', "email = ?", array($email)) > 0)  {
      $err[] = "Пользователь с таким Email уже существует!";
    }

    if (empty($err)) {
      $user = R::dispense('users');
      $user->login = $username;
      $user->email = $email;
      $user->password = password_hash($password, PASSWORD_DEFAULT);
      R::store($user);

      echo '<div style="color: #2715f9;text-align: center;">Вы зарегистрированны!</div><hr>';
    }
    else {
       echo '<div style="color: #fc0808;text-align: center;">'.array_shift($err).'</div><hr>';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/sug.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <title>Регистрация</title>
  </head>
  <body>

    <div class="container">
      <a href="/index.php"><img src="img/user.png"></a>
      <form class="" action="sugnup.php" method="post">
        <div class="dws-input">
          <input type="text" name="username" placeholder="Придумайте логин" value="<?php echo @$_POST['username']; ?>">
        </div>
        <div class="dws-input">
          <input type="email" name="email" placeholder="Ваш email..." value="<?php echo @$_POST['email']; ?>">
        </div>
        <div class="dws-input">
          <input type="password" name="password" placeholder="Придумайте пароль">
        </div>
        <div class="dws-input">
          <input type="password" name="password-2" placeholder="Введите пароль еще раз">
        </div>
        <input class="dws-submit" type="submit" name="register" value="Регистрация">
      </form>
    </div>
  </body>
</html>
