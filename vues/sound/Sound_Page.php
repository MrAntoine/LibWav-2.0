<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 17/01/2019
 * Time: 19:28
 */

$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {

    // Affichage des filtres //




    // Affichage des sons avec le lecteur et differents boutons //


    $contenu = "SELECT * FROM son";
    $query_contenu = $pdo->prepare($contenu);
    $query_contenu->execute();

    while ($result = $query_contenu->fetch()) {

        // Affichage des avatars utilisateur //
        $id = $result["idCreateur"];
        include('vues/user/infos_user_avatar.php');


       // echo  "<br/>"."Auteur: " . getUserInfo($result['idCreateur'])['pseudo'] ;
        echo "<br/>"."date: ".$result['date_publi'];
        echo "<br/>"."Titre: ".$result['titre'];
        echo "<br/>"."Description: ".$result['description'];
        echo"<br/>";
    }



}
?>