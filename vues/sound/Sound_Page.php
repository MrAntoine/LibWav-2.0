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

echo "<div id='page_sound'>";


echo "<section id='wrapper_filtre'>";
/*  Affichage des filtres */
include("filter_view.php");

/* Upload */
if ($autorisation === true) {
    // Bouton upload //
    echo "<a id='btn-upload-son' href='?action=uploadSound'>Upload un son</a>";
}

echo "</section>";

?>
    <section id="wrapper_sound">
        <?php

        // Affichage des sons avec le lecteur et differents boutons //

        echo "<h3>Sons les plus téléchargés : </h3>";

        //$contenu = "SELECT * FROM son WHERE nb_telechargements>=5";
        $contenu = "SELECT * FROM son ";
        $query_contenu = $pdo->prepare($contenu);
        $query_contenu->execute();

        while ($result = $query_contenu->fetch()) {
            afficheSoundItem($result);
        }
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