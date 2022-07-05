<?php 
    require_once 'config.php';
    require_once 'functions.php';

    $csv = file_get_contents('https://www8.cao.go.jp/chosei/shukujitsu/syukujitsu.csv');
    $csv = mb_convert_encoding($csv, 'utf-8', 'sjis-win');

    $tmp = tmpfile();
    fwrite($tmp, $csv);
    rewind($tmp);

    $rows = [];
    while(($data = fgetcsv($tmp)) !== false) {
        $rows[] = $data;
    }
    
    array_shift($rows);
    fclose($tmp);

    $conn = connDB();

    foreach($rows as $row) {

        if(empty($row[0]) || empty($row[1])) {
            continue;
        }

        $sql = 'INSERT INTO holidays(holiday_date, holiday_name, created_at, modified_at)
                VALUES(:holiday_date, :holiday_name, now(), now())';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':holiday_date', $row[0], PDO::PARAM_STR);
        $stmt->bindValue(':holiday_name', $row[1], PDO::PARAM_STR);
        $stmt->execute();
    }

    echo $csv;
?>