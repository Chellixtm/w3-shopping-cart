<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Mitchell Hudson">
    <title>Browse Apples</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/style/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/navbar.php'; ?>

    <div class="container center-text">
    <h2>Success!</h2>
    <p>Thank you for your order <?=$firstname?> <?=$lastname?>! We will be shipping your order out soon to: <?=$address?></p>
    <p>Look below to see what item you ordered.</p>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <?=$confirmlist?>
        </div>
        <div class="col-3"></div>
    </div>
    <p>We hope you will order again from us soon!</p>
    <a href="/index.php" class="btn btn-success">Home</a>
    </div>
</body>

<footer class="footer mt-auto py-3">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
</footer>

</html>