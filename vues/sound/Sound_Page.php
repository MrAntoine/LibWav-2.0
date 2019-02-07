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
?>


    <!-- ON AFFFICHE LES DIFFERENTES CATEGORIES -->


    <!-- TR<IE SELON LE TYPE  -->

    <form id='form_sound_search' method="post" action="?action=soundFilter">
        <input type="text" id="champ_filter" name="champ_filter" placeholder="Rechercher un titre" required>
        <input type="submit" value='Chercher' name="sound_search_submit" id="sound_search_submit">
    </form>



    <?php
/*

    $id_type = "romantique";
    $sql1 = "SELECT * FROM son_categorie WHERE type=?";
    $query1 = $pdo->prepare($sql1);
    $query1->execute(array($id_type));

     echo "<h2>Type de son recherché : ".$id_type."</h2>";

    while ($result1 = $query1->fetch()) {


        afficheSoundItem($result);


     }
*/
     ?>



<section id="wrapper_sound">

</section>





    <?php

    // Bouton upload //
    echo "<a href='?action=uploadSound'>Upload un son</a>";

    // Affichage des sons avec le lecteur et differents boutons //

    echo "<h2>Sons les plus téléchargés : </h2>";

    $contenu = "SELECT * FROM son WHERE nb_telechargements>=5";
    $query_contenu = $pdo->prepare($contenu);
    $query_contenu->execute();

    while ($result = $query_contenu->fetch()) {
        afficheSoundItem($result);
    }




}
?>