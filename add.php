<?php
    require_once 'libs/config.php';
    require_once 'libs/functions.php';
    $title = '予定の追加 | ' . APP_NAME;

    $conn = connDB();

    $sql = 'INSERT INTO schedules(start_datetime, end_datetime, task, color, created_at, modified_at)
    VALUES("2021-3-15 10:00", "2021-3-15 11:15", "test", "bg-info", now(), now())';

    $conn->exec($sql);
    exit('保存しました');

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
                    <h4 class="text-center">予定の追加</h4>

                    <form method="post">
                        <div class="mb-4 dp-parent">
                            <label for="inputStartDateTime" class="form-label">開始日時</label>
                            <input type="text" name="start_datetime" id="inputStartDateTime" class="form-control task-datetime is-invalid" placeholder="開始日時を選択してください">
                            <div id="inputStartDateTimeFeedback" class="invalid-feedback">
                                * 開始日時を選択してください
                            </div>
                        </div>

                        <div class="mb-4 dp-parent">
                            <label for="inputEndDateTime" class="form-label">終了日時</label>
                            <input type="text" name="end_datetime" id="inputEndDateTime" class="form-control task-datetime" placeholder="終了日時を入力してください">
                        </div>

                        <div class="mb-4">
                            <label for="inputTask" class="form-label">予定</label>
                            <input type="text" id="inputTask" class="form-control" placeholder="予定を入力してください">
                        </div>

                        <div class="mb-5">
                            <label for="selectColor" class="form-label">色</label>
                            <select name="color" id="selectColor" class="form-select bg-light">
                                <option value="bg-light" selected>デフォルト</option>
                                <option value="bg-danger">赤</option>
                                <option value="bg-warning">オレンジ</option>
                                <option value="bg-primary">青</option>
                                <option value="bg-info">水色</option>
                                <option value="bg-success">緑</option>
                                <option value="bg-dark">黒</option>
                                <option value="bg-secondary">グレー</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">登録</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <?php require_once 'partials/footer.php'; ?>
    
</body>

</html>