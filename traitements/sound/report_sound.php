<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 05/02/2019
 * Time: 18:27
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