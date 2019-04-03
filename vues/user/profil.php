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
echo "<div id='profil'><h2>Mon Profil</h2><div id='grille'>";
include('vues/user/infos_user_avatar.php');
echo "<img src='uploads/avatar/".$affiche_user['avatar']."' alt='Photo de profil' class='profil_avatar' >";



if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

echo " <p id='nom'>" . $affiche_user["pseudo"] . "</p>";

if ($autorisation === true) {
    if ($affiche_user["sexe"] != NULL ){
        echo "<p id='sexe'> Sexe : ".$affiche_user["sexe"]."</p>";
    };


    if ($affiche_user["anniversaire"] != NULL ){
        echo "<p id='anniv'> Anniversaire :".$affiche_user["anniversaire"]."</p>";
    };

    echo "</div>";

    echo "<br /><div id='subgrille'>";
    echo " <p> Compte créé le : " . $affiche_user["created_at"] . "</p>";
    echo " <p> Nombre de téléchargement(s) : " . $affiche_user["nb_telechargements"] . "</p>";

    echo "<p> Il te manque ".BadgeUp($affiche_user["points"])." pour débloquer le prochain badge communautaire !</p>";
    echo "<p> <img id='imgbadge' src='uploads/badges/".Badge($affiche_user["points"]).".svg' alt='badge libwav'></p>";

    if ($role >= roleUser("modo")) {
        $total = checkSignalementsUser($id);
            echo "<br/>"."Signalé : ".$total." fois";
    }

echo "<br /><a href=\"index.php?action=profilConfiguration\"><button>Modifier mes données</button></a>";
    echo "</div>";
} else {
    echo needConnect();
}
echo "</div>";



?>




