<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calender</title>
    
    <!-- stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">    
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">My Calender</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="search.php" class="nav-link"><i class="fa fa-serch"></i>検索</a>
                    </li>
                    <li class="nav-item">
                        <a href="add.php" class="nav-link"><i class="fa fa-plus"></i>追加</a>
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

<!-- script -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/ja.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
</body>
</html>