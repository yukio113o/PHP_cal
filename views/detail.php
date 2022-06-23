<?php 
    require_once 'libs/config.php';
    $title = '予定の詳細 | ' . APP_NAME;
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
                <div class="col-lg-6 offset-lg-3">
                    <h4 class="text-center">2021/3/31</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 3%;"></th>
                                <th style="width: 25%;"><i class="far fa-clock"></i></th>
                                <th style="width: 50%;"><i class="fas fa-list">></i></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="fas fa-square text-primary"></i></td>
                                <td>10:00 ~ 11:25</td>
                                <td>予定を表示</td>
                                <td>
                                    <a href="edit.php" class="btn btn-sm btn-link">編集</a>
                                    <a href="#" class="btn btn-sm btn-link">削除</a>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-square text-primary"></i></td>
                                <td>10:00 ~ 11:25</td>
                                <td>予定を表示</td>
                                <td>
                                    <a href="edit.php" class="btn btn-sm btn-link">編集</a>
                                    <a href="#" class="btn btn-sm btn-link">削除</a>
                                </td>
                            </tr>
                            <td><i class="fas fa-square text-primary"></i></td>
                            <td>10:00 ~ 11:25</td>
                            <td>予定を表示</td>
                            <td>
                                <a href="edit.php" class="btn btn-sm btn-link">編集</a>
                                <a href="#" class="btn btn-sm btn-link">削除</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'partials/footer.php'; ?>
    
</body>

</html>