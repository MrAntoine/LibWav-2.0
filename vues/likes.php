<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 18/01/2019
 * Time: 18:58
 */

$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {


    $resultLike = checkLikes($_SESSION['id'],$_POST['idPost']);

    if ($resultLike == false) {
        $data = "unlike";
        addLikes($_SESSION['id'],$_POST['idPost']);
        //header('Location: ' . $_SERVER['HTTP_REFERER'] );

    } else {
        $data = "like";
        deleteLikes($_SESSION['id'],$_POST['idPost']);
        //header('Location: ' . $_SERVER['HTTP_REFERER'] );

    }

    echo $data;
}


?>