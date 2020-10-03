<!DOCTYPE html>
<html>

<head>
    <title>Golden Apple Orchard</title>
    <meta charset="UTF-8">
    <meta name="author" content="Mitchell Hudson">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/style/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/navbar.php'; ?>

    <div class="jumbotron jumbo-apple">
        <h1 class="display-4">Welcome to the Golden Apple Orchard!</h1>
        <p class="lead">We are a local apple farm excited to provide the area with delicious and colorful apples fresh off the tree!</p>
        <hr class="my-4">
        <p>To browse our current apple selection, just start by pressing the button below!</p>
        <a class="btn btn-primary btn-lg" href="/shopping/index.php?action=browse" role="button">Browse</a>
    </div>
</body>

<footer class="footer mt-auto py-3">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
</footer>

</html>