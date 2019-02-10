<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 17/01/2019
 * Time: 19:24
 */

if(!isset($_POST['champ_filter']) || ($_POST['champ_filter'] == NULL)) {
    exit(header('Location: ?action=son'));

}else {
    if(isset($_POST['champ_filter'])) {
        $filtre = $_POST['champ_filter'];
    }

    echo "<h2>Sons dans la catégorie : ".$filtre ."</h2>";

   // $contenu = "SELECT * FROM son WHERE id IN (SELECT content_id FROM son_categorie WHERE categorie_name=?)";

    $contenu = "SELECT * FROM son WHERE titre LIKE Concat('%',?,'%') ";
    $query_contenu = $pdo->prepare($contenu);
    $query_contenu->execute(array($filtre));

    if ($query_contenu->fetch()) {
        while ($result = $query_contenu->fetch()) {
            afficheSoundItem($result);
        }
    }else {
        echo "Aucun résultat";
    }

}


?>