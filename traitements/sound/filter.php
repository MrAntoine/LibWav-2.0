<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 17/01/2019
 * Time: 19:24
 */

//if(isset($_POST['champ_filter'])) {

    $filtre = $_POST['champ_filter'];



    $contenu = "SELECT * FROM son WHERE id IN (SELECT content_id FROM son_categorie WHERE type=?)";
    $query_contenu = $pdo->prepare($contenu);
    $query_contenu->execute(array($filtre));



    while ($result = $query_contenu->fetch()) {

       afficheSoundItem($result);

    }



//}
?>