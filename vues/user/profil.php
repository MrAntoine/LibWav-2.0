<link rel="stylesheet" href="./assets/css/profil.css" type="text/css">


<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 19/01/2019
 * Time: 10:19
 */


$autorisation = false;

if (!isset($_GET["id"]) || ($_GET["id"]) == ($_SESSION["id"])) {
    $id = $_SESSION["id"];
} else {
    $id = $_GET["id"];
}
echo "<div id='profil'><div id='grille'>";
include('vues/user/infos_user_avatar.php');


if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

echo " <p id='nom'>" . $affiche_user["pseudo"] . "</p>";

if ($autorisation === true) {
    if ($affiche_user["sexe"] != NULL ){
        echo "<p id='sexe'> Sexe :".$affiche_user["sexe"]."</p>";
    };


    if ($affiche_user["anniversaire"] !="0000-00-00" ){
        echo "<p id='anniv'> Anniversaire :".$affiche_user["anniversaire"]."</p>";
    };

    echo "</div>";

    echo "<div id='subgrille'>";
    echo " <p> Compte créé le: " . $affiche_user["created_at"] . "</p>";
    echo " <p> nombre de téléchargements: " . $affiche_user["nb_telechargements"] . "</p>";

    if ($role >= roleUser("modo")) {
        $total = checkSignalementsUser($id);
            echo "<br/>"."Signalé : ".$total." fois";
    }

echo "<a href=\"index.php?action=profilConfiguration\"><button>Modifier mes données</button></a>";
    echo "</div>";
} else {
    echo needConnect();
}
echo "</div>";



?>




