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
?>