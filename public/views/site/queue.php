<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd"><!
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href='http://bootstraptema.ru/snippets/form/2017/recaptcha/custom.css' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>ФКТИ | Электронная очередь</title>
    <link rel="icon" type="image/png" sizes="96x96" href="/public/image/favicon-96x96.png">
    <link rel="stylesheet" href="/public/css/queue.css">
</head>

<body>

<div class="container">
    <div id="Information">
        <h1>Текущий номер:</h1>
        <br>
        <h1 style="font-size: 1400%; margin-top: -55px"><?= $_SESSION['currentNumber'] ?></h1>

        <h1 id="Attention" style="margin-top: -30px"><font color="#043C6B">Внимание! Подготовьте документы
                заранее! </font>
        </h1>
        <h1 id="Documents"><font color="#043C6B">(Копия паспорта, аттестата и приложения)</font></h1>
    </div>

    <div class="thisRoom">
        <h3 style="margin-left: 30px;">Аудитория 5322 (эта)</h3>
        <div id="buttons">
            <table>
                <tr>
                    <form action="" method="post">
                        <button id="1" class="Next" name="next1"><h1><?= $_SESSION['user1'] ?></h1></button>
                    </form>

                    <form action="" method="post">
                        <button id="2" class="Next" name="next2"><h1><?= $_SESSION['user2'] ?></h1></button>
                    </form>

                    <form action="" method="post">
                        <button id="3" class="Next" name="next3"><h1><?= $_SESSION['user3'] ?></h1></button>
                    </form>

                    <form action="" method="post">
                        <button id="4" class="Next" name="next4"><h1><?= $_SESSION['user4'] ?></h1></button>
                    </form>
                </tr>
            </table>
        </div>
    </div>

    <div class="nextRoom">
        <h3>Аудитория 5335 (соседняя)</h3>
        <div id="buttons">
            <table>
                <tr>
                    <form action="" method="post">
                        <button id="5" class="Next" style="margin: 0;" name="next4"><h1><?= $_SESSION['user5'] ?></h1>
                        </button>
                    </form>
                </tr>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            setInterval(function () {
                location.reload()
            }, 250);
        });
    </script>
</body>
</html>