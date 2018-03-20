<?php require_once('db.php'); ?>
<?php
$sql_select = "SELECT * FROM users";
$stmt = $conn->query($sql_select);
$stmt->execute();
$users = $stmt->fetchAll();

if(isset($_POST["createTwo"])) {
      $sql = "CREATE TABLE insurer(
          insurer_id INT NOT NULL IDENTITY(1,1),
          PRIMARY KEY(id),
          appellation VARCHAR(50),
          TIN VARCHAR(50),
          checkAccount VARCHAR(50),
          BIC VARCHAR(50),
          corAccount VARCHAR(50),
          postcode VARCHAR(10),
          insurer_city VARCHAR(50),
          insurer_street VARCHAR(30),
          insurer_house VARCHAR(5),
          sumIns INT)";
          $conn->query($sql);
  echo '<div style = "color: red; text-align: center;">Таблица Страховщики создана!</div><hr>';
}

if(isset($_POST["createOne"])) {
      $sql = "CREATE TABLE insurant(
          insurant_id INT NOT NULL IDENTITY(1,1),
          PRIMARY KEY(id),
          insurant_first_name VARCHAR(50),
          insurant_last_name VARCHAR(50),
          insurant_middle_name VARCHAR(50),
          insurant_email VARCHAR(50),
          gender VARCHAR(10),
          insurant_birthdate VARCHAR(10),
          phone_number VARCHAR(20),
          insurant_city_reg VARCHAR(50),
          insurant_street_reg VARCHAR(30),
          insurant_house_reg VARCHAR(5),
          insurant_apartment_reg VARCHAR(10),
          insurant_city_res VARCHAR(50),
          insurant_street_res VARCHAR(30),
          insurant_house_res VARCHAR(5),
          insurant_apartment_res VARCHAR(10),
          series_number VARCHAR(15),
          issuedBy VARCHAR(100),
          dateIssue VARCHAR(10),
          cardNumber VARCHAR(20),
          transferAmount INT)";

          $conn->query($sql);

          echo "<h3>Таблица Страхователя создана.</h3>";
}

if(isset($_POST["createFour"])) {
      $sql = "CREATE TABLE contract(
          contract_id INT NOT NULL IDENTITY(1,1),
          PRIMARY KEY(id),
          insurant_id INT,
          insurer_id INT,
          insured_id INT,
          start_date VARCHAR(10),
          end_date VARCHAR(10),
          insuranceEvent VARCHAR(50),
          insurancePeriod VARCHAR(10))";

          $conn->query($sql);

          echo "<h3>Таблица Страхователя создана.</h3>";
}

if(isset($_POST["createThree"])) {
      $sql = "CREATE TABLE insured(
          insured_id INT NOT NULL IDENTITY(1,1),
          PRIMARY KEY(id),
          insured_first_name VARCHAR(50),
          insured_last_name VARCHAR(50),
          insured_middle_name VARCHAR(50),
          insured_birthdate VARCHAR(10))";

          $conn->query($sql);

          echo "<h3>Таблица Страхователя создана.</h3>";
}


 ?>

<!DOCTYPE html>
<html>
 <head>
  <title>Таблица - Пользователи</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

 </head>
 <body>
  <div class="container">
   <h1 align="center">Пользователи</h1>
   <br>
   <div class="table-responsive">
    <table id="" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th style='text-align: center;'>ID</th>
       <th>Логин</th>
       <th>E-mail</th>
       <th>Пароль</th>
      </tr>
      <?php foreach ($users as $user): ?>
        <?php echo "<td style='text-align: center;'>".$user['id']."</td>"; ?>
        <?php echo "<td>".$user['login']."</td>"; ?>
        <?php echo "<td>".$user['email']."</td>"; ?>
        <?php echo "<td>".$user['password']."</td></tr>"; ?>
      <?php endforeach; ?>
     </thead>
    </table>
    <input type="submit" name="createOne" value="Создать таблицу страхователи">
    <input type="submit" name="createTwo" value="Создать таблицу страховщики">
    <input type="submit" name="createThree" value="Создать таблицу застрахованные">
    <input type="submit" name="createFour" value="Создать таблицу договоры">
   </div>
  </div>
 </body>
</html>
>
