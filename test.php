<?php
require_once 'dbconnect.php';
require_once('main.php');
if(isset($_COOKIE['id'])){
    $query = mysqli_query($db, "SELECT * FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);
    if($userdata['id'] !== $_COOKIE['id']){
        setcookie("id", "", time() - 3600*24*30*12, "/");
        echo "Ошибка.";
    } else {
        echo "Привет: " . $userdata['login'] . ". Все работает!";
    }
} else {
    echo "Включите куки.";
}