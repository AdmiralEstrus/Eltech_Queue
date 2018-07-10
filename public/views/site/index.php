<html>
<head>
    <title>ФКТИ | Электронная очередь</title>
    <link rel="icon" type="image/png" sizes="96x96" href="/public/image/favicon-96x96.png">
    <link rel="stylesheet" href="/public/css/site.css">
</head>

<body>
<div class="container">
    <h1>Текущий номер очереди: <?= $_SESSION['currentNumber'] . "<br>" ?></h1>


    <div class="buttons">
        <table class="queueInfo">
            <tr>
                <?php
                for ($i = 1; $i <= 5; $i++)
                    if ($_SESSION['systemAdminID'] == $i)
                        echo "<td><div class='currentQueue Next'>Оператор #" . $i . " <b>(Вы)</b>: " . $_SESSION['user' . $i] . "</td></div>";
                    else
                        echo "<td><div class='currentQueue Next'>Оператор #" . $i . ": " . $_SESSION['user' . $i] . "</td></div>";
                ?>
            </tr>
        </table>
    </div>

    <tr>
        <form action="" method="post" style="text-align:center;">
            <button class="btn next-btn" name="next">Следующий</button>
        </form>
    </tr>

    <div id="Navigation">
        <table>
            <tr>
                <form action="" method="post">
                    <button class="btn" name="prev">Назад</button>
                </form>

            </tr>
            <br>
            <tr>
                <form action="" method="post">
                    <button class="btn" name="reset">Сбросить</button>
                </form>
            </tr>
            <br>
            <tr>
                <form action="" method="post">
                    <button class="btn" name="logout">Выйти</button>
                </form>
            </tr>
            <br>
            <tr>
                <form action="" method="post">
                    <?php if ($_SESSION['enableRoom'] == 1) { ?>
                        <button class="btn" name="add">Выключить 5 компьютер</button>
                    <?php } else { ?>
                        <button class="btn" name="add">Включить 5 компьютер</button>
                    <?php } ?>
                </form>

            </tr>

        </table>
    </div>
</div>
</body>
</html>