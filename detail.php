<!DOCTYPE html>
<html lang="ja" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Calendar</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex flex-column h-100">
<header>
    <nav class="navbar navbar-expand- navbar-dark bg-dark fixed-top">
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
$(function () {
    $('#ymPicker').datetimepicker({
        format: 'YYYY-MM',
        locale: 'ja'
    });
    
    $('.task-datetime').datetimepicker({
        dayViewHeaderFormat: 'YYYY年 MMMM',
        format: 'YYYY/MM/DD HH:mm',
        locale: 'ja',
    });

    $('#selectColor').bind('change', function(){
        $(this).removeClass();
        $(this).addClass('form-select').addClass($(this).val());
    });
});
    
</script>
</body>
</html>