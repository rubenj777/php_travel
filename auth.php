<?php

$users = [
    [
        "id" => 1,
        "username" => "ruben",
        "password" => "ruben",
    ],
    [
        "id" => 2,
        "username" => "abdel",
        "password" => "abdel",
    ],
    [
        "id" => 3,
        "username" => "marie",
        "password" => "marie",
    ],
];


$loggedIn = false;
$userExists = false;
$_SESSION['username'];

if (isset($_POST['username']) && isset($_POST['password']) && (!empty($_POST['username'])) && (!empty($_POST['password']))) {

    foreach ($users as $user) {
        if ($_POST['username'] == $user['username']) {
            $userExists = true;
            $password = $user['password'];
            $_SESSION['username'] = $user['username'];
        }
    }



    if ($userExists) {
        if ($_POST['password'] == $password) {
            $_SESSION['connected'] = true;
            $loggedIn = true;
        }
    }
}


if (isset($_POST['logout'])) {
    unset($_SESSION['connected']);
}

// var_dump($welcome);
