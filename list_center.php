<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ситуационный центр </br> "МУП ПОВВ"</title>
    <!-- Bootstrap -->
    <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="modules/css/style.css" rel="stylesheet" type="text/css"/>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.js" type="text/javascript"></script>
    <script src="vendor/datatables/datatables/media/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="vendor/datatables/datatables/media/js/dataTables.bootstrap4.js" type="text/javascript"></script>
    <link href="vendor/datatables/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css"/>
    <link href="vendor/components/font-awesome/css/fontawesome-all.css" rel="stylesheet" type="text/css"/>


</head>
<body style="font-family: 'Exo 2', sans-serif;">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Ситуационный центр МУП ПОВВ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="user_setting.php">Пользователь: <?php echo $_SESSION['login'][0]['name']; ?>
                    <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Выход</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">

            <div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Обращения: Таблица</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Обращения: Карта</a>
                    </li>

                </ul>


                <div style="margin-top: 20px">
                    <table class="table table-bordered table-responsive" id="view">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Дата/Время</th>
                            <th>Данные отправителя</th>
                            <th>Телефон</th>
                            <th>Тип повреждения</th>
                            <th>Место повреждения</th>
                            <th>УК</th>
                            <th>Адрес</th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">

    $(document).ready(function () {
        var table = $('#view').DataTable({
            paging: false,
            oLanguage: {
                "sLengthMenu": "Отображено _MENU_ записей на страницу",
                "sSearch": "Поиск:",
                "sZeroRecords": "Ничего не найдено - извините",
                "sInfo": "Показано с _START_ по _END_ из _TOTAL_ записей",
                "sInfoEmpty": "Показано с 0 по 0 из 0 записей",
                "sInfoFiltered": "(filtered from _MAX_ total records)",
                "oPaginate": {
                    "sFirst": "Первая",
                    "sLast": "Посл.",
                    "sNext": "След.",
                    "sPrevious": "Пред.",
                }
            },
            "ajax": {
                type: "POST",
                url: "ajax/view_table.php",
            },
            columns: [
                {data: "id", searchable: false},
                {data: "aDate"},
                {data: "aName"},
                {data: "aPhone", searchable: false},
                {data: "problem"},
                {data: "location"},
                {data: "aService"},
                {data: "aAdderss"},
                {
                    data: null,
                    fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<button id='" + oData.id + "' class='btn btn-primary btn view_ticket'><i class=\"fas fa-edit\"></i>...</button>");
                    }
                }
            ]
        });

        $('#view').on('click', '.view_ticket', function (e) {
             window.open('ticket.php?id=' + this.id + '');
        });

        $('#view')
            .removeClass('display')
            .addClass('table table-striped table-bordered');
    });


</script>
</html>