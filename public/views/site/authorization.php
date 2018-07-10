<html>
<head>
    <title>ФКТИ | Авторизация</title>
    <link rel="icon" type="image/png" sizes="96x96" href="/public/image/favicon-96x96.png">
    <link rel="stylesheet" href="/public/css/auth.css">
</head>

<body>
<div class="errorMessage">
    <?php
    if (isset($_SESSION['errorMessage'])) {
        echo $_SESSION['errorMessage'];
        $_SESSION['errorMessage'] = "";
    }
    ?>
</div>
<div class="container">
    <div class="login">
        <form action="authorization" method="post">
            <div class="title">Авторизация</div>
            <div class="label">Выберите ID компьютера:</div>
            <div class="label" style="font-size: 14px;">Отсчет идет справа налево</div>
            <select required name="userID">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <?php if ($_SESSION['enableRoom'] == 1) { ?>
                    <option>5</option>
                <?php } ?>
            </select>
            <button name="setNewUser">Войти</button>
        </form>
    </div>
</div>
</body>
</html>
