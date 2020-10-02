<?php
function buildbrowse($apple) {
    $browsea = "<div class='col-md center-text'>";
    $browsea .= "<img src='/images/$apple[1]' class='icon-circle' height='150px' width='150px' />";
    $browsea .= "<h2>$apple[0]</h2>";
    $browsea .= "<p>Delicious apples picked fresh from our farm!</p>";
    $browsea .= "<p>Quantity Desired:</p>";
    $browsea .= "<input type='number' min='0' max='999'> <select name='size' id='size'>";
    $browsea .= "<option value='three-lbs'>3 Pounds</option>";
    $browsea .= "<option value='peck'>Peck</option>";
    $browsea .= "</select>";
    $browsea .= "</div>";
    return $browsea;
}
