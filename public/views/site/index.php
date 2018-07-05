<html>
<head>
    <title>ФКТИ | Электронная очередь</title>
    <link rel="icon" type="image/png" sizes="96x96" href="/public/image/favicon-96x96.png">
    <link rel="stylesheet" href="/public/css/site.css">
</head>

<body>
<div class="currentNumber">
    Следующий номер:
    <div id="numberElement">
        <?= "\n" . $_SESSION['currentNumber'] ?>
    </div>

</div>

<div class="buttons">
    <form action="" method="post" id="next">
        <button type="submit" name="next" class="btn">Следующий</button>
    </form>


    <form action="" method="post" id="reset">
        <button type="submit" name="reset" class="btn">Сбросить</button>
    </form>

    <form action="" method="post" id="prev">
        <button type="submit" name="prev" class="btn">Назад</button>
    </form>
</div>

</body>
</html>