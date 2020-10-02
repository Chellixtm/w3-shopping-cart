<?php

session_start();

$apples = array(
    array("Fuji",4,12),
    array("Gala",3,8),
    array("Golden Delicious",4,12),
    array("Granny Smith",4,12),
    array("Honeyscrisp",6,20),
    array("Ambrosia",3,8)
);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'browse':
        include $_SERVER['DOCUMENT_ROOT'] . '/view/browse.php';
    break;
    case 'viewCart':
        include $_SERVER['DOCUMENT_ROOT'] . '/view/viewCart.php';
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
