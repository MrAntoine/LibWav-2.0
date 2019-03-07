<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 09/02/2019
 * Time: 14:24
 */


$autorisation = false;

if (isset($_SESSION["id"])) {
    $role = getUserInfo($_SESSION["id"])['statut'];
    if ($role >= roleUser("user")) {
        $autorisation = true;
    }
}

if ($autorisation === true) {
?>


    <!-- ON AFFFICHE LES DIFFERENTES CATEGORIES -->


    <!-- TR<IE SELON LE TYPE  -->

    <form id='form_sound_search' method="post" action="?action=soundFilterSearch">
        <input required type="text" id="champ_filter" name="champ_filter" placeholder="Rechercher un titre">
        <input type="submit" value='Chercher' name="sound_search_submit" id="sound_search_submit">
    </form>



    <section id="filtres_categories">
        <h3>Rechercher par catégorie :</h3>
        <?php


            $sql = "SELECT * FROM son_categorie GROUP BY categorie_name ";
            $query = $pdo->prepare($sql);
            $query->execute();
            echo "<form id='form_sound_search2' method=\"post\" action=\"?action=soundFilter\">";
            while ($result = $query->fetch()) {

                echo "<input type='submit' name='categorie_name' class='categorie_name' value='".$result['categorie_name']."'><br/>";

            }
            echo "</form>";

        ?>
    </section>



<?php
}
?>