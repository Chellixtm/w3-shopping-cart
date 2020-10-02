<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/library/functions.php';

$apples = array(
    array("Fuji", "fuji.png", 4, 12),
    array("Gala", "gala.png", 3, 8),
    array("Golden Del.", "golden-delicious.png", 4, 12),
    array("Granny Smith", "granny-smith.png", 4, 12),
    array("Honeyscrisp", "honeycrisp.png", 6, 20),
    array("Ambrosia", "ambrosia.png", 3, 8)
);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'browse':
        $showbr = '';
        foreach ($apples as $ap) {
            $showbr .= buildbrowse($ap);
        }
        include $_SERVER['DOCUMENT_ROOT'] . '/view/browse.php';
        break;
    case 'add':
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);

        $forcart = array($name, $quantity, $type);

        addToCart($forcart);

        header('Location: /shopping/index.php?action=browse');
        break;
    case 'viewCart':
        include $_SERVER['DOCUMENT_ROOT'] . '/view/viewCart.php';
        break;
    case 'clearCart':
        if (isset($_SESSION['cart'])) {
            $_SESSION['cart'] = '';
        }
        break;
    case 'checkout':
        include $_SERVER['DOCUMENT_ROOT'] . '/view/checkout.php';
        break;
    case 'confirm':
        include $_SERVER['DOCUMENT_ROOT'] . '/view/confirm.php';
        break;
    default:
        header('Location: /index.php');
        break;
}
