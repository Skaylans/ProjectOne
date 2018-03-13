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
      $err[] = 'Поле email незаполненно!';
    }
    else if ($password == '') {
      $err[] = 'Поле пароль незаполненно!';
    }
    else if ($password != $password_2) {
      $err[] = 'Пароль введен не верно!';
    }

    if(empty($err)) {
        $sql_select = "SELECT * FROM users WHERE login = '$username'";
        $stmt = $conn->query($sql_select);
        $stmt->execute();
        $data = $stmt->fetchAll();
      if(count($data > 0) {
            $sql_insert = "INSERT INTO users (login, email, password) VALUES (?,?,?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $username);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $password);
            $stmt->execute();
            echo '<div style= "color: white;">Вы зарегистрированны!</div><hr>';
        }
        else {
          echo '<div style = "color: red;">Пользователь с таким логином уже существует!</div><hr>';
    }
    else {
      echo '<div style = "color: red; text-align: center">'.array_shift($err).'</div><hr>';
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
