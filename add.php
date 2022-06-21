<!DOCTYPE html>
<html lang="ja" class="h-100">

<head>
    <?php
        $title = '予定の追加 | My Calendar';
        require_once 'partials/head.php';
    ?>
</head>

<body class="d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">My Calendar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="add.php"><i class="fa fa-plus"></i> 追加</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="search.php"><i class="fa fa-search"></i> 検索</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input type="text" name="ym" class="form-control me-2" placeholder="年月を選択" id="ymPicker">
                        <button class="btn btn-outline-light text-nowrap" type="submit">表示</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

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

    <footer class="footer py-3 mt-auto bg-light">
        <div class="container text-center">
            <span class="text-muted">&copy; My Calendar</span>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/ja.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>

    <script>
        $(function() {
            $('#ymPicker').datetimepicker({
                format: 'YYYY-MM',
                locale: 'ja'
            });

            $('.task-datetime').datetimepicker({
                dayViewHeaderFormat: 'YYYY年 MMMM',
                format: 'YYYY/MM/DD HH:mm',
                locale: 'ja',
            });

            $('#selectColor').bind('change', function() {
                $(this).removeClass();
                $(this).addClass('form-select').addClass($(this).val());
            });
        });
    </script>
</body>

</html>