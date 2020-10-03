<?php
function buildbrowse($apple)
{
    $browsea = "<div class='col-4 center-text browse-pad'>";
    $browsea .= "<img src='/images/$apple[img]' class='icon-circle' height='150px' width='150px' />";
    $browsea .= "<h2>$apple[name]</h2>";
    $browsea .= "<p>Delicious apples picked fresh from our farm!</p>";
    $browsea .= "<p>Quantity Desired:</p>";
    $browsea .= "<form action='/shopping/index.php' method='post'>";
    $browsea .= "<input type='number' min='0' max='999' name='quantity' style='margin-right:1rem'>";
    $browsea .= "<select name='size' id='size'>";
    $browsea .= "<option value='three-lbs'>3 Pounds</option>";
    $browsea .= "<option value='peck'>Peck</option>";
    $browsea .= "</select><br>";
    $browsea .= "<input type='submit' name='submit' value='Add to Cart' style='margin-top:1rem'>";
    $browsea .= "<input type='hidden' name='name' value='$apple[name]'>";
    $browsea .= "<input type='hidden' name='img' value='$apple[img]'>";
    $browsea .= "<input type='hidden' name='action' value='add'>";
    $browsea .= "</form>";
    $browsea .= "</div>";
    return $browsea;
}

function buildCartView()
{
    $cart = '';
    $index = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $cart .= "<div class='card mb-3'>";
            $cart .= "<div class='row no-gutters'>";
            $cart .= "<div class='col-md-4 my-auto'>";
            $cart .= "<img src='/images/$item[img]' class='card-img' alt='A picture of $item[name]'>";
            $cart .= "</div>";
            $cart .= "<div class='col-md-8'>";
            $cart .= "<div class='card-body'>";
            $cart .= "<h5 class='card-title'>$item[name]</h5>";
            $cart .= "<p class='card-text'>Size: $item[size]<br>";
            $cart .= "Quantity: $item[quantity]<br>";
            $cart .= "Price: $$item[cost].00</p>";
            $cart .= "<form action='/shopping/index.php' method='post'>";
            $cart .= "<input type='hidden' name='index' value='$index'>";
            $cart .= "<input type='hidden' name='action' value='removeItem'>";
            $cart .= "<input type='submit' name='submit' value='Remove' class='btn btn-danger'>";
            $cart .= "</form>";
            $cart .= "</div>";
            $cart .= "</div>";
            $cart .= "</div>";
            $cart .= "</div>";
            $index++;
        }
    } else {
        $cart .= "<h3>Your cart is empty!</h3>";
        $cart .= "<p>Try picking some apples out!</p>";
    }
    return $cart;
}

function buildConfirmView()
{
    $cart = '';
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $cart .= "<div class='card mb-3'>";
            $cart .= "<div class='row no-gutters'>";
            $cart .= "<div class='col-md-4 my-auto'>";
            $cart .= "<img src='/images/$item[img]' class='card-img' alt='A picture of $item[name]'>";
            $cart .= "</div>";
            $cart .= "<div class='col-md-8'>";
            $cart .= "<div class='card-body'>";
            $cart .= "<h5 class='card-title'>$item[name]</h5>";
            $cart .= "<p class='card-text'>Size: $item[size]<br>";
            $cart .= "Quantity: $item[quantity]<br>";
            $cart .= "Price: $$item[cost].00</p>";
            $cart .= "</div>";
            $cart .= "</div>";
            $cart .= "</div>";
            $cart .= "</div>";
        }
    }
    return $cart;
}

function getTotal()
{
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['cost'];
        }
    }
    return $total;
}

function addToCart($forcart)
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array($forcart);
    } else {
        array_push($_SESSION['cart'], $forcart);
    }
}

function removeCartItem($index)
{
    array_splice($_SESSION['cart'], $index, 1);
    if ($_SESSION['cart'] == NULL) {
        unset($_SESSION['cart']);
    }
}
