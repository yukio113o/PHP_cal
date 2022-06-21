<!DOCTYPE html>
<html lang="ja" class="h-100">

<head>
    <?php
        $title = 'HOME | My Calendar';
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
            <table class="table table-bordered calendar">
                <thead>
                    <tr class="head-cal fs-4">
                        <th colspan="1" class="text-start"><a href="#">&lt;</a></th>
                        <th colspan="5">2021年3月</th>
                        <th colspan="1" class="text-end"><a href="#">&gt;</a></th>
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
                    <tr>
                        <td><a href="detail.php">1</a></td>
                        <td>2</td>
                        <td class="today">3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>
                            <a href="detail.php">7
                                <div class="badges">
                                    <span class="badge text-wrap bg-warning">10:30 予定</span>
                                </div>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="detail.php">8
                                <div class="badges">
                                    <span class="badge text-wrap bg-primary">09:00 ここに予定を表示します</span>
                                    <span class="badge text-wrap bg-danger">14:00 予定２</span>
                                    <span class="badge text-wrap bg-primary">14:20 予定３</span>
                                    <span class="badge text-wrap bg-primary">20:15 予定４</span>
                                </div>
                            </a>
                        </td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>
                            <a href="detail.php">19
                                <div class="badges">
                                    <span class="badge text-wrap bg-success">10:00 予定１</span>
                                    <span class="badge text-wrap bg-info">12:00 予定２</span>
                                    <span class="badge text-wrap bg-secondary">15:00 予定３</span>
                                </div>
                            </a>
                        </td>
                        <td>20</td>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                    </tr>
                    <tr>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
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
        });
    </script>
</body>

</html>