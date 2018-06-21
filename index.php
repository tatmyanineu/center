<?php
session_destroy();
session_start();
include 'include/db_config.php';

if (isset($_POST['submit'])) {
    if (isset($_POST['login']) and isset($_POST['password'])) {
        $sql= pg_query('SELECT id, login_cnt, password_cnt, name, priv
                                  FROM user_cnt
                                  WHERE login_cnt = \'' . $_POST['login'] . '\'  AND
                                        password_cnt= \'' . $_POST['password'] . '\' 
                                ');
        $login = pg_fetch_all($sql);
        if(count($login)!=0){
            $_SESSION['login'] = $login;
            unset($login);
             header("Location: list_center.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>МУП ПОВВ</title>
        <!-- Bootstrap -->
        <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>

    </head>
    <body style="font-family: 'Exo 2', sans-serif;">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="row">
                        <div class= "col-lg-10 col-md-10 col-xs-10">
                            <h1 class="text-center">Ситуационный центр </br> "МУП ПОВВ"</h1>
                            <label class="checkbox">
                            </label>
                            <div class="row justify-content-md-center">
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <form class="form-signin" method="post" action="#" role="form" autocomplete="off">
                                        <input type="login" id="addr1" name="login" class="form-control" placeholder="Имя пользователя">
                                        <label class="checkbox"></label>
                                        <input type="password" id="addr2" name="password" class="form-control" placeholder="Пароль">
                                        <label class="checkbox"></label>
                                        <button class="btn btn-lg btn-primary btn-block" id="batton" name="submit" type="submit">Войти</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>