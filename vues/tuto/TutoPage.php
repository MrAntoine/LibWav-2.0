<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 18/02/2019
 * Time: 20:10
 */



$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {




}


?>