<!DOCTYPE html>
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
    <link rel="stylesheet" href="/public/css/site.css">
</head>

<body>

<div class="container">
    <div id="buttons">
        <table>
            <tr>
                <form action="" method="post">
                    <button id="1" class="Next" type="submit" name="next" onclick="change_color(this)"><h1>1</h1></button>
                </form>

                <form action="" method="post">
                    <button id="2" class="Next" type="submit" name="next"><h1>2</h1></button>
                </form>

                <form action="" method="post">
                    <button id="3" class="Next" type="submit" name="next"><h1>3</h1></button>
                </form>

                <form action="" method="post">
                    <button id="4" class="Next" type="submit" name="next"><h1>4</h1></button>
                </form>
            </tr>
        </table>
    </div>

    <div id="Information">
        <h1>Текущий номер:</font></h1> <br>
        <h1 style="font-size: 1400%; margin-top: -55px"><?= $_SESSION['currentNumber'] ?></h1>
    </div>

    <div id="Navigation">

        <table>
            <tr>
                <form action="" method="post">
                    <button class="btn" type="submit" name="prev">Назад</button>
                </form>

            </tr> <br>

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