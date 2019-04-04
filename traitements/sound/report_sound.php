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
        if (isset($_POST["cgu"])) {
            $autorisation = true;
        }
    }
}

if ($autorisation === true) {

    $requette = "INSERT INTO signalements_posts VALUES(NULL,?,?,?,?,?)";
    $date = date('j.m.Y');
    $id_post = $_POST['idPost'];
    $id_demandeur = $_POST['idReporter'];
    $raison = $_POST['raison'];
    $etat = "attente";

    Report($requette,$id_post,$id_demandeur,$raison,$date,$etat);

    header('Location: ?action=son');

}
?>