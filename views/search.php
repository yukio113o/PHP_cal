<?php 
    require_once 'libs/config.php';
    $title = '予定を検索 | ' . APP_NAME;
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

                    <from class="row row-cols-lg-auto g-2 align-items-center">
                        <div class="col-12 dp-parent">
                            <label for="inputStartDate" class="visually-hidden">開始日時</label>
                            <input type="text" name="start_date" class="form-control" id="inputStartDateTime" placeholder="開始日時">
                        </div>

                        <div class="col-12 dp-parent">
                            <label for="inputEndDate" class="visually-hidden">終了日時</label>
                            <input type="text" class="form-control search-date" id="inlineFormInputGroupUsername">
                        </div>

                        <div class="col-12">
                            <label for="inputTask" class="visually-hidden">キーワード</label>
                            <input type="text" name="keyword" class="form-control" id="inputTask" placeholder="キーワード">
                        </div>

                        <div class="col-12 d-grid">
                            <button type="submit" class="btn btn-success">検索</button>
                        </div>
                    </from>

                    <h6 class="mt-5">検索結果</h6>
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th style="width: 20;">開始日時</th>
                                <th style="width: 20;">終了日時</th>
                                <th>予定</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2021/3/15</td>
                                <td>2021/3/20</td>
                                <td><a href="detail.php">予定1</a></td>
                            </tr>
                            <tr>
                                <td>2021/3/15</td>
                                <td>2021/3/20</td>
                                <td><a href="detail.php">予定2</a></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-4"><a href="search.php" class="btn btn-sm btn-link" role="button">検索条件をクリア</a></div>

                </div>
            </div>
        </div>
    </main>

    <?php require_once 'partials/footer.php'; ?>
    
</body>

</html>