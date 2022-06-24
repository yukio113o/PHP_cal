<?php
require_once 'libs/config.php';
require_once 'libs/functions.php';
$title = '予定の追加 | ' . APP_NAME;

$err = [];
$start_datetime = '';
$end_datetime = '';
$task = '';
$color = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $start_datetime = $_POST['start_datetime'];
    $end_datetime = $_POST['end_datetime'];
    $task = $_POST['task'];
    $color = $_POST['color'];

    if ($start_datetime == '') {
        $err['start_datetime'] = '開始日時を入力してください。';
    }

    if ($end_datetime == '') {
        $err['end_datetime'] = '終了日時を入力してください。';
    }

    if ($task == '') {
        $err['task'] = '予定を入力してください。';
    } else if (mb_strlen($task, 'UTF-8') > 128) {
        $err['task'] = '128文字以内で入力してください。';
    }

    if ($color == '') {
        $err['color'] = '色を選択してください';
    }

    if (empty($err)) {

        $conn = connDB();
        $sql = 'INSERT INTO schedules(start_datetime, end_datetime, task, color, created_at, modified_at)
            VALUES(:start_datetime, :end_datetime, :task, :color, now(), now())';

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':start_datetime', $start_datetime, PDO::PARAM_STR);
        $stmt->bindValue(':end_datetime', $end_datetime, PDO::PARAM_STR);
        $stmt->bindValue(':task', $task, PDO::PARAM_STR);
        $stmt->bindValue(':color', $color, PDO::PARAM_STR);

        $stmt->execute();
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
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h4 class="text-center">予定の追加</h4>

                    <form method="post">
                        <div class="mb-4 dp-parent">
                            <label for="inputStartDateTime" class="form-label">開始日時</label>
                            <input type="text" name="start_datetime" id="inputStartDateTime" class="form-control task-datetime <?php if (!empty($err['start_datetime'])) echo 'is-invalid'; ?>" placeholder="開始日時を選択してください" value="<?= $start_datetime; ?>">
                            <div id="inputStartDateTimeFeedback" class="invalid-feedback">
                                * 開始日時を選択してください
                            </div>

                            <?php if (!empty($err['start_datetime'])) : ?>
                                <div id="inputStartDatetime" class="invalid-feedback">
                                    * <?= $err['srart_datetime']; ?>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-4 dp-parent">
                            <label for="inputEndDateTime" class="form-label">終了日時</label>
                            <input type="text" name="end_datetime" id="inputEndDateTime" class="form-control task-datetime <?php if (!empty($err['start_datetime'])) echo 'is-invalid'; ?>" placeholder="終了日時を入力してください" value="<?= $end_datetime; ?>">
                            
                            <?php if (!empty($err['end_datetime'])) : ?>
                                <div id="inputStartDatetime" class="invalid-feedback">
                                    * <?= $err['end_datetime']; ?>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-4">
                            <label for="inputTask" class="form-label">予定</label>
                            <input type="text" name="task" id="inputTask" class="form-control <?php if (!empty($err['start_datetime'])) echo 'is-invalid'; ?>" placeholder="予定を入力してください" value="<?= $task; ?>">

                            <?php if (!empty($err['task'])) : ?>
                                <div id="inputStartDatetime" class="invalid-feedback">
                                    * <?= $err['task']; ?>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-5">
                            <label for="selectColor" class="form-label">色</label>
                            <select name="color" id="selectColor" class="form-select bg-light <?php if (!empty($err['start_datetime'])) echo 'is-invalid'; ?>">
                                <?php foreach(COLOR_LIST as $key => $val): ?>
                                    <option value="<?= $key; ?>" <?php if($color == $key) echo 'selected'; ?>><?= $val; ?></option>
                                <?php endforeach; ?>
                            </select>

                            <?php if (!empty($err['color'])) : ?>
                                <div id="inputStartDatetime" class="invalid-feedback">
                                    * <?= $err['color']; ?>
                                </div>
                            <?php endif; ?>

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