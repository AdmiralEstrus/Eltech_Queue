<?php
$db = mysqli_connect('mysql-114993.srv.hoster.ru', 'srv114993_Kiran', 'Dbhtylh', 'srv114993_database');
$result = mysqli_query($db,"SELECT * FROM queue WHERE id = 1");
$fetch = $result->fetch_assoc();
$currentNumber = $fetch['currentNumber'];

if (isset($_POST['next'])) {
    $currentNumber++;
    mysqli_query($db, "UPDATE queue SET currentNumber = $currentNumber");
}

if (isset($_POST['reset'])) {
    $currentNumber = 0;
    mysqli_query($db, "UPDATE queue SET currentNumber = $currentNumber");
}

if (isset($_POST['prev'])) {
    $currentNumber--;
    mysqli_query($db, "UPDATE queue SET currentNumber = $currentNumber");
}
?>

<center>
    <h1>Следующий номер: <?= $currentNumber ?></h1>
</center>

<form action="" method="post">
    <button type="submit" name="next">Следующий</button>
</form>


<form action="" method="post">
    <button type="submit" name="reset">Сбросить</button>
</form>

<form action="" method="post">
    <button type="submit" name="prev">Назад</button>
</form>