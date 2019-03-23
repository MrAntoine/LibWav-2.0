<?php
include("config/config.php");
include("config/bd.php"); // commentaire
include("assets/divers/balises.php");
include("assets/divers/functions_library.php");
include("config/actions.php");
session_start();
ob_start(); // Je démarre le buffer de sortie : les données à afficher sont stockées
if(isAjax() == false) {
    ?>


    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LibWav</title>

        <!-- CSS -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/404.css" rel="stylesheet">
        <link rel="stylesheet" href="./assets/css/general.css" type="text/css">



        <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>


    </head>


<body>


    <?php
    if (isset($_SESSION['info'])) {
        echo "<div class='alert alert-info alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span></button>
        <strong>Information : </strong> " . $_SESSION['info'] . "</div>";
        unset($_SESSION['info']);
    }
    ?>



    <?php

    if (isset($_SESSION['id'])) {
        CompleteProfil();
            include('vues/nav.php');
    } else {
            include('vues/nav.php');
        }
        
        ?>




        <!-- <nav>
            <ul>
                <li><a href="index.php?action=page2">Va voir la page 2</a></li>
                <li> <a href="index.php?action=enregistrement">Créer un compte</a> </li>
            </ul>
        </nav> -->

        <!--
        <div class="container-fluid" style="left: 0px;">
            <div class="row">
                <!--<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">-->
        <!--
        <div class="col-md-12 main">-->
        <?php

        // Quelle est l'action à faire ?
        if (isset($_GET["action"])) {
            $action = $_GET["action"];
        } else {
            $action = "son";
        }
        // Est ce que cette action existe dans la liste des actions
        if (array_key_exists($action, $listeDesActions) == false) {
            include("vues/404.php"); // NON : page 404
        } else {
            include($listeDesActions[$action]); // Oui, on la charge
        }
        ob_end_flush(); // Je ferme le buffer, je vide la mémoire et affiche tout ce qui doit l'être
        ?>

        <!--
                </div>
            </div>
        </div>-->


        <?php
        include('vues/footer.php');
        ?>


        </body>
        </html>
        <?php
    } else {
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    } else {
        $action = "login";
    }
    // Est ce que cette action existe dans la liste des actiqsons
    if (array_key_exists($action, $listeDesActions) == false) {
        include("vues/404.php"); // NON : page 404
    } else {
        include($listeDesActions[$action]); // Oui, on la charge
    }

}

//$_SESSION['id']=1;
//echo $_SESSION['id'];




?>


