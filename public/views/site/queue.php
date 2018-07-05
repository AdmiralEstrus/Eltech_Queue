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
<script>
    function updatePage() {
        location.reload()
    }
    setInterval(updatePage(), 1000);

</script>

</body>
</html>