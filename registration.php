<?php
require_once('dbconnect.php');
if(isset($_POST['submit'])){
    $err = [];

    if(!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])){
        $err[] = "Логин может состоять только из букв английского алфавита и цифр.";
    }

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30){
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30.";
    }

    $query = mysqli_query($db, "SELECT id FROM users WHERE login='".mysqli_real_escape_string($db, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0){
        $err[] = "Оператор с таким логином уже существует.";
    }

    if(count($err) == 0){
        $login = $_POST['login'];
        $password = md5(trim($_POST['password']));
        $role = $_POST['role'];

        mysqli_query($db, "INSERT INTO users SET login = '$login', password = '$password', role = '$role'");
        header("Location: /lab7/authorization.php"); exit();
    } else {
        echo "При регистрации произошли следующие ошибки:";
        foreach($err as $error){
            echo $error."<br>";
        }
    }
}
?> 
<form method="POST">
    Логин <input name="login" type="text" required><br>
    Пароль <input name="password" type="password" required><br>
    Роль <select name="role" required>
        <option value="Operator">Operator</option>
    </select>
    <input name="submit" type="submit" value="Зарегистрироваться">
</form>