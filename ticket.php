<?php
session_start();
include 'include\db_config.php';
if(isset($_SESSION['login'])){
    $sql=pg_query();
}else{
    header("location: index.php");
}


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
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>

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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <h1>Обращение № <?php echo $_GET['id']; ?> Адрес: <?php ?></h1>
                    <div id="map" style="width:1080px; height:300px"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class = "row" style = "margin-top: 15px;">
                        <div class = "col-lg-3 col-md-4 col-xs-12"><b>Дата обращения:</b></div>
                        <div class = "col-lg-3 col-md-4 col-xs-12"></div>
                    </div>
                    <div class = "row" style = "margin-top: 15px;">
                        <div class = "col-lg-3 col-md-4 col-xs-12"><b>ФИО отправителя:</b></div>
                        <div class = "col-lg-3 col-md-4 col-xs-12"></div>
                    </div>
                    <div class = "row" style = "margin-top: 15px;">
                        <div class = "col-lg-3 col-md-4 col-xs-12"><b>Телефон:</b></div>
                        <div class = "col-lg-3 col-md-4 col-xs-12"></div>
                    </div>
                    <div class = "row" style = "margin-top: 15px;">
                        <div class = "col-lg-3 col-md-4 col-xs-12"><b>Обратный звонок:</b></div>
                        <div class = "col-lg-3 col-md-4 col-xs-12"></div>
                    </div>
                    <div class = "row" style = "margin-top: 15px;">
                        <div class = "col-lg-3 col-md-4 col-xs-12"><b>Тип поврежедения:</b></div>
                        <div class = "col-lg-3 col-md-4 col-xs-12"></div>
                    </div>
                    <div class = "row" style = "margin-top: 15px;">
                        <div class = "col-lg-3 col-md-4 col-xs-12"><b>Место повреждения:</b></div>
                        <div class = "col-lg-3 col-md-4 col-xs-12"></div>
                    </div>
                    <div class = "row" style = "margin-top: 15px;">
                        <div class = "col-lg-3 col-md-4 col-xs-12"><b>Управлябщая компания:</b></div>
                        <div class = "col-lg-3 col-md-4 col-xs-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">

    $(document).ready(function () {
        var map;

        DG.then(function () {
            map = DG.map('map', {
                center: [55.163868, 61.421986],
                zoom: 13
            });
        });
    });


</script>
</html>