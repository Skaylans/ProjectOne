


<?php

$dsn = "sqlsrv:server = tcp:safelife.database.windows.net,1433; Database = Insurance";
$login = "Romanow";
$pass = "Qwerty123456";


try {
    $conn = new PDO($dsn, $login, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")) or die ( 'error' );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql_select = "SELECT * FROM insureres";
    $stmt = $conn->query($sql_select);
    $stmt->execute();
    $date = $stmt->fetchAll();
    if(count($date) == 0) {
        $insert = "INSERT INTO insureres (appellation, TIN, checkAccount, BIC, corAccount, postcode, insurer_city, insurer_street, insurer_house, sumIns) VALUES
        ('Тинькофф Страхование', '5117059685', '40072758430020034122453', '044327295', '301419569000000006573', '140400', 'РФ, Саратовская область, г. Саратов', 'Московская 18', '3', '500000.00'),
        ('БИНБАНК', '5037455674', '40072758430043603412347', '044327367', '301419569000000007313', '144404', 'РФ, Саратовская область, г. Саратов', 'Советская 22', '5', '300000.00'),
        ('Росгосстрах', '5063755980', '40072758450060341367300', '101631367', '11079569330000006780', '410313', 'РФ, Саратовская область, г. Саратов', 'Гагарина 10', '16', '400000.00'),
        ('РЕСО-Гарантия', '2113354980', '4007275845006034142456', '101631367', '8091119330000003459', '413100', 'РФ, Саратовская область, г. Саратов', 'Тельмана 190', '46', '500000.00'),
        ('МетЛайф', '4510354912', '4021275845000004142246', '100451367', '1110459330000003001', '401140', 'РФ, Саратовская область, г. Саратов', 'Астраханская 66', '13', '250000.00')";
        $stmt = $conn->query($insert);
        $stmt->execute();
        echo '<div style = "color: red; text-align: center;">Данные записаны!</div><hr>';
    }
}
catch (PDOException $e) {
    print("Ошибка подключения к SQL Server.");
    die(print_r($e));
}

?> 


