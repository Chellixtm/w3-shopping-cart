<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Mitchell Hudson">
    <title>ERROR!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/style/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/navbar.php'; ?>

    <h2>ERROR!</h2>
    <?=$cost?>
    <?=$size?>
</body>

<footer class="footer mt-auto py-3">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
</footer>

</html>