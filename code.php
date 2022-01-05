<?php
require_once "auth.php";
require_once "voyages.php";

$pageContent = "";
$templateCard = "";

foreach ($voyages as $voyage) {
    if (isset($_SESSION['connected']) && $_SESSION['connected']) {
        $voyage['prix'] = $voyage['prix'] * 0.8 . " (-20%)";
    }


    if (isset($_GET['voyage'])) {
        if ($_GET['voyage'] == $voyage['destination']) {
            $pageContent =
                "<div class='detail col-12' style='background:url({$voyage['image']});height:100vh;background-position:center;position:absolute;object-fit:contain'>
                
                <div id='text' class='d-flex flex-column col-2 m-5 card p-3'>
                    <h1 class=''>{$voyage['destination']}</h1>
                    <h2 class=''>{$voyage['duree']} jours</h2>
                    <h3 class=''>{$voyage['prix']}€</h3>
                    <h4 class=''>{$voyage['personnes']} voyageurs</h4>
                    <h5 class=''>Vous voyagez en {$voyage['transport']}</h4>
                
                </div>
                </div>";
        }
    } else {
        $templateCard =
            "<div class='card col-2 mt-5 mx-3' style='background-image:url({$voyage['image']});color:white'>
          <div class='card-body'>
          <h1 class='card-title'>{$voyage['destination']}</h1>
          <h2 class='card-text'>{$voyage['duree']} jours</h2>
          <h3 class='card-text'>{$voyage['prix']}€</h3>
          <h5 class='card-text'>{$voyage['personnes']} voyageurs</h5>
          <form method='get'>
          <a class='btn btn-primary m-0' href='detail.php?voyage={$voyage['destination']}'>Voir le voyage</a>
          </form>
        </div>
      </div>";
    }
    $pageContent .= $templateCard;
}
