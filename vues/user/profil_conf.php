<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 20/01/2019
 * Time: 16:43
 */


$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {

    $id = $_SESSION["id"];
    include('vues/user/infos_user_avatar.php');



    echo "<a href='?action=downloadData'>Consulter mes données</a>";
}

?>