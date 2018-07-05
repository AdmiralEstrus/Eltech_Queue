<html>
<head>
    <title>ФКТИ | Электронная очередь</title>
    <link rel="icon" type="image/png" sizes="96x96" href="/public/image/favicon-96x96.png">
    <link rel="stylesheet" href="/public/css/site.css">
</head>

<body>
<div class="container">
    <div id="Information">
        <h1>Текущий номер:</font></h1> <br>
        <h1 style="font-size: 1400%; margin-top: -55px"><?= $_SESSION['currentNumber'] ?></h1>
    </div>

    <div id="Navigation">
        <table>
            <tr>
                <form action="" method="post" id="next">
                    <button type="submit" name="next" class="btn">Следующий</button>
                </form>
            </tr>
            <br>
            <tr>
                <form action="" method="post">
                    <button class="btn" type="submit" name="prev">Назад</button>
                </form>

            </tr>
            <br>
            <tr>
                <form action="" method="post">
                    <button class="btn" type="submit" name="reset">Сбросить</button>
                </form>
            </tr>
        </table>
    </div>
</div>
</body>
</html>