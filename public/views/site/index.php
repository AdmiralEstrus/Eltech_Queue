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

    <div id="buttons">
        <table>
            <tr>
                <form action="" method="post">
                    <button id="1" class="Next" type="submit" name="next1" onclick="change_color(this)">
                        <h1><?= $_SESSION['user1'] ?></h1></button>
                </form>

                <form action="" method="post">
                    <button id="2" class="Next" type="submit" name="next2"><h1><?= $_SESSION['user2'] ?></h1></button>
                </form>

                <form action="" method="post">
                    <button id="3" class="Next" type="submit" name="next3"><h1><?= $_SESSION['user3'] ?></h1></button>
                </form>

                <form action="" method="post">
                    <button id="4" class="Next" type="submit" name="next4"><h1><?= $_SESSION['user4'] ?></h1></button>
                </form>
            </tr>
        </table>
    </div>

    <div id="Navigation">
        <table>
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