<link rel="stylesheet" href="../../assets/css/general.css" type="text/css">
<link rel="stylesheet" href="../../assets/css/sound_page.css" type="text/css">


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
    // Bouton upload //
    echo "<a id='btn-upload-son' href='?action=uploadSound'>Ajouter un son à la banque</a>";
}
echo "<div id='page_sound'>";


/* Upload */


echo "<section id='wrapper_filtre'>";
/*  Affichage des filtres */
include("filter_view.php");


echo "</section>";

?>
    <section id="wrapper_sound">
        <?php


        $contenu = "SELECT * FROM son ";
        $query_contenu = $pdo->prepare($contenu);
        $query_contenu->execute();
        $nb_sons =0;
        while ($result = $query_contenu->fetch()) {
            $nb_sons++;
        }


        if (count($_GET) >= 2) {
            if ($_GET['p']) {
                $page = $_GET['p'];
            }
        } else {
            $page = 0;
        };

        switch ($page) {
            case 0:
                $offset = 0;
                $limit = 10;
                break;
            case 1:
                $offset = 10;
                $limit = 10;
                break;
            case 2:
                $offset = 20;
                $limit = 10;
                break;
            case 3:
                $offset = 30;
                $limit = 10;
                break;
        }


        AfficheNbPage($nb_sons);

        // Affichage des sons avec le lecteur et differents boutons //

        echo "<h2>Sons les plus téléchargés : </h2>";

        //$contenu = "SELECT * FROM son WHERE nb_telechargements>=5";

        /*
        $contenu = "SELECT * FROM son ";
        $query_contenu = $pdo->prepare($contenu);
        $query_contenu->execute();

        while ($result = $query_contenu->fetch()) {
            afficheSoundItem($result);
        }
        */



        AffichePageLimit($offset, $limit);

        AfficheNbPage($nb_sons);
        ?>

    </section>

    <section id="wrapper_report">
        <a>X</a>
    </section>



<?php
echo "</div>";
include("AudioPlayer.php");
?>


<?php

?>