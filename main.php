<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <ul class="nav">
        <?php if(!isset($_COOKIE['id'])){?>
        <li class="nav-item"><a href="<?php $uri = 'http://192.168.14.202/lab7/Adress-book/authorization.php';
        $uriPath = parse_url($uri, PHP_URL_PATH);
        echo $uriPath; ?>" class="nav-link">Авторизация</a></li><?php } ?>
        <?php if(isset($_COOKIE['id'])){?>
        <li class="nav-item"><a href="<?php $uri = 'http://192.168.14.202/lab7/Adress-book/test.php'; 
        $uriPath = parse_url($uri, PHP_URL_PATH);
        echo $uriPath;?>" class="nav-link">Главная</a></li>
        <li class="nav-item"><a href="<?php $uri = 'http://192.168.14.202/lab7/Adress-book/registration.php';
        $uriPath = parse_url($uri, PHP_URL_PATH);
        echo $uriPath; ?>" class="nav-link">Регистрация</a></li>
        <li class="nav-item"><a href="<?php $uri = 'http://192.168.14.202/lab7/Adress-book/individuals.php';
        $uriPath = parse_url($uri, PHP_URL_PATH);
        echo $uriPath; ?>" class="nav-link">Физические лица</a></li>
        <li class="nav-item"><a href="<?php $uri = 'http://192.168.14.202/lab7/Adress-book/entyties.php';
        $uriPath = parse_url($uri, PHP_URL_PATH);
        echo $uriPath; ?>" class="nav-link">Юридические лица</a></li>
        <li class="nav-item"><a href="<?php $uri = 'http://192.168.14.202/lab7/Adress-book/search.php';
        $uriPath = parse_url($uri, PHP_URL_PATH);
        echo $uriPath; ?>" class="nav-link">Поиск</a></li>
        <?php
        if(isset($_POST['submit1'])){
            setcookie("id", "", time() - 3600*24*30*12, "/");
            header("Location: /lab7/Adress-book/authorization.php");
        } ?>
        <form action="" method="post">
            <li class="nav-item"><input class="nav-link btn" type="submit" name="submit1" value="Выйти"></li>
        </form><?php } ?>
    </ul>
</body>
</html>