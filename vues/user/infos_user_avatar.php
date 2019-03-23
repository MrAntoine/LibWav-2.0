<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 17/01/2019
 * Time: 22:29
 */

$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {

    $affiche_user = getUserInfo($id);

    echo "<a href='index.php?action=profil&id=" . $id . "' class='avatar'>";
    //echo "<img src='uploads/avatar/".$affiche_user['avatar']."' alt='Photo de profil' class='profil_avatar' >";
    //echo " <p id='nom'>" . $affiche_user["pseudo"] . "</p>";
    echo "</a>";


}

?>

