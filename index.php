<?php
//$db = mysqli_connect('mysql-114993.srv.hoster.ru', 'srv114993_Kiran', 'Dbhtylh', 'srv114993_database');
//$result = mysqli_query($db,"SELECT * FROM queue WHERE id = 1");
//$fetch = $result->fetch_assoc();
//$currentNumber = $fetch['currentNumber'];
//
//if (isset($_POST['next'])) {
//    $currentNumber++;
//    mysqli_query($db, "UPDATE queue SET currentNumber = $currentNumber");
//}
//
//if (isset($_POST['reset'])) {
//    $currentNumber = 0;
//    mysqli_query($db, "UPDATE queue SET currentNumber = $currentNumber");
//}
//
//if (isset($_POST['prev'])) {
//    $currentNumber--;
//    mysqli_query($db, "UPDATE queue SET currentNumber = $currentNumber");
//}
//?>
<!---->
<!--<div style="text-align: center;" class="currentNumber">-->
<!--    <h1>Следующий номер: --><?//= $currentNumber ?><!--</h1>-->
<!--</div>-->
<!---->
<!--<div id="result"></div>-->
<!---->
<!--<form action="" method="post" id="next">-->
<!--    <button type="submit" name="next">Следующий</button>-->
<!--</form>-->
<!---->
<!---->
<!--<form action="" method="post" id="reset">-->
<!--    <button type="submit" name="reset">Сбросить</button>-->
<!--</form>-->
<!---->
<!--<form action="" method="post" id="prev">-->
<!--    <button type="submit" name="prev">Назад</button>-->
<!--</form>-->
<!---->
<!---->
<!--<script>-->
<!---->
<!---->
<!--</script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

<?php
// Front controller
// 1. Общие настрйки
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
// 2. Подключение файлов системы
require_once(__DIR__ . '/components/Router.php');
require_once(__DIR__ . '/components/Db.php');
// 3. Установка соединения с БД
// 4. Вызов Router
$router = new Router();
$router->run();