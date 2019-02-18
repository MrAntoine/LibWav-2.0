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

    /*  Affichage des filtres */
    include ("filter_view.php");

    ?>


<section id="wrapper_sound">

    <?php

    // Bouton upload //
    echo "<a href='?action=uploadSound'>Upload un son</a>";

    // Affichage des sons avec le lecteur et differents boutons //

    echo "<h2>Sons les plus téléchargés : </h2>";

    //$contenu = "SELECT * FROM son WHERE nb_telechargements>=5";
    $contenu = "SELECT * FROM son ";
    $query_contenu = $pdo->prepare($contenu);
    $query_contenu->execute();

    while ($result = $query_contenu->fetch()) {
        afficheSoundItem($result);
    }
    ?>

</section>

    <?php
    include("AudioPlayer.php");
    ?>




<?php
}
?>