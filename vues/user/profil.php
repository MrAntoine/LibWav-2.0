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
include('vues/user/infos_user_avatar.php');


if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {
    if ($affiche_user["sexe"] != NULL ){
        echo "<p> Sexe :".$affiche_user["sexe"]."</p>";
    };


    if ($affiche_user["anniversaire"] !="0000-00-00" ){
        echo "<p> Anniversaire :".$affiche_user["anniversaire"]."</p>";
    };


    echo " <p> Compte créé le: " . $affiche_user["created_at"] . "</p>";
    echo " <p> nombre de téléchargements: " . $affiche_user["nb_telechargements"] . "</p>";

    if ($role >= roleUser("modo")) {
        $total = checkSignalementsUser($id);
            echo "<br/>"."Signalé : ".$total." fois";
    }

    echo "<input type='submit'>";

echo "</form>";

} else {
    echo needConnect();
}




?>




