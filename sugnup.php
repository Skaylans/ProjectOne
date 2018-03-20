<?php
require_once('db.php');
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password_1 = $_POST['password-1'];
    $password_2 = $_POST['password-2'];
    $email = $_POST['email'];

    $err = array();
    if(empty($username)) {
        $err[] = 'Поле логин незаполненно!';
    }
    elseif(empty($email)) {
        $err[] = 'Поле E-mail незаполненно!';
    }
    elseif(empty($password_1)) {
        $err[] = 'Поле пароль незаполненно!';
    }
    elseif($password_1 != $password_2) {
        $err[] = 'Неправельно заполнен повторный пароль';
    }

    if(empty($err)) {
        $sql_select = "SELECT * FROM users WHERE login = '$username' OR email = '$email' ";
        $stmt = $conn->query($sql_select);
        $stmt->execute();
        $data = $stmt->fetchAll();
        if(count($data) == 0) {
            $sql_insert = "INSERT INTO users (login, password, email) VALUES (?,?,?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $username);
            $stmt->bindValue(2, $password_1);
            $stmt->bindValue(3, $email);
            $stmt->execute();

            echo '<div style= "color: blue; text-align: center;">Вы зарегистрированны!</div><hr>';
        }
        else {
            echo '<div style = "color: red; text-align: center;">Пользователь с таким логином или E-mail уже существует!</div><hr>';
        }
    }
    else {
        echo '<div style = "color: red; text-align: center;">'.array_shift($err).'</div><hr>';
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/sug.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <title>Страхование жизни</title>
  </head>
  <body>
    <div class="container">
      <a href="/index.php"><img src="img/lock.png"></a>
      <form class="" action="sugnup.php" method="post">
        <div class="dws-input">
          <input type="text" name="username" placeholder="Придумайте логин">
          <input type="text" name="email" placeholder="Ваш E-mail...">
          <input type="password" name="password-1" placeholder="Придумайте пароль">
          <input type="password" name="password-2" placeholder="Введите пароль еще раз">
        </div>
        <input class="dws-submit" type="submit" name="submit" value="Регистрация">
      </form>
    </div>
  </body>
</html>
