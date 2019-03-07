<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 07/03/2019
 * Time: 19:55
 */

$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}



?>
    <section id="wrapper_tutoriel">
        <?php

        if ($autorisation === true) {
            // Bouton upload //
            echo "<a id='btn-upload-son' href='?action=uploadTutoriel'>Publier un tutoriel</a>";
        }
        // Affichage des sons avec le lecteur et differents boutons //

        echo "<h2>Sons les plus téléchargés : </h2>";

        //$contenu = "SELECT * FROM son WHERE nb_telechargements>=5";
        $contenu = "SELECT * FROM tutos ";
        $query_contenu = $pdo->prepare($contenu);
        $query_contenu->execute();

        while ($result = $query_contenu->fetch()) {
            afficheTutorielItem($result);
        }
        ?>

    </section>




<?php






?>