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
           // On doit checker si l'utilisateur a deja fais x telechargements Selon son role. /!\/!\/!\ A COMPLETER /!\/!\/!\

    }
}

if ($autorisation === true) {

    $id_post = $_POST['idPost'];
    $id_user = $_POST['idReporter'];
    $nb_points = 10;

    AddDownload($id_user);
    addUserPoint($nb_points,$id_user);


    $sql = "SELECT lien_upload FROM son WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($id_post));
    $result = $query->fetch();
    $Fichier_a_telecharger = $result['lien_upload'];
    $chemin = "uploads/sound/";



    // TELECHARGEMENT AUTOMATIQUE DU FICHIER

    switch(strrchr(basename($Fichier_a_telecharger), ".")) {
        case ".zip": $type = "application/zip"; break;
        case ".mp3": $type = "audio/mp3"; break;
        case ".wav": $type = "audio/wav"; break;
        default: $type = "application/octet-stream"; break;
    }
    header("Content-disposition: attachment; filename=$Fichier_a_telecharger");
    header("Content-Type: application/force-download");
    header("Content-Transfer-Encoding: $type\n"); // ne pas enlever le \n
    header("Content-Length: ".filesize($chemin . $Fichier_a_telecharger));
    header("Pragma: no-cache");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
    header("Expires: 0");
    readfile($chemin . $Fichier_a_telecharger);


}
?>
