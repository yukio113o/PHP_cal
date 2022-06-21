<!DOCTYPE html>
<html lang="ja" class="h-100">

<head>
    <?php
        $title = '予定を検索 | My Calendar';
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

            $('.search-date').datetimepicker({
                format: 'YYYY/MM/DD',
                locale: 'ja'
            });
        });
    </script>
</body>

</html>