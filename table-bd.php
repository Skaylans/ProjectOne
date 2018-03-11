<?php require_once('db.php'); ?>
<?php $users = R::find('users'); ?>


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
        <?php echo "<td style='text-align: center;'>".$user->id."</td>"; ?>
        <?php echo "<td>".$user->login."</td>"; ?>
        <?php echo "<td>".$user->email."</td>"; ?>
        <?php echo "<td>".$user->password."</td></tr>"; ?>
      <?php endforeach; ?>
     </thead>
    </table>
   </div>
  </div>
 </body>
</html>
