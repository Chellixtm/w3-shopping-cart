<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Mitchell Hudson">
    <title>Golden Apple Orchard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <?php
                    echo $activeCart;
                    if (isset($_SESSION['cart'])) {
                        echo "<form action='/shopping/index.php' method='POST'>";
                        echo "<input type='hidden' name='action' value='clearCart'>";
                        echo "<input type='submit' name='submit' value='Clear Cart' class='btn btn-primary'>";
                        echo "</form>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-4 col-pad inherit-min">
                <div class="card cart-border inherit-min">
                    <div class="card-body">
                        <h5 class="card-title">Cart Total</h5>
                        <p class="card-text">
                        <?php 
                        if(isset($_SESSION['cart'])) {
                            $total = getTotal();
                            echo "Items:";
                            foreach($_SESSION['cart'] as $item) {
                                echo "<br>\t$item[name]: $$item[cost].00";
                            }
                            echo "<br><b>Total: $$total.00</b></p>";
                            echo "<a class='btn btn-primary' href='/shopping/index.php?action=checkout'>Checkout</a>";
                        } else {
                            echo "There are no items in your cart.</p>";
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

<!-- <?php
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                foreach ($item as $i) {
                    print($i);
                }
            }
        } else print("No Items in cart.");
        ?> -->