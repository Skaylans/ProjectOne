<?

$dsn = "sqlsrv:server = tcp:safelife.database.windows.net,1433; Database = Insurance";
$login = "Romanow";
$pass = "Qwerty123456";


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
}

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
    $sql = "CREATE TABLE insurant(
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
          dateIssue VARCHAR(10))";
          $conn->query($sql);
          echo "<h3>Таблица Страхователя создана.</h3>";
}
catch (PDOException $e) {
    print("Ошибка подключения к SQL Server.");
    die(print_r($e));
}

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

/*

try {
    $conn = new PDO($dsn, $login, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE insurers(
        insurer_id INT NOT NULL IDENTITY(1,1),
        PRIMARY KEY(insurer_id),
        appellation VARCHAR(50),
        TIN VARCHAR(50),
        checkAccount VARCHAR(50),
        BIC VARCHAR(50),
        corAccount VARCHAR(50),
        postcode VARCHAR(10),
        insurer_city VARCHAR(50),
        insurer_street VARCHAR(30),
        insurer_house VARCHAR(5),
        sumIns DECIMAL(15,2))";
        $conn->query($sql);

        echo "<h3>Таблица Страховщики создана.</h3>";
    }
catch (PDOException $e) {
    print("Ошибка подключения к SQL Server.");
    die(print_r($e));
} */

?>
