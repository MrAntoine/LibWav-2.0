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
        if($_POST['post_id_tuto'] && $_POST['post_contenu_tuto']){
            $autorisation = true;
        }

    }
}


if ($autorisation === true) {

    $date = date('j.m.Y');
    $sql = "INSERT INTO commentaires VALUES(NULL,?,?,0,?,?)";
    //$sql = "SELECT * FROM commentaires WHERE id IN (SELECT idCommentaire FROM lien_commentaire WHERE idPost=?)";
    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['post_contenu_tuto'],$_SESSION['id'],$date, $_POST['post_id_tuto']));



    /*while ($result = $query->fetch()) {
        $id = $result["idCreateur"];
        echo "<div class='commentaire_tuto'>";
        echo "<p>" . $result['contenu'] . "</p>";
        echo "<span>" . $result['date_publi'] . "</span>";

        echo "</div>";
    }*/

    echo "OK";


}
?>