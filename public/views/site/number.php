<html>
<head>
    <title>ФКТИ | Получение номера</title>
    <link rel="icon" type="image/png" sizes="96x96" href="/public/image/favicon-96x96.png">
    <link rel="stylesheet" href="/public/css/auth.css">
</head>

<body>
    <form action="number" method="post">
        <button name="getNumber" type="submit">Получить номер в очереди</button>
    </form>

    <?php if (isset($_SESSION['nextNumber'])) { ?>
    <div>
        <h1 style="text-align: center;">
            Ваш номер в очереди: <?= $_SESSION['nextNumber']; ?>
        </h1>
    </div>
    <?php } ?>
</body>
</html>
