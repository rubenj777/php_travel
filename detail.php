<?php
session_start();
require_once "code.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://bootswatch.com/5/journal/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Voyages</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/voyages">Voyages</a>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto align-items-center">
                    <?php

                    if (isset($_SESSION['connected']) && $_SESSION['connected']) { ?>
                        <li>
                            <form action='' method='post'>
                                <input type='submit' name='logout' value='Se déconnecter' class='btn'>
                            </form>
                        </li>
                        <li>Bienvenue, <?= $_SESSION['username'] ?></li>

                    <?php } else { ?>

                        <li class=''>
                            <form action='' method='post' class='d-flex'>
                                <input type='text' name='username' placeholder="username" class="me-3">
                                <input type='password' name='password' placeholder="password" class="me-3">
                                <input type='submit' value='Se connecter' class='btn btn-success me-3'>
                            </form>
                        </li>
                        <li>
                            Connectez-vous pour avoir accès aux réductions !
                        </li>

                    <?php }
                    ?>
                </ul>
            </div>
        </div>
    </nav>


    <div class="row m-auto justify-content-start">
        <?= $pageContent; ?>
    </div>


</body>

</html>