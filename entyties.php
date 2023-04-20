<?php
require_once 'dbconnect.php';
require_once 'main.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $adress = $_POST['adress'];
    $phone = $_POST['phone'];

    mysqli_query($db, "INSERT INTO entyties SET name = '$name', surname = '$surname', adress = '$adress', phone = '$phone'");
    header('Location: /lab7/Adress-book/entyties.php');
}
?>
<form action="" method="post">
    <div class="mb-3">
    <input name="name" type="text" required class="form-control-sm" placeholder="Имя"><br>
    </div>
    <div class="mb-3">
    <input name="surname" type="text" required class="form-control-sm" placeholder="Фамилия"><br>
    </div>
    <div class="mb-3">
    <input name="adress" type="text" required class="form-control-sm" placeholder="Адрес"><br>
    </div>
    <div class="mb-3">
    <input name="phone" type="text" required class="form-control-sm" placeholder="Номер телефона"><br>
    </div>
<input name="submit" type="submit" value="Создать" class="btn btn-success">
</form>
<?php
$query = mysqli_query($db, "SELECT * FROM entyties");
while($row = mysqli_fetch_assoc($query)){
    ?>
    <p>
        Имя: <?= $row['name']; ?><br>
        Фамилия: <?= $row['surname']; ?><br>
        Адрес: <?= $row['adress']; ?><br>
        Номер телефона: <?= $row['phone']; ?><br>
    </p>
    <?php
}