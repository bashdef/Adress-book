<?php
require_once 'dbconnect.php';
require_once('main.php');
if(isset($_POST['submit'])){
    $query = mysqli_query($db, "SELECT id, password FROM users WHERE login = '".mysqli_real_escape_string($db, $_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    if($data['password'] === md5($_POST['password'])){
        setcookie("id", $data['id'], time()+60*60*24*30, "/");
        header('Location: /lab7/Adress-book/test.php');
    } else {
        echo "Вы ввели неправильный логин или пароль.";
    }
}
?>
<form method="POST">
    <div class="mb-3">
        <input name="login" type="text" required placeholder="Логин" class="form-control-sm"><br>
    </div>
    <div class="mb-3">
        <input name="password" type="password" required placeholder="Пароль" class="form-control-sm"><br>
    </div>
<input name="submit" type="submit" value="Войти" class="btn btn-success">
</form>