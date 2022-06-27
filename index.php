<?php 
    require_once 'libs/config.php';
    require_once 'libs/functions.php';

    $title = 'HOME | ' . APP_NAME; 

    if(isset($_GET['ym'])) {
        $ym = $_GET['ym'];
    } else {
        $ym = date('Y-m');
    }

    $time_stamp = strtotime($ym, '-01');
    if($time_stamp === false) {
        $ym = date('Y-m');
        $time_stamp = strtotime($ym, '-01');
    }

    $day_count = date('t', $time_stamp);
    $seven_days = date('N', $time_stamp);
    $cal_title = date('Y年n月', $time_stamp);
    $prev = date('Y-m', strtotime('-1 month', $time_stamp));
    $next = date('Y-m', strtotime('+1 month', $time_stamp));
    $today = date('Y-m-d');
    $weeks = [];
    $week = '';
    $week .= str_repeat('<td></td>', $seven_days - 1);

    $conn = connDB();

    for($day = 1; $day <= $day_count; $day++, $seven_days++) {

        $date = $ym . '-' . sprintf('%02d', $day);

        $rows = getSchedules($conn, $date);

        if($date == $today) {
            $week .= '<td class="today>';
        } else {
            $week .= '<td>';
        }

        $week .= '<a href="detail.php?ymd=' . $date . '">' . $day;

        if(!empty($rows)) {
            $week .= '<div class="badges">';
                foreach($rows as $row) {
                    $task = date('H:i', strtotime($row['start_datetime'])) . ' ' . $row['task'];
                    $week .= '<span class="badges text-wrap ' . $row['color'] . '">' . $task . '</span>';
                }
            $week .= '</div>';
        }

        $week .= '</a></td>';

        if($seven_days % 7 == 0 || $day == $day_count) {

            if($day == $day_count && $seven_days % 7 != 0) {
                $week .= str_repeat('<td></td>', 7 - $seven_days % 7);
            }

            $weeks[] = '<tr>' . $week . '</tr>';
            $week = '';
        }
    }
?>

<!DOCTYPE html>
<html lang="ja" class="h-100">

<head>
    <?php
        require_once 'partials/head.php';
    ?>
</head>

<body class="d-flex flex-column h-100">
    
    <?php require_once 'partials/navbar.php'; ?>

    <main>
        <div class="container">
            <table class="table table-bordered calendar">
                <thead>
                    <tr class="head-cal fs-4">
                        <th colspan="1" class="text-start"><a href="index.php?ym=<?= $prev; ?>">&lt;</a></th>
                        <th colspan="5"><?= $cal_title; ?></th>
                        <th colspan="1" class="text-end"><a href="index.php?ym=<?= $next; ?>">&gt;</a></th>
                    </tr>
                    <tr class="head-week">
                        <th>月</th>
                        <th>火</th>
                        <th>水</th>
                        <th>木</th>
                        <th>金</th>
                        <th>土</th>
                        <th>日</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($weeks as $week) { echo $week; } ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php require_once 'partials/footer.php'; ?>

</body>

</html>