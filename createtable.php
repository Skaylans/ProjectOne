<?

$dsn = "sqlsrv:server = tcp:safelife.database.windows.net,1433; Database = Insurance";
$login = "Romanow";
$pass = "Qwerty123456";

/*
try {
    $conn = new PDO($dsn, $login, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE TABLE contract(
          contract_id INT NOT NULL IDENTITY(1,1),
          PRIMARY KEY(contract_id),
          insurant_id INT,
          insurer_id INT,
          insured_id INT,
          start_date VARCHAR(10),
          end_date VARCHAR(10),
          insuranceEvent VARCHAR(50),
          insurancePeriod VARCHAR(10),
          insuranceAmount DECIMAL(15,2))";
          $conn->query($sql);
          echo "<h3>Таблица Страхователя создана.</h3>";
}
    catch (PDOException $e) {
    print("Ошибка подключения к SQL Server.");
    die(print_r($e));
} */

/*try {
    $conn = new PDO($dsn, $login, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE users(
        id INT NOT NULL IDENTITY(1,1), 
        PRIMARY KEY(id),
        login VARCHAR(50),
        password VARCHAR(50),
        email VARCHAR(50))";
        
        $conn->query($sql);
        
        echo "<h3>Таблица создана.</h3>";
    }
catch (PDOException $e) {
    print("Ошибка подключения к SQL Server.");
    die(print_r($e));
}*/


/*
try {
    $conn = new PDO($dsn, $login, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE insurants(
          insurant_id INT NOT NULL IDENTITY(1,1),
          PRIMARY KEY(insurant_id),
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
          id INT)";
          $conn->query($sql);
          echo "<h3>Таблица Страхователя создана.</h3>";
}
catch (PDOException $e) {
    print("Ошибка подключения к SQL Server.");
    die(print_r($e));
}
/*
try {
    $conn = new PDO($dsn, $login, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE insured(
          insured_id INT NOT NULL IDENTITY(1,1),
          PRIMARY KEY(insured_id),
          insured_first_name VARCHAR(50),
          insured_last_name VARCHAR(50),
          insured_middle_name VARCHAR(50),
          insured_birthdate VARCHAR(10))";
          $conn->query($sql);
          echo "<h3>Таблица Страхователя создана.</h3>";
}
catch (PDOException $e) {
    print("Ошибка подключения к SQL Server.");
    die(print_r($e));
}

INSERT INTO `insurers` (`insurer_id`, `appellation`, `TIN`, `checkAccount`, `BIC`, `corAccount`, `postcode`, `insurer_city`, `insurer_street`, `insurer_house`, `sumIns`) VALUES (
'1', 'Тинькофф Страхование', '5117059685', '40072758430020034122453', '044327295', '301419569000000006573', '140400', 'РФ, Саратовская область, г. Саратов', 'Московская 18', '3', '500000.00'), 
('2', 'БИНБАНК', '5037455674', '40072758430043603412347', '044327367', '301419569000000007313', '144404', 'РФ, Саратовская область, г. Саратов', 'Советская 22', '5', '300000.00'), 
('3', 'Росгосстрах', '5063755980', '40072758450060341367300', '101631367', '11079569330000006780', '410313', 'РФ, Саратовская область, г. Саратов', 'Гагарина 10', '16', '400000.00'), 
('4', 'РЕСО-Гарантия', '2113354980', '4007275845006034142456', '101631367', '8091119330000003459', '413100', 'РФ, Саратовская область, г. Саратов', 'Тельмана 190', '46', '500000.00'), 
('5', 'МетЛайф', '4510354912', '4021275845000004142246', '100451367', '1110459330000003001', '401140', 'РФ, Саратовская область, г. Саратов', 'Астраханская 66', '13', '250000.00')

/**/

try {
    $conn = new PDO($dsn, $login, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql_select = "SELECT * FROM insurers";
    $stmt = $conn->query($sql_select);
    $stmt->execute();
    $date = $stmt->fetchAll();
    if(count($date) == 0) {
        $insert = "INSERT INTO insurers (`insurer_id`, `appellation`, `TIN`, `checkAccount`, `BIC`, `corAccount`, `postcode`, `insurer_city`, `insurer_street`, `insurer_house`, `sumIns`) VALUES 
        ('1', 'Тинькофф Страхование', '5117059685', '40072758430020034122453', '044327295', '301419569000000006573', '140400', 'РФ, Саратовская область, г. Саратов', 'Московская 18', '3', '500000.00'), 
        ('2', 'БИНБАНК', '5037455674', '40072758430043603412347', '044327367', '301419569000000007313', '144404', 'РФ, Саратовская область, г. Саратов', 'Советская 22', '5', '300000.00'), 
        ('3', 'Росгосстрах', '5063755980', '40072758450060341367300', '101631367', '11079569330000006780', '410313', 'РФ, Саратовская область, г. Саратов', 'Гагарина 10', '16', '400000.00'), 
        ('4', 'РЕСО-Гарантия', '2113354980', '4007275845006034142456', '101631367', '8091119330000003459', '413100', 'РФ, Саратовская область, г. Саратов', 'Тельмана 190', '46', '500000.00'), 
        ('5', 'МетЛайф', '4510354912', '4021275845000004142246', '100451367', '1110459330000003001', '401140', 'РФ, Саратовская область, г. Саратов', 'Астраханская 66', '13', '250000.00')";
        $stmt = $conn->query($insert);
        $stmt->execute();

  echo "Данные занесены!"; 
}  
    }
catch (PDOException $e) {
    print("Ошибка подключения к SQL Server.");
    die(print_r($e));
} 

?>
