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

<section id="filtre_sidebar">

    <!-- TR<IE SELON LE TYPE  -->
    <form id='form_sound_search' method="post" action="?action=soundFilterSearch">
        <label>Recherche par titre :</label>
        <input required type="text" id="champ_filter" name="champ_filter" placeholder="Rechercher un titre">
        <input type="submit" value='Chercher' name="sound_search_submit" id="sound_search_submit">
    </form>

    <!-- ON AFFFICHE LES DIFFERENTES CATEGORIES -->
    <section id="filtres_categories">
        <h3>Rechercher par catégorie :</h3>
        <?php

            //$sql = "SELECT * FROM son_categorie GROUP BY categorie_name ";

            $sql = "SELECT categorie_name FROM son_categorie WHERE id IN (SELECT id_son_categorie FROM son)";

            //$sql = "SELECT categorie_name FROM son_categorie WHERE id_categorie IN (SELECT * FROM son GROUP BY id_son_categorie) ";
            $query = $pdo->prepare($sql);
            $query->execute();
            while ($result = $query->fetch()) {
                echo "<form class='form_sound_search2' method='post' action='?action=soundFilter'>";
                echo "<input type='hidden' name='categorie_name' value='" . $result['categorie_name'] . "'/>";
                echo "<input type='submit' class='categorie_name' value='" . $result['categorie_name'] . "'><br/>";

                echo "</form>";
            }

        ?>
    </section>

    <!-- ON RESET LA RECHERCHE -->
    <a id="del_filtres" href='?action=son'>Supprimer les filtres</a>

</section>



<?php
}
?>