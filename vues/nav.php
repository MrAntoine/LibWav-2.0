<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 17/01/2019
 * Time: 20:56
 */

$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}




if ($autorisation === true) { ?>

    <a href='?action=profil'>Mon Profil</a>
    <a href='?action=profilConfiguration'>Paramètres</a>
    <a href='?action=deconnexion'>Deconnexion</a>

<?php

    if ($role >= roleUser("modo")) {
        echo "<a href='?action=menuAdmin'>Menu Admin </a>";
    }


}

?>



