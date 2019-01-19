<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 17/01/2019
 * Time: 20:56
 */


if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}



if ($autorisation === true) {



    if ($role >= roleUser("modo")) {
        echo "<a href='?action='>Menu Admin </a>";
    }


}
?>