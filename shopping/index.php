<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/library/functions.php';

$apples = array(
    array("name" => "Fuji", "img" => "fuji.png"),
    array("name" => "Gala", "img" => "gala.png"),
    array("name" => "Golden Del.", "img" => "golden-delicious.png"),
    array("name" => "Granny Smith", "img" => "granny-smith.png"),
    array("name" => "Honeyscrisp", "img" => "honeycrisp.png"),
    array("name" => "Ambrosia", "img" => "ambrosia.png")
);

$prices = array(
    array("name" => "Fuji", "three-lbs" => 4, "peck" => 12),
    array("name" => "Gala", "three-lbs" => 3, "peck" => 8),
    array("name" => "Golden Del.", "three-lbs" => 4, "peck" => 12),
    array("name" => "Granny Smith", "three-lbs" => 4, "peck" => 12),
    array("name" => "Honeyscrisp", "three-lbs" => 6, "peck" => 20),
    array("name" => "Ambrosia", "three-lbs" => 3, "peck" => 8)
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
        $img = filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
        $size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);
        $cost = 0;
        if ($size == 'three-lbs') {
            foreach ($prices as $price) {
                if ($name == $price['name']) {
                    $cost = $quantity * $price["three-lbs"];
                    break;
                }
            }
        } elseif ($size == 'peck') {
            foreach ($prices as $price) {
                if ($name == $price['name']) {
                    $cost = $quantity * $price["peck"];
                    break;
                }
            }
        } else {
            include $_SERVER['DOCUMENT_ROOT'] . '/view/error.php';
            exit;
        }

        $forcart = array(
            "name" => $name,
            "img" => $img,
            "quantity" => $quantity,
            "size" => $size,
            "cost" => $cost
        );

        addToCart($forcart);

        header('Location: /shopping/index.php?action=browse');
        exit;
        break;
    case 'viewCart':
        $activeCart = buildCartView();

        include $_SERVER['DOCUMENT_ROOT'] . '/view/viewCart.php';
        break;
    case 'clearCart':
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        header('Location: /shopping/index.php?action=viewCart');
        break;
    case 'removeItem':
        $index = filter_input(INPUT_POST, 'index', FILTER_SANITIZE_NUMBER_INT);
        removeCartItem($index);
        header('Location: /shopping/index.php?action=viewCart');
        break;
    case 'checkout':
        if(!isset($_SESSION['cart'])) {
            header('Location: /shopping/index.php?action=browse');
            exit;
        }
        include $_SERVER['DOCUMENT_ROOT'] . '/view/checkout.php';
        break;
    case 'confirm':
        if(!isset($_SESSION['cart'])) {
            header('Location: /shopping/index.php?action=browse');
            exit;
        }
        
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $cardnum = filter_input(INPUT_POST, 'cardnum', FILTER_SANITIZE_STRING);

        $confirmlist = buildConfirmView();

        include $_SERVER['DOCUMENT_ROOT'] . '/view/confirm.php';
        unset($_SESSION['cart']);
        break;
    default:
        header('Location: /index.php');
        exit;
        break;
}
