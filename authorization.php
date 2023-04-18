<?php
require_once 'dbconnect.php';
if(isset($_POST['submit'])){
    $query = mysqli_query($db, "SELECT id, password FROM users WHERE login = '".mysqli_real_escape_string($db, $_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    if($data['password'] === md5($_POST['password'])){
        setcookie("id", $data['id'], time()+60*60*24*30, "/");
        header('Location: /lab7/test.php');
    } else {
        echo "Вы ввели неправильный логин или пароль.";
    }
}
?>
<form method="POST">
Логин <input name="login" type="text" required><br>
Пароль <input name="password" type="password" required><br>
<input name="submit" type="submit" value="Войти">
</form>