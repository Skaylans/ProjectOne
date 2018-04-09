<?php require_once('db.php'); ?>
<?php if (!empty($_SESSION)) : ?>
<div style="color: #000000;write;font-size: 1.6em;">
  <p style="text-align: center;">
    Сейчас авторизован пользователь:
    <span style="color: #eec30a;">
      <?php echo $_SESSION['logged_user']; ?>
    </span>
  </p>
</div>
<style media="screen">
@import URL('https://fonts.googleapis.com/css?family=Roboto+Slab|Suez+One');
  .btnOne {
    width: 300px;
    height: 45px;
    text-align: center;
    float: left;
    padding: 5px 9px;
    border-radius: 0 0 70px 0;
    margin-top: -35px;
    font-size: 1.2em;
    background-color: rgba(178, 213, 221, 0.89);
    border-bottom: 4px solid rgba(17, 19, 17, 0.96);
    color: black;
    font-family: 'Roboto Slab', serif;
  }
</style>
<a href="\personal.php" title="Личный кабинет"><div class="btnOne">Личный кабинет</div></a>
<?php endif; ?>

<?php

$user_name = $_SESSION['logged_user'];

$sql_select_usersID = "SELECT id FROM users WHERE login = '$user_name'";
$stmt = $conn->query($sql_select_usersID);
$stmt->execute();
$users = $stmt->fetchAll();
foreach ($users as $user) {
  $userID .= $user['id'];
}

$sql_select_insurantID = "SELECT insurant_id, insurant_email FROM insurants WHERE user_id = '$userID'";
$stmt = $conn->query($sql_select_insurantID);
$stmt->execute();
$insurants = $stmt->fetchAll();
foreach ($insurants as $insurant) {
  $insurantID .= $insurant['insurant_id'];
}

$sql_select_dogovor = "SELECT * FROM contract WHERE insurant_id = '$insurantID'";
$stmt = $conn->query($sql_select_dogovor);
$stmt->execute();
$dogovors = $stmt->fetchAll();


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Мои договоры</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <?php if (!empty($dogovors)) : ?>
     <h1 align="center">Мои договры</h1>
     <br>
     <div class="table-responsive">
      <table id="" class="table table-bordered table-striped" style="width: 1500px;">
       <thead>
        <tr>
         <th style='text-align: center;'>ID</th>
         <th>ID Страховщика</th>
         <th>ID Страхователя</th>
         <th>ID Застрахованного</th>
         <th>Дата начало</th>
         <th>Дата окончания</th>
         <th>Страховой случай</th>
         <th>Страховая сумма</th>
         <th>Дата заключения</th>
        </tr>
        <?php foreach ($dogovors as $dogovor): ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['contract_id']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['insurer_id']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['insurant_id']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['insured_id']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['start_date']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['end_date']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['insuranceEvent']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['insuranceAmount']."</td>"; ?>
          <?php echo "<td style='text-align: center; padding: 15px 5px'>".$dogovor['insurancePeriod']."</td></tr>"; ?>
        <?php endforeach; ?>
       </thead>
      </table>
    </div>
    <?php else : ?>
      <?php echo '<h1 style="padding-left: 400px;">У вас нет договоров!</h1>' ?>
      <?php endif; ?>
   </div>
  </body>
</html>
