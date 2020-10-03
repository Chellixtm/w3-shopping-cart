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
    <div class="container cart-height">
        <div class="row inherit-min">
            <div class="col-6 col-pad inherit-min">
                <div class="container inherit-min cart-border col-pad">
                    <form action="/shopping/index.php" method="post">
                            <h3>Please enter your contact info:</h3>


                        <div class="row">
                            <div class="col-3">
                                <label for="firstname">First Name: </label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="firstname" name="firstname" placeholder="First Name">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-3">
                                <label for="lastname">Last Name: </label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="lastname" name="lastname" placeholder="Last Name"><br>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-3">
                                <label for="address">Address: </label>
                            </div>
                            <div class="col-9">
                                <textarea id="address" name="address" rows="4" cols="30" placeholder="Enter Address Here"></textarea>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-3">
                                <label for="cardnum">Card Number</label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="cardnum" name="cardnum" placeholder="Card #">
                            </div>
                        </div>
                            <input type="hidden" name="action" value="confirm">
                            <input type="submit" name="submit" value="Pay Now" class="btn btn-success">
                    </form>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-4 col-pad inherit-min">
                <div class="card cart-border inherit-min">
                    <div class="card-body">
                        <h5 class="card-title">Cart Total</h5>
                        <p class="card-text">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $total = getTotal();
                                echo "Items:";
                                foreach ($_SESSION['cart'] as $item) {
                                    echo "<br>\t$item[name]: $$item[cost].00";
                                }
                                echo "<br><b>Total: $$total.00</b></p>";
                            } else {
                                echo "There are no items for you to checkout.</p>";
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<footer class="footer mt-auto py-3">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
</footer>

</html>