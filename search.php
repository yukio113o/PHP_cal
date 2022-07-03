<?php

    require_once 'libs/config.php';
    require_once 'libs/functions.php';
    
    $title = '予定を検索 | ' . APP_NAME;
    
    $where= [];
    $params = [];
    $start_date = '';
    $end_date = '';
    $keyword = '';
    
    if (!empty($_GET['start_date'])) {
        $start_date = $_GET['start_date'];
        $where[] = 'CAST(start_datetime AS DATE) >= :start_date';
        $params[':start_date'] = $start_date;
    }
    if (!empty($_GET['end_date'])) {
        $end_date = $_GET['end_date'];
        $where[] = 'CAST(start_datetime AS DATE) <= :end_date';
        $params[':end_date'] = $end_date;
    }
    if (!empty($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $where[] = 'task LIKE :task';
        $params[':task'] = '%' . $keyword . '%';
    }
    
    if (!empty($where)) {
        $where = implode(' AND ', $where);
    
        $conn = connDB();
        $sql = 'SELECT * FROM schedules WHERE ' . $where . ' ORDER BY start_datetime ASC'; 
        $stmt = $conn->prepare($sql);
    
        foreach ($params as $key => $val) {
            $stmt->bindValue($key, $val, PDO::PARAM_STR);
        }
    
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="text-center">予定を検索</h4>

                    <form class="row row-cols-lg-auto g-2 align-items-center">
                        <div class="col-12 dp-parent">
                            <label for="inputStartDate" class="visually-hidden">開始日時</label>
                            <input type="text" name="start_date" class="form-control search-date" id="inputStartDateTime" placeholder="開始日時" value="<?= xss($start_date); ?>">
                        </div>

                        <div class="col-12 dp-parent">
                            <label for="inputEndDate" class="visually-hidden">終了日時</label>
                            <input type="text" name="end_date" class="form-control search-date" id="inlineFormInputGroupUsername" placeholder="終了日時" value="<?= xss($end_date); ?>">
                        </div>

                        <div class="col-12">
                            <label for="inputTask" class="visually-hidden">キーワード</label>
                            <input type="text" name="keyword" class="form-control" id="inputTask" placeholder="キーワード" value="<?= xss($keyword); ?>">
                        </div>

                        <div class="col-12 d-grid">
                            <button type="submit" class="btn btn-success">検索</button>
                        </div>
                    </form>

                    <?php if(!empty($where)) : ?>
                        <h6 class="mt-5">検索結果:<?= count($rows); ?>件</h6>
                            <?php if(count($rows) > 0) : ?>
                                <table class="table mt-4">
                                    <thead>
                                        <tr>
                                            <th style="width: 20;">開始日時</th>
                                            <th style="width: 20;">終了日時</th>
                                            <th>予定</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($rows as $row) : ?>
                                        <tr>
                                            <td><?= date('Y/n/j H:i', strtotime($row['start_datetime']));?></td>
                                            <td><?= date('Y/n/j H:i', strtotime($row['end_datetime']));?></td>
                                            <td><a href="detail.php?ymd=<?= date('Y-m-d', strtotime($row['start_datetime'])); ?>"><?= xss($row['task']); ?></a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>        
                            <?php else: ?>
                                <div class="alert alert-danger mt-4">
                                    予定が見つかりませんでした。
                                </div>
                            <?php endif; ?>

                        <div class="mt-4"><a href="search.php" class="btn btn-sm btn-link" role="button">検索条件をクリア</a></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'partials/footer.php'; ?>
    
</body>

</html>