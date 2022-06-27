<?php 
//DB
function connDB() {

    $host = 'localhost';
    $port = '8889';
    $dbName = 'my_calendar';
    $username = 'root';
    $password = 'root';
    $dsn = "mysql:host={$host};port={$port};dbname={$dbName};";

    try {

        $conn = new PDO($dsn, $username, $password);
        return $conn;

    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

function getSchedules($conn, $date) {

    $sql = 'SELECT * FROM schedules WHERE CAST(start_datetime AS DATE) = :start_datetime ORDER BY start_datetime ASC';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':start_datetime', $date, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();

}

?>