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


    // Bouton upload //
    echo "<a href='?action=uploadSound'>Upload un son</a>";

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


        // Vérifié si un like est deja mis..
        $totalLikes = countLikes($result['id']);
        $resultLike = checkLikes($_SESSION['id'],$result['id']);
        if ($resultLike == false) {
            $style = "style='background-color:black'";
        } else {
            $style = "style='background-color:#b57600'";// style css
        }
        echo "<form method='POST' action='index.php?action=like'>";
        echo "<input type='hidden' name='idPost' value='" . $result['id'] . "'>";
        echo "<input type='submit' name='like' value='' class='postMsg likes'" . $style . " ></form>";
        echo "Nombre de likes : " . $totalLikes;



    }





}
?>