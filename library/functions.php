<?php
function buildbrowse($apple) {
    $browsea = "<div class='col-4 center-text browse-pad'>";
    $browsea .= "<img src='/images/$apple[1]' class='icon-circle' height='150px' width='150px' />";
    $browsea .= "<h2>$apple[0]</h2>";
    $browsea .= "<p>Delicious apples picked fresh from our farm!</p>";
    $browsea .= "<p>Quantity Desired:</p>";
    $browsea .= "<form action='/shopping/index.php' method='post'>";
    $browsea .= "<input type='number' min='0' max='999' name='quantity' style='margin-right:2rem'>";
    $browsea .= "<select name='size' id='size' name='type'>";
    $browsea .= "<option value='three-lbs'>3 Pounds</option>";
    $browsea .= "<option value='peck'>Peck</option>";
    $browsea .= "</select><br>";
    $browsea .= "<input type='submit' name='submit' value='Add to Cart' style='margin-top:1rem'>";
    $browsea .= "<input type='hidden' name='name' value='$apple[0]'>";
    $browsea .= "<input type='hidden' name='action' value='add'>";
    $browsea .= "</form>";
    $browsea .= "</div>";
    return $browsea;
}

function addToCart() {
    if(!isset($_SESSION['cart'])) {

    }
}
