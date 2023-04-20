<?php
require_once 'dbconnect.php';
require_once 'main.php';
$inputSearch = $_REQUEST['search']; 
 
$sql = "SELECT * FROM `individuals` WHERE `adress` = '$inputSearch' || `phone` = '$inputSearch'";
$sql2 = "SELECT * FROM `entyties` WHERE `adress` = '$inputSearch' || `phone` = '$inputSearch'";
 
$result = mysqli_query($db, $sql);
$result2 = mysqli_query($db, $sql2);
function searchIndividuals($result) { 
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: ". $row['id'] ."<br>
                  Имя: ". $row['name'] ."<br>
                  Фамилия: ". $row['surname'] ."<br>
                  Телефон: ". $row['phone'] ."<br>
                  Адрес: ".$row['adress'] ."<br>";
        }
    }
}
function searchEntyties($result2){
    if (mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
            echo "ID: ". $row['id'] ."<br>
                  Имя: ". $row['name'] ."<br>
                  Фамилия: ". $row['surname'] ."<br>
                  Телефон: ". $row['phone'] ."<br>
                  Адрес: ".$row['adress'] ."<br>";
        }
    }
}
?>
<form action="" method="post">
    <div class="mb-3">
        <input type="text" name="search" class="form-control-sm" placeholder="Введите номер телефона или адресс нужного абонента"><br>
    </div>
    <input type="submit" name="submit" class="btn btn-success" value="Найти">
</form>
<?php
    searchIndividuals($result);
    searchEntyties($result2);
?>