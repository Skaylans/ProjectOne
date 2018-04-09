<?php
ini_set('short_open_tag', 'On');
header('Refresh: 6; URL=basis-policy.php');
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Проверка документов</title>
        <link rel="stylesheet" href="/css/master.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 style="text-align: center; ">Ваши документы приняты</h1>
                    <h2 class="text-center">Сейчас Вы передете к оформлению договора</h2>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            setTimeout('location.replace("/basis-policy.php")', 6000);
            миллисекунд)
        </script>
    </body>
    </html>
