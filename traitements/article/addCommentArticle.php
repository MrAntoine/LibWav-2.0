<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 08/03/2019
 * Time: 09:17
 */


$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        if($_POST['post_id_article'] && $_POST['post_contenu_article']){
            $autorisation = true;
        }

    }
}


if ($autorisation === true) {

    $date = date('j.m.Y');
    $sql = "INSERT INTO commentaires_articles VALUES(NULL,?,?,0,?,?)";
    //$sql = "SELECT * FROM commentaires WHERE id IN (SELECT idCommentaire FROM lien_commentaire WHERE idPost=?)";
    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['post_contenu_article'],$_SESSION['id'],$date, $_POST['post_id_article']));



    /*while ($result = $query->fetch()) {
        $id = $result["idCreateur"];
        echo "<div class='commentaire_tuto'>";
        echo "<p>" . $result['contenu'] . "</p>";
        echo "<span>" . $result['date_publi'] . "</span>";

        echo "</div>";
    }*/



}
?>