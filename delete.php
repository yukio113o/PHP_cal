<?php 
    require_once 'libs/config.php';
    require_once 'libs/functions.php';

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('Location:index.php');
        exit();
    }

    $conn = connDB();
    $sql = 'DELETE FROM schedules WHERE schedule_id = :schedule_id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':schedule_id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();

    header('Location:' . $_SERVER['HTTP_REFERER']);
    exit();
?>